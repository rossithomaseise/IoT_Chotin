from datetime import datetime
from urllib.request import urlopen
from bs4 import BeautifulSoup

#☁️ ⛈️ 🌤️ 🌥️ 🌦️ 🌩️ 🌡️ 🥵 🌞 
def meteoH():
    html = urlopen('https://weather.com/fr-FR/temps/parheure/l/02144e9a9a2fe048b3ecca9df91501293f98ee712846f78a5da25ba6690fd98c').read().decode('utf-8')
    soup = BeautifulSoup(html, 'html.parser')
    date = soup.find_all(class_="HourlyForecast--longDate--J_Pdh")
    date2 = []
    for i in range(len(date)):
        date2.append(date[i].get_text().strip())
    heure = soup.find_all(class_="DetailsSummary--daypartName--kbngc")
    heure2 = []
    for i in range(len(heure)):
        heure2.append(heure[i].get_text().strip())
    temperature = soup.find_all(class_="DetailsSummary--tempValue--jEiXE")
    temperature2 = []
    for i in range(len(temperature)):
        temperature2.append(temperature[i].get_text().strip())
        temperature2[i] = temperature2[i] + "C"
    temps = soup.find_all(class_="DetailsSummary--extendedData--307Ax")
    temps2 = []
    temps3 = []
    for i in range(len(temps)):
        temps2.append(temps[i].get_text().strip())
        if(temps2[i] == "Très nuageux"):
            temps3.append("Très nuageux"" ☁️ ")
        elif(temps2[i] == "Nuageux"):
            temps3.append("Nuageux ☁️ ")
        elif(temps2[i] == "Peu nuageux"):
            temps3.append("Peu nuageux"" ⛅ ")
        elif(temps2[i] == "Orages épars" or temps2[i] == "Orages isolés" or temps2[i]== "Orages" or temps[2]=="Averses"):
            temps3.append("Orage"" 🌧 ")
        elif(temps2[i]=="Plutôt ensoleillé" or temps2[i] == "Ensoleillé"):
            temps3.append("Soleil""🌞")
    vent = soup.find_all(class_= "Wind--windWrapper--3Ly7c DetailsTable--value--2YD0-")
    vent2 = []
    for i in range(len(vent)):
       vent2.append(vent[i].get_text().strip())
    date_du_jour = 0
    meteo = ""
    meteo += date2[date_du_jour]
    for i in range(len(heure2)):
        if(heure2[i] == "0:00"):
            date_du_jour += 1
            meteo += "\n" + date2[date_du_jour]
        meteo += "\n" + heure2[i] + " 🕐  : " + temperature2[i]
        if(int(temperature2[i].split("°C")[0]) >= 30):
            meteo +=" 🔥 "
        else:
            meteo += " 🤪 " 
        meteo += temps3[i]
        meteo += " "
        meteo += vent2[i] + " 🍃 "
    print(meteo)
    return meteo

if __name__ == '__main__':
    meteoH()
