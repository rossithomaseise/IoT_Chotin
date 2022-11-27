import sqlite3, random

# Ouverture/initialisation de la base de donnee 
conn = sqlite3.connect('logement.db')
conn.row_factory = sqlite3.Row
c = conn.cursor()

#### On insère dans la base de données les mesures
mesure = [[50.0],[100.0],[28.0],[32.0]]
c.executemany("INSERT INTO Mesure (Valeur) VALUES(?)",mesure)

# Afin de récupérer les id des dernières données, on récupère le dernier id et on soustrait au lieu d'écrire l'id à la main
c.execute("SELECT id FROM Mesure")
rows = c.fetchall()
last_id_mesure = 0
for row in rows:
	last_id_mesure = row[0]

tab_id = [[2,last_id_mesure-3],[2,last_id_mesure-2],[1,last_id_mesure-1],[1,last_id_mesure]]

c.executemany("INSERT INTO Capteur_Possede_Mesure (id_capteur,id_mesure) VALUES(?,?)",tab_id)

c.execute("SELECT * FROM Capteur_Possede_Mesure")
# Pour vérifier que les données ont bien été reliées aux capteurs
#rows = c.fetchall()
#for row in rows:
#	print(row[0],row[1])

#### Factures
values = []
noms_factures = ["Internet","Electricite","Gaz","Eau"]
for i in range(4):
   values.append(noms_factures[i])
   values.append("%d/11/2020" %(random.randint(1,30)))
   values.append(random.randint(15,100))
   values.append(random.randint(10,50))
   #print(values)
   c.execute("INSERT INTO Facture(Type , Date_Facture , Montant , Consommation ) VALUES (?,?,?,?)", values)
   values = []

# Afin de récupérer les id des dernières factures, on récupère le dernier id et on soustrait au lieu d'écrire l'id à la main
c.execute("SELECT id FROM Facture")
rows = c.fetchall()
last_id_facture = 0
for row in rows:
	last_id_facture = row[0]


tab_id = [[1,last_id_facture-3],[1,last_id_facture-2],[1,last_id_facture-1],[1,last_id_facture]]

c.executemany("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(?,?)",tab_id)

# Pour vérifier que les factures ont bien été reliées à la maison
#for raw in c.execute('SELECT * FROM  Facture'):
#   print(raw.keys())
#   print(raw["Montant"])

# fermeture
conn.commit()
conn.close()
