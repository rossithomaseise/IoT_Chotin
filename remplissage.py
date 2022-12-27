import sqlite3, random

# Ouverture/initialisation de la base de donnee 
conn = sqlite3.connect('logement.db')
conn.row_factory = sqlite3.Row
c = conn.cursor()

# janvier
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/01/2022\",25.7,50)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,1)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/01/2022\",100.2,25)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,2)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/01/2022\",20,30)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,3)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/01/2022\",15,40)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,4)")

# février
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/02/2022\",35,60)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,5)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/02/2022\",110,30)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,6)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/02/2022\",25,35)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,7)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/02/2022\",20,45)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,8)")

# mars
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/03/2022\",15,42)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,9)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/03/2022\",80,40)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,10)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/03/2022\",32,55)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,11)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/03/2022\",27,49)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,12)")

# avril
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/04/2022\",40,81)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,13)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/04/2022\",76,56)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,14)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/04/2022\",38,62)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,15)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/04/2022\",24,41)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,16)")

# mai
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/05/2022\",51,87)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,17)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/05/2022\",66,48)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,18)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/05/2022\",28,42)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,19)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/05/2022\",34,31)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,20)")

# juin
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/06/2022\",15,25)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,21)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/06/2022\",36,36)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,22)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/06/2022\",48,72)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,23)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/06/2022\",29,46)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,24)")

# juillet
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/07/2022\",55,95)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,25)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/07/2022\",85,100)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,26)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/07/2022\",58,82)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,27)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/07/2022\",39,68)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,28)")

# août
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/08/2022\",46,78)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,29)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/08/2022\",64,53)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,30)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/08/2022\",49,69)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,31)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/08/2022\",44,54)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,32)")

# septembre
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/09/2022\",47,87)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,33)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/09/2022\",79,59)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,34)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/09/2022\",48,68)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,35)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/09/2022\",34,48)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,36)")

# octobre
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/10/2022\",19,50)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,37)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/10/2022\",36,39)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,38)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/10/2022\",40,65)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,39)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/10/2022\",30,50)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,40)")

# novembre
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/11/2022\",46,76)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,41)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/11/2022\",56,34)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,42)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/11/2022\",55,80)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,43)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/11/2022\",45,64)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,44)")

# décembre
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Internet\",\"01/12/2022\",47,88)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,45)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Electricite\",\"01/12/2022\",79,60)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,46)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Gaz\",\"01/12/2022\",41,64)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,47)")
c.execute("INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES(\"Eau\",\"01/12/2022\",39,59)")
c.execute("INSERT INTO Logement_Possede_Facture (id_logement, id_facture) VALUES(1,48)")

conn.commit()
conn.close()
