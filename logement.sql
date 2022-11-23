-- 2) Destruction des classes
DROP TABLE IF EXISTS Logement;
DROP TABLE IF EXISTS Adresse;
DROP TABLE IF EXISTS Ville;
DROP TABLE IF EXISTS Piece;
DROP TABLE IF EXISTS Capteur;
DROP TABLE IF EXISTS Type_Capteur;
DROP TABLE IF EXISTS Mesure;
DROP TABLE IF EXISTS Facture;
DROP TABLE IF EXISTS Logement_Possede_Piece;
DROP TABLE IF EXISTS Piece_Possede_Capteur;
DROP TABLE IF EXISTS Capteur_Possede_Mesure;
DROP TABLE IF EXISTS Logement_Possede_Facture;

-- 3) Création des tables
CREATE TABLE Logement (id INTEGER PRIMARY KEY AUTOINCREMENT, Numero_Telephone TEXT NOT NULL, IP TEXT NOT NULL, Date_Insertion TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
	Id_Adresse INTEGER NOT NULL, FOREIGN KEY (Id_Adresse) REFERENCES Adresse(id));
CREATE TABLE Adresse (id  INTEGER PRIMARY KEY AUTOINCREMENT, Numero INTEGER NOT NULL, Voie TEXT NOT NULL, Nom_Voie TEXT NOT NULL, 
	Code_Postale INTEGER NOT NULL, FOREIGN KEY (Code_Postale) REFERENCES Ville(Code));
CREATE TABLE Ville (Code INTEGER PRIMARY KEY, Nom TEXT NOT NULL);
CREATE TABLE Piece (id  INTEGER PRIMARY KEY AUTOINCREMENT, Nom TEXT NOT NULL, Coord_x REAL, Coord_y REAL, Coord_z REAL);
CREATE TABLE Capteur (id INTEGER PRIMARY KEY AUTOINCREMENT, Ref_Commerciale TEXT NOT NULL, Port_Serveur INT NOT NULL, Date_Insertion TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
	Id_Type INTEGER NOT NULL, FOREIGN KEY (Id_Type) REFERENCES Type_Capteur(id));
CREATE TABLE Type_Capteur (id INTEGER PRIMARY KEY AUTOINCREMENT, Unite TEXT NOT NULL, Plage_Debut REAL, Plage_Fin REAL);
CREATE TABLE Mesure (id INTEGER PRIMARY KEY AUTOINCREMENT, Valeur REAL, Date_Insertion TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE Facture (id INTEGER PRIMARY KEY AUTOINCREMENT, Type TEXT NOT NULL, Date_Facture TIMESTAMP, Montant REAL, Consommation Real);

-- Création des tables d'associations
CREATE TABLE Logement_Possede_Piece (id_logement INTEGER NOT NULL, id_piece INTEGER NOT NULL, FOREIGN KEY (id_logement) REFERENCES Logement(id), 
	FOREIGN KEY (id_piece) REFERENCES Piece(id), PRIMARY KEY (id_logement,id_piece));
CREATE TABLE Piece_Possede_Capteur (id_piece INTEGER NOT NULL, id_capteur INTEGER NOT NULL, FOREIGN KEY (id_piece) REFERENCES Piece(id), 
	FOREIGN KEY (id_capteur) REFERENCES Capteur(id), PRIMARY KEY (id_piece, id_capteur));
CREATE TABLE Capteur_Possede_Mesure (id_capteur INTEGER NOT NULL, id_mesure INTEGER NOT NULL, FOREIGN KEY (id_capteur) REFERENCES Capteur(id), 
	FOREIGN KEY (id_mesure) REFERENCES Mesure(id), PRIMARY KEY (id_capteur, id_mesure));
CREATE TABLE Logement_Possede_Facture (id_logement INTEGER NOT NULL, id_facture INTEGER NOT NULL, FOREIGN KEY (id_logement) REFERENCES Logement(id), 
	FOREIGN KEY (id_facture) REFERENCES Facture(id), PRIMARY KEY (id_logement, id_facture));

-- 4) Création Logement avec 4 piece : 75005 62 boulevard port-royal Paris

