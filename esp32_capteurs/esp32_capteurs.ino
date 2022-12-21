#include <WiFi.h>
#include <HTTPClient.h>
#include "DHT.h"

#define DHTPIN 4
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

const char* ssid     = "OPPO_A9_2020";
const char* password = "201e57f3f0c5";
String serverName = "http://192.168.55.177:4446/Mesure";

void setup() {
  Serial.begin(115200); 
  dht.begin();
  // Connexion WiFi
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
  Serial.println("Timer set to 5 seconds (timerDelay variable), it will take 5 seconds before publishing the first reading.");
}

void loop() {
    //Check WiFi connection status
    if(WiFi.status()== WL_CONNECTED){
      WiFiClient client;
      HTTPClient http;
      http.begin(client, serverName);
      // Specify content-type header
      //http.addHeader("Content-Type", "text/plain");
      http.addHeader("Content-Type", "application/x-www-form-urlencoded");
      
      // code température/humidité
      float humidity  = dht.readHumidity();
      float temperature = dht.readTemperature();
      if (isnan(humidity) || isnan(temperature)){
        Serial.println(F("Failed to read from DHT sensor!"));
        return;
      }
      // Convert the value to a char array
      char tempString[8];
      dtostrf(temperature, 1, 2, tempString);
      Serial.print("Temperature: ");
      Serial.println(tempString);
      char humString[8];
      dtostrf(humidity, 1, 2, humString);
      Serial.print("Humidity: ");
      Serial.println(humString);
      
      // Data to send with HTTP POST    
      String httpRequestData = "api_key=tPmAT5Ab3j7F9&sensor=DHT11&value1=";
      httpRequestData += String(temperature,6);
      httpRequestData += "&value2=";
      httpRequestData += String(humidity,6);
      httpRequestData = "&Valeur=100";
      // Send HTTP POST request
      //int httpResponseCode = http.POST("Valeur42.00");
      int httpResponseCode = http.POST(httpRequestData);
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
      // Free resources
      http.end();
    }
    else {
      Serial.println("WiFi Disconnected");
    }
    delay(2000);
}
