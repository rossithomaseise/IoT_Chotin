import http.server, urllib.parse, sqlite3
import sqlite3, random
import sys
sys.path.insert(1,"/home/rossi/Documents/IoT_Chotin/python-connector-api/examples")
#from meteo_fonction.py import time_series_example
import meteo_fonction
from subprocess import run
import subprocess
import signal

import webbrowser
import os, subprocess
import time
import keyboard
import pyautogui, sys
import webbrowser
import pyperclip
import time


class MyHandler(http.server.BaseHTTPRequestHandler):
	def __init__(self, *args, **kwargs):
		self.mysql = MySQL('logement.db')
		super(MyHandler, self).__init__(*args, **kwargs)

	def do_POST(self):
		"""Respond to a POST request."""
		res = urllib.parse.urlparse(self.path)
		query = urllib.parse.parse_qs(res.query)
		if("Valeur" in query):
			rep = self.mysql.esp32(query["Valeur"][0])
		else:
			rep = self.mysql.insert(res.path,query)
		self.send_response(200)
		self.send_header("Content-type", "text/html")
		self.end_headers()
		self.wfile.write(bytes(str(rep)+'\n', 'UTF-8'))

	def do_GET(self):
		"""Respond to a GET request."""
		res = urllib.parse.urlparse(self.path)
		if(res.path == "/Meteo"):
			link = "https://api.meteomatics.com/2022-12-04T00:00:00Z--2022-12-07T00:00:00Z:PT1H/t_2m:C,precip_1h:mm,wind_speed_10m:ms/52.520551,13.461804/json"

			pyperclip.copy(link)

			os.system("firefox")
			time.sleep(1)
			pyautogui.moveTo(798,92)
			time.sleep(1)
			pyautogui.click(button='left')
			time.sleep(1)
			pyautogui.hotkey("ctrl", "v")
			time.sleep(1)
			pyautogui.press('enter')
			time.sleep(1)




			# enregistrer
			pyautogui.moveTo(108,150)
			time.sleep(1)
			pyautogui.click(button='left')
			time.sleep(1)

			pyautogui.moveTo(1541,99)
			time.sleep(1)
			pyautogui.click(button='left')
			self.send_response(200)
			self.send_header("Content-type", "text/html")
			self.end_headers()
			self.wfile.write(bytes(str("ola")+'\n', 'UTF-8'))
		elif(res.path == "/graph_facture"):
			facture = self.mysql.facture()

			facture2 = [['Internet',0.00],['Electricite',0.00],['Gaz',0.00],['Eau',0.00],['Assurance',0.00]]

			for i in range(len(facture)):
				if(facture[i][0] == 'Internet'):
					facture2[0][1] += facture[i][1]
				elif(facture[i][0] == 'Electricite'):
					facture2[1][1] += facture[i][1]
				elif(facture[i][0] == 'Gaz'):
					facture2[2][1] += facture[i][1]
				elif(facture[i][0] == 'Eau'):
					facture2[3][1] += facture[i][1]
				elif(facture[i][0] == 'Assurance'):
					facture2[4][1] += facture[i][1]

			string_facture = "["

			for i in range(len(facture2)):
				string_facture += "['" + str(facture2[i][0]) + "', " + str(facture2[i][1]) + "],"
			string_facture = string_facture[:len(string_facture)-1]
			string_facture += "]"
			html = """<html> <head> <!--Load the AJAX API--> <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script> <script type='text/javascript'>

			      google.charts.load('current', {'packages':['corechart']});
			      google.charts.setOnLoadCallback(drawChart);
			      function drawChart() {
			        var data = new google.visualization.DataTable();
			        data.addColumn('string', 'Topping');
			        data.addColumn('number', 'Slices');
			        data.addRows("""\
			      	+ string_facture + \
			        """);
			        var options = {'title':'Factures',
			                       'width':400,
			                       'height':300};
			        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
			        chart.draw(data, options);
			      }
			    </script>
			  </head>

			  <body>
			    <!--Div that will hold the pie chart-->
			    <div id='chart_div'></div>
			  </body>
			</html>"""
			f = open("facture.html","w")
			f.write(html)
			f.close()
		else:
			rep = self.mysql.select(res.path)
			if len(rep) > 0:
				self.send_response(200)
				self.send_header("Content-type", "text/html")
				self.end_headers()
				self.wfile.write(bytes(str(rep)+'\n', 'UTF-8'))
			else:
				self.send_response(404)
				self.send_header("Content-type", "text/html")
				self.end_headers()
		

class MySQL():
	def __init__(self, name):
		self.c = None
		self.req = None
		self.conn = sqlite3.connect(name)
		self.c = self.conn.cursor()

	def __exit__(self, exc_type, exc_value, traceback):
		self.conn.close()

	def esp32(self, mesure):
		req = "insert into Mesure (Valeur) VALUES({0})".format(mesure)
		self.c.execute(req)
		self.c.execute("SELECT id FROM Mesure")
		rows = self.c.fetchall()
		last_id_mesure = 0
		for row in rows:
			last_id_mesure = row[0]
		tab_id = [2,last_id_mesure]
		print(tab_id)
		self.c.execute("INSERT INTO Capteur_Possede_Mesure (id_capteur,id_mesure) VALUES(?,?)",tab_id)
		self.conn.commit()


	def facture(self):
		req = "select Type, Montant from Facture"
		return self.c.execute(req).fetchall()

	def select(self,path):
		elem = path.split('/')
		selection = ""
		where = ""
		if len(elem) == 2:
			req = "select * from {0}".format(elem[1])
		else:
			for i in range(1,len(elem)):
				if(elem[i][0] == "_"):
					where += str((elem[i].split("_"))[1]) + " = " + "\"" + \
					str(elem[i].split("_")[2]) + "\""
					where += " AND "
			where = where[0:len(where)-4]
			for i in range(1,len(elem)):
				if(elem[i][0] == "+"):
					selection += elem[i][1:] + ","
			selection = selection[:len(selection)-1]
			if(not(selection)):
				selection = "*"
			if(where):
				req = "select " + selection + " from {0} WHERE ".format(elem[1]) + where 
			else:
				req = "select " + selection + " from {0}".format(elem[1])
		return self.c.execute(req).fetchall()
	
	def insert(self,path,query):
		attr = ', '.join(query.keys())
		val = ', '.join('"%s"' %v[0] for v in query.values())
		req = "insert into {0} ({1}) values ({2})".format(path.split('/')[1], attr, val)
		self.c.execute(req)
		self.conn.commit()


if __name__ == '__main__':
	print("lancement du serveur")
	server_class = http.server.HTTPServer
	httpd = server_class(("192.168.37.177", 8888), MyHandler)
	try:
		httpd.serve_forever()
	except KeyboardInterrupt:
		pass
	httpd.server_close()