-- Création de l'adresse
INSERT INTO Ville VALUES (75005, "Paris");
INSERT INTO Adresse (Numero, Voie, Nom_Voie, Code_Postale) VALUES (62, "boulevard", "port-royal", 75005);
INSERT INTO Logement (Numero_Telephone, IP, Id_Adresse) 
  	SELECT 
  	"0605086016" as Numero_Telephone, 
  	"192.168.10.177" as IP, 
  	(SELECT id FROM Adresse WHERE Numero = 62 AND Voie = "boulevard" AND Nom_Voie = "port-royal" AND Code_Postale = 75005) as Id_Adresse;

-- Création des 4 pièces
INSERT INTO Piece (Nom, Coord_x, Coord_y, Coord_z) VALUES ("Salle de bain", 2.00, 4.00, 6.00);
INSERT INTO Piece (Nom, Coord_x, Coord_y, Coord_z) VALUES ("Toilettes", 4.00, 6.00, 8.00);
INSERT INTO Piece (Nom, Coord_x, Coord_y, Coord_z) VALUES ("Cuisine", 6.00, 8.00, 10.00);
INSERT INTO Piece (Nom, Coord_x, Coord_y, Coord_z) VALUES ("Salon", 8.00, 10.00, 12.00);

-- Association Logement - Pièce
INSERT INTO Logement_Possede_Piece (id_logement, id_piece)
	SELECT
	(SELECT id FROM Logement WHERE Numero_Telephone = "0605086016" AND IP = "192.168.10.177") as id_logement,
	(SELECT id FROM Piece WHERE Nom = "Salle de bain" AND Coord_x = 2.00 AND Coord_y =  4.00 AND Coord_z = 6.00) as id_piece;
INSERT INTO Logement_Possede_Piece (id_logement, id_piece)
	SELECT
	(SELECT id FROM Logement WHERE Numero_Telephone = "0605086016" AND IP = "192.168.10.177") as id_logement,
	(SELECT id FROM Piece WHERE Nom = "Toilettes" AND Coord_x = 4.00 AND Coord_y =  6.00 AND Coord_z = 8.00) as id_piece;
INSERT INTO Logement_Possede_Piece (id_logement, id_piece)
	SELECT
	(SELECT id FROM Logement WHERE Numero_Telephone = "0605086016" AND IP = "192.168.10.177") as id_logement,
	(SELECT id FROM Piece WHERE Nom = "Cuisine" AND Coord_x = 6.00 AND Coord_y =  8.00 AND Coord_z = 10.00) as id_piece;
INSERT INTO Logement_Possede_Piece (id_logement, id_piece)
	SELECT
	(SELECT id FROM Logement WHERE Numero_Telephone = "0605086016" AND IP = "192.168.10.177") as id_logement,
	(SELECT id FROM Piece WHERE Nom = "Salon" AND Coord_x = 8.00 AND Coord_y =  10.00 AND Coord_z = 12.00) as id_piece;

-- 5) Création de 4 types de capteurs :
INSERT INTO Type_Capteur (Unite, Plage_Debut, Plage_Fin) VALUES("°C", -40.00, 120.00); -- Capteur de température
INSERT INTO Type_Capteur (Unite, Plage_Debut, Plage_Fin) VALUES("%", 0.00, 100.00); -- Capteur d'humidité
INSERT INTO Type_Capteur (Unite, Plage_Debut, Plage_Fin) VALUES("W/m2", 0.00, 1000.00); -- Capteur d'ensoleillement
INSERT INTO Type_Capteur (Unite, Plage_Debut, Plage_Fin) VALUES("kg", 0.00, 150.00); -- Capteur de poids

-- 6) Création de 2 capteurs :
INSERT INTO Capteur (Ref_Commerciale, Port_Serveur, Id_Type)
	SELECT
	"10A85EF900" as Ref_Commerciale,
	8000 as Port_Serveur,
	(SELECT id FROM Type_Capteur WHERE Unite = "°C" AND Plage_Debut = -40.00 AND Plage_Fin = 120.00) as Id_Type;
INSERT INTO Capteur (Ref_Commerciale, Port_Serveur, Id_Type)
	SELECT
	"5B8E9FD82A" as Ref_Commerciale,
	8001 as Port_Serveur,
	(SELECT id FROM Type_Capteur WHERE Unite = "kg" AND Plage_Debut = 0.00 AND Plage_Fin = 150.00) as Id_Type;

