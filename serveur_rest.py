# curl -X GET http://localhost:8888/Facture
# curl -X POST http://localhost:8888/Etudiant/\?Nom\=Cionaire\&Prenom\=Dick\&idAd\=2	
# curl -X POST http://localhost:8888/Facture/\?Type\=Assurance\&Date_Facture\=2023-01-01\&Montant\=20\&Consommation\=0.00	
# curl -X GET http://localhost:8888/Facture/Type
# curl -X GET http://localhost:8888/Logement/Numero_Telephone/IP

import http.server, urllib.parse, sqlite3
from meteo import *

class MyHandler(http.server.BaseHTTPRequestHandler):
	def __init__(self, *args, **kwargs):
		self.mysql = MySQL('logement.db')
		super(MyHandler, self).__init__(*args, **kwargs)

	def do_POST(self):
		"""Respond to a POST request."""
		res = urllib.parse.urlparse(self.path)
		query = urllib.parse.parse_qs(res.query)
		print(query,"query")
		rep = self.mysql.insert(res.path,query)
		print("rep",rep)
		self.send_response(200)
		self.send_header("Content-type", "text/html")
		self.end_headers()		
		self.wfile.write(bytes(str(rep)+'\n', 'UTF-8'))

	def do_GET(self):
		"""Respond to a GET request."""
		res = urllib.parse.urlparse(self.path)
		if(res.path == "/Meteo"):
			meteo = meteoH()
			self.send_response(200)
			self.send_header("Content-type", "text/html")
			self.end_headers()
			self.wfile.write(bytes(str(meteo)+'\n', 'UTF-8'))
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

	def facture(self):
		req = "select Type, Montant from Facture"
		return self.c.execute(req).fetchall()

	def select(self,path):
		elem = path.split('/')
		print("elem",elem)
		selection = ""
		if len(elem) == 2:
			req = "select * from %s" %(elem[1])
		else:
			for i in range(2,len(elem)):
				selection += elem[i] + ","
			selection = selection[:len(selection)-1]
			print(selection)
			req = "select " + selection + " from %s" %(elem[1])
		return self.c.execute(req).fetchall()
	
	def insert(self,path,query):
		print(query)
		attr = ', '.join(query.keys())
		val = ', '.join('"%s"' %v[0] for v in query.values())
		print(attr,val)
		req = "insert into %s (%s) values (%s)" %(path.split('/')[1], attr, val)
		print(req)
		self.c.execute(req)
		self.conn.commit()

if __name__ == '__main__':
	print("lancement du serveur")
	server_class = http.server.HTTPServer
	httpd = server_class(("localhost", 8888), MyHandler)
	try:
		httpd.serve_forever()
	except KeyboardInterrupt:
		pass
	httpd.server_close()
