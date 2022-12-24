import sqlite3, random

# Ouverture/initialisation de la base de donnee 
conn = sqlite3.connect('logement.db')
conn.row_factory = sqlite3.Row
c = conn.cursor()

c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/01/2022\",25.7,50)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/01/2022\",100.2,25)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/01/2022\",20,30)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/01/2022\",15,40)")

c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"02/01/2022\",35,60)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"02/01/2022\",110,30)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"02/01/2022\",25,35)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"02/01/2022\",20,45)")

conn.commit()
conn.close()
