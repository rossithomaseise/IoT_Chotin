import http.server, urllib.parse, sqlite3
import json
from urllib import request
from bs4 import BeautifulSoup

list_table = ["Logement","Adresse","Ville","Piece","Capteur","Type_Capteur","Mesure","Facture","Logement_Possede_Piece","Piece_Possede_Capteur","Capteur_Possede_Mesure","Logement_Possede_Facture"]

class MyHandler(http.server.BaseHTTPRequestHandler):
	def __init__(self, *args, **kwargs):
		self.mysql = MySQL('logement.db')
		super(MyHandler, self).__init__(*args, **kwargs)

	def do_POST(self):
		# réponse à une requête POST
		res = urllib.parse.urlparse(self.path)
		query = urllib.parse.parse_qs(res.query)
		# si la requête vient du capteur de température de la esp32
		########################### revoir conditions si plusieurs valeurs ou autre chose apres valeur
		if("Valeur" in query):
			rep = self.mysql.esp32(query["Valeur"][0])
		else:
			rep = self.mysql.insert(res.path,query)
		self.send_response(200)
		self.send_header("Content-type", "text/html")
		self.end_headers()
		self.wfile.write(bytes(str(rep)+'\n', 'UTF-8'))

	def do_GET(self):
		# réponse à une requête GET
		res = urllib.parse.urlparse(self.path)
		if(res.path == "/Meteo"):
			# on utilise l'api de open-meteo : https://open-meteo.com/en
			url = "https://api.open-meteo.com/v1/forecast?latitude=48.85&longitude=2.35&hourly=temperature_2m&hourly=relativehumidity_2m&hourly=winddirection_10m&hourly=precipitation&hourly=cloudcover"
			# on obtient un fichier json sur la page html, il faut donc le récupérer et l'extraire avec le package BeautifulSoup
			html = request.urlopen(url).read()
			soup = BeautifulSoup(html,'html.parser')
			text = json.loads(soup.text)
			# construction du texte à afficher
			meteo = "Météo sur Paris : latitude = " + str(text["latitude"]) + " et longitude = " + str(text["longitude"]) + "\n\n"
			for i in range(len(text["hourly"]["time"])):
				meteo += text["hourly"]["time"][i] + " : Température = " + str(text["hourly"]["temperature_2m"][i]) + "°C " \
				+ "et Humidité = " + str(text["hourly"]["relativehumidity_2m"][i]) + "% " \
				+ "et vent = " + str(text["hourly"]["winddirection_10m"][i]) + "km/h " \
				+ "et précipitation = " + str(text["hourly"]["precipitation"][i]) + "mm " \
				+ "et couverture nuageuse = " + str(text["hourly"]["cloudcover"][i]) + "%\n"
			self.send_response(200)
			self.send_header("Content-type", "text/html")
			self.end_headers()
			self.wfile.write(bytes(str(meteo)+'\n', 'UTF-8'))
		elif(res.path == "/graph_facture"):
			# on récupère toutes les factures dans la base de donnée
			facture = self.mysql.facture()
			# facture2 permet d'éviter les doublons dans le graphique
			facture2 = [['Internet',0.00],['Electricite',0.00],['Gaz',0.00],['Eau',0.00],['Assurance',0.00]]
			# on rempli facture2
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
			# création d'un tableau string_facture à partir du tuple facture2
			string_facture = "["
			for i in range(len(facture2)):
				string_facture += "['" + str(facture2[i][0]) + "', " + str(facture2[i][1]) + "],"
			string_facture = string_facture[:len(string_facture)-1]
			string_facture += "]"
			# création de la page html
			html = """<html> <head> <!--Load the AJAX API--> 
			<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script> 
			<script type='text/javascript'>
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
			<div id='chart_div'></div>
			</body>
			</html>"""
			f = open("facture.html","w")
			f.write(html)
			f.close()
			self.send_response(200)
			self.send_header("Content-type", "text/html")
			self.end_headers()
			self.wfile.write(bytes("facture disponible sous une page html à ouvrir dans le même dossier\n", 'UTF-8'))
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

	# cette fonction permet d'insérer la mesure dans la base de donnée et de liée cette mesure à un capteur
	def esp32(self, mesure):
		print("esp32222222222222222222")
		req = "insert into Mesure (Valeur) VALUES({0})".format(mesure)
		self.c.execute(req)
		# on récupère l'indice de la mesure précédemment ajoutée
		self.c.execute("SELECT id FROM Mesure")
		rows = self.c.fetchall()
		last_id_mesure = 0
		for row in rows:
			last_id_mesure = row[0]
		tab_id = [2,last_id_mesure]
		# puis on lie cette mesure au capteur
		self.c.execute("INSERT INTO Capteur_Possede_Mesure (id_capteur,id_mesure) VALUES(?,?)",tab_id)
		self.conn.commit()
		return "requête exécutée"

	def facture(self):
		req = "select Type, Montant from Facture"
		return self.c.execute(req).fetchall()

	def select(self,path):
		selection = ""
		where = ""
		elem = path.split('/')
		# si la requête est vide
		if len(elem) == 2 and elem[0] == "" and elem[1] == "":
			return "requête vide"
		# requête simple
		elif len(elem) == 2:
			if elem[1] in list_table:
				req = "select * from {0}".format(elem[1])
			else:
				return "mauvaise requête : la table {0} n'existe pas".format(elem[1])
		# requête élaborée : combinaisons de conditions avec plusieurs sélection
		########################### REVOIR CONDITIONS
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
		print("inseeeeeeeeeeert")
		print(path.split('/')[1])
		print(query.keys())
		print(query.values())
		if path.split('/')[1] not in list_table:
			"mauvaise requête : la table {0} n'existe pas".format(path.split('/')[1])
		for i in query.keys():
			if i not in list_table:
				return "mauvaise requête : la table {0} n'existe pas".format(i)	
		######################### revoir attributs pour chaque table s'il existe
		attr = ', '.join(query.keys())
		val = ', '.join('"%s"' %v[0] for v in query.values())
		req = "insert into {0} ({1}) values ({2})".format(path.split('/')[1], attr, val)
		self.c.execute(req)
		self.conn.commit()
		return "requête exécutée"


if __name__ == '__main__':
	print("lancement du serveur")
	server_class = http.server.HTTPServer
	httpd = server_class(("192.168.55.177", 4446), MyHandler)
	try:
		httpd.serve_forever()
	except KeyboardInterrupt:
		pass
	httpd.server_close()