-- Association Pièce - Capteur
INSERT INTO Piece_Possede_Capteur(id_piece, id_capteur)
	SELECT
	(SELECT id FROM Piece WHERE Nom = "Salle de bain" AND Coord_x = 2.00 AND Coord_y =  4.00 AND Coord_z = 6.00) as id_piece,
	(SELECT id FROM Capteur WHERE Ref_Commerciale = "5B8E9FD82A" AND Port_Serveur = 8001) as id_capteur; -- kg
INSERT INTO Piece_Possede_Capteur(id_piece, id_capteur)
	SELECT
	(SELECT id FROM Piece WHERE Nom = "Cuisine" AND Coord_x = 6.00 AND Coord_y =  8.00 AND Coord_z = 10.00) as id_piece,
	(SELECT id FROM Capteur WHERE Ref_Commerciale = "10A85EF900" AND Port_Serveur = 8000) as id_capteur; -- °C

-- 7) Création de 2 mesures par capteur :

-- Création des mesures pour chaque capteur
INSERT INTO Mesure (Valeur) VALUES(25); -- 25 °C
INSERT INTO Mesure (Valeur) VALUES(15); -- 15 °C
INSERT INTO Mesure (Valeur) VALUES(60); -- 60 kg
INSERT INTO Mesure (Valeur) VALUES(80); -- 80 kg

-- Association Capteur - Mesure

-- Capteur 1 : 
INSERT INTO Capteur_Possede_Mesure(id_capteur, id_mesure)
	SELECT
	(SELECT id FROM Capteur WHERE Ref_Commerciale = "10A85EF900" AND Port_Serveur = 8000) as id_capteur, -- °C
	1 as id_mesure;
INSERT INTO Capteur_Possede_Mesure(id_capteur, id_mesure)
	SELECT
	(SELECT id FROM Capteur WHERE Ref_Commerciale = "10A85EF900" AND Port_Serveur = 8000) as id_capteur, -- °C
	2 as id_mesure;
-- Capteur 2:
INSERT INTO Capteur_Possede_Mesure(id_capteur, id_mesure)
	SELECT
	(SELECT id FROM Capteur WHERE Ref_Commerciale = "5B8E9FD82A" AND Port_Serveur = 8001) as id_capteur, -- °kg
	3 as id_mesure;
INSERT INTO Capteur_Possede_Mesure(id_capteur, id_mesure)
	SELECT
	(SELECT id FROM Capteur WHERE Ref_Commerciale = "5B8E9FD82A" AND Port_Serveur = 8001) as id_capteur, -- °kg
	4 as id_mesure;


-- 8) Création de 4 factures
INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES("Internet",2022-11-12,25.7,50);
INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES("Electricite",2022-11-13,100.2,25);
INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES("Gaz",2022-11-14,20,30);
INSERT INTO Facture (Type , Date_Facture , Montant , Consommation ) VALUES("Eau",2022-11-15,15,40);

-- Association Logement - Facture
INSERT INTO Logement_Possede_Facture (id_logement, id_facture)
   SELECT
      (SELECT id FROM Logement WHERE Numero_Telephone = "0605086016" AND IP = "192.168.10.177") as id_logement,
      (SELECT id FROM Facture WHERE Type = "Internet") as id_facture;
INSERT INTO Logement_Possede_Facture (id_logement, id_facture)
   SELECT
      (SELECT id FROM Logement WHERE Numero_Telephone = "0605086016" AND IP = "192.168.10.177") as id_logement,
      (SELECT id FROM Facture WHERE Type = "Electricite") as id_facture;
INSERT INTO Logement_Possede_Facture (id_logement, id_facture)
   SELECT
      (SELECT id FROM Logement WHERE Numero_Telephone = "0605086016" AND IP = "192.168.10.177") as id_logement,
      (SELECT id FROM Facture WHERE Type = "Gaz") as id_facture;
INSERT INTO Logement_Possede_Facture (id_logement, id_facture)
   SELECT
      (SELECT id FROM Logement WHERE Numero_Telephone = "0605086016" AND IP = "192.168.10.177") as id_logement,
      (SELECT id FROM Facture WHERE Type = "Eau") as id_facture;
