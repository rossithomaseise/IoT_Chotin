Fichiers : serveur_rest.py avec un module meteo_json.py + le code arduino.

Exercice 1 : remplissage de la base de données.

Il faudra changer les adresses ip.

Convention : Afin de traiter à la fois différentes sélection et conditions dans le get, il faut mettre un '+' devant la sélection et un '_' devant la condition avec ici l'attribut séparé par un '=" et sa valeur. Par exemple :

SELECT Montant Where Type = "eau" devient curl -X GET 192.168.37.177:8888/Facture/+Montant/_Type_Eau

curl -X GET 192.168.37.177:8888/Mesure
curl -X GET 192.168.37.177:8888/Capteur_Possede_Mesure
curl -X GET 192.168.37.177:8888/Facture
curl -X POST 192.168.37.177:8888/Mesure/\?Valeur\=100.00
curl -X GET 192.168.37.177:8888/Mesure
curl -X POST 192.168.37.177:8888/Facture/\?Type\=Assurance\&Date_Facture\=2023-01-01\&Montant\=20\&Consommation\=0.00	
curl -X GET 192.168.37.177:8888/Facture
curl -X GET 192.168.37.177:8888/Logement/+Numero_Telephone/+IP
curl -X GET 192.168.37.177:8888/Facture/_Type_Eau
curl -X GET 192.168.37.177:8888/Facture/+Type/+Consommation
curl -X GET 192.168.37.177:8888/Facture/+Montant/_Type_Eau

Exercice 2 : serveur web.

curl -X GET 192.168.37.177:8888/graph_facture

Exercice 3 : météo.

curl -X GET 192.168.37.177:8888/Meteo


curl -X POST 192.168.37.177:8888/Connexion/\?Identifiant\=toto\&MotDePasse\=202