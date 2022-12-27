import sqlite3, random

# Ouverture/initialisation de la base de donnee 
conn = sqlite3.connect('logement.db')
conn.row_factory = sqlite3.Row
c = conn.cursor()

c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/01/2022\",25.7,50)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,1)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/01/2022\",100.2,25)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,2)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/01/2022\",20,30)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,3)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/01/2022\",15,40)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,4)")

c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/02/2022\",35,60)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,5)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/02/2022\",110,30)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,6)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/02/2022\",25,35)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,7)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/02/2022\",20,45)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,8)")

c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/03/2022\",15,42)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,9)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/03/2022\",80,40)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,10)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/03/2022\",32,55)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,11)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/03/2022\",27,49)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,12)")

c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/03/2022\",40,81)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,13)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/03/2022\",76,56)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,14)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/03/2022\",38,62)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,15)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/03/2022\",24,41)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,16)")

conn.commit()
conn.close()
