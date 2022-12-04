#include <WiFi.h>
#include <HTTPClient.h>

#include "DHT.h"

#define DHTPIN 4
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

#define ONBOARD_LED  2

const char* ssid     = "OPPO_A9_2020";
const char* password = "201e57f3f0c5";

//Your Domain name with URL path or IP address with path
String serverName = "http://192.168.37.177:8888/";

// the following variables are unsigned longs because the time, measured in
// milliseconds, will quickly become a bigger number than can be stored in an int.
unsigned long lastTime = 0;
// Timer set to 10 minutes (600000)
//unsigned long timerDelay = 600000;
// Set timer to 5 seconds (5000)
unsigned long timerDelay = 5000;

void setup() {
  Serial.begin(115200); 

  pinMode(ONBOARD_LED,OUTPUT);

  dht.begin();

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
  //Send an HTTP POST request every 10 minutes
    Serial.println("111111");
    //Check WiFi connection status
    if(WiFi.status()== WL_CONNECTED){
      WiFiClient client;
      HTTPClient http;
      Serial.println("22222");
      // Your Domain name with URL path or IP address with path
      http.begin(client, serverName);

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
      
      
      // Convert the value to a char array
      char humString[8];
      dtostrf(humidity, 1, 2, humString);
      Serial.print("Humidity: ");
      Serial.println(humString);
      
      // Specify content-type header
      http.addHeader("Content-Type", "text/plain");
      // Data to send with HTTP POST    
      String httpRequestData = "api_key=tPmAT5Ab3j7F9&sensor=DHT11&value1=";
      httpRequestData += String(temperature,6);
      httpRequestData += "&value2=";
      httpRequestData += String(humidity,6);
      // Send HTTP POST request
      int httpResponseCode = http.POST("bruhhhhhhhhhhhhhhhhh");
      
      // If you need an HTTP request with a content type: application/json, use the following:
      //http.addHeader("Content-Type", "application/json");
      //int httpResponseCode = http.POST("{\"api_key\":\"tPmAT5Ab3j7F9\",\"sensor\":\"BME280\",\"value1\":\"24.25\",\"value2\":\"49.54\",\"value3\":\"1005.14\"}");

      // If you need an HTTP request with a content type: text/plain
      //http.addHeader("Content-Type", "text/plain");
      //int httpResponseCode = http.POST("Hello, World!");
     
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
