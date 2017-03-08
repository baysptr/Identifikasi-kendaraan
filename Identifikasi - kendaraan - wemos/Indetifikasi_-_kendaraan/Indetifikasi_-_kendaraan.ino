#include "ESP8266WiFi.h"
#include <string.h>
#define MAX_STRING_LEN 20

//inisial wifi serta passwordnya
const char* ssid     = "Jaringan Tidak Ditemukan";
const char* password = "";

//inisial host web service
const char* host = "10.42.0.1";

void setup() {
  Serial.begin(115200);

  //code instalisasi WifiScan
  WiFi.mode(WIFI_STA);
  WiFi.disconnect();
  delay(100);
  Serial.println("Wifi Scanner Setup is done");
  Serial.println();

  //code instalisasi WifiClient
  Serial.print("Connecting to ");
  Serial.println(ssid);
  
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP()); 
}

//Fungsi ini untuk mengirimkan data nopol ke webservice
void kirim_nopol(String nopol){
  WiFiClient client;
  const int httpPort = 80;
  if(!client.connect(host, httpPort)){
    Serial.println("Connection Failed");
    return;
  }

  String url = "/identifikasi/resource/identifikasi.php?nopol=";
  url += nopol;
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" + 
               "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
  while(client.available()){
    String line = client.readStringUntil('\r');
    Serial.print(line);
  }
  
  Serial.println();
  Serial.println("closing connection");
}

//fungsi untuk mapping setiap byte char*
char* subStr (char* input_string, char *separator, int segment_number) {
 char *act, *sub, *ptr;
 static char copy[MAX_STRING_LEN];
 int i;

 strcpy(copy, input_string);

for (i = 1, act = copy; i <= segment_number; i++, act = NULL) {

 sub = strtok_r(act, separator, &ptr);
 if (sub == NULL) break;
 }
 return sub;
}

//fungsi konversi dari string ke char array
char* string2char(String command){
    if(command.length()!=0){
        char *p = const_cast<char*>(command.c_str());
        return p;
    }
}

//Fungsi untuk memisahkan spasi di SSID yang tertangkap
String pisahkan_string(String ssid, int letak){
  return subStr(string2char(ssid), " ", letak);
}

//fungsi untuk mensatukan string yang diterima dari fungsi diatas yang nantinya sebagai url forwarding
String url(String ssid){
  String url = pisahkan_string(ssid, 1) + "+" + pisahkan_string(ssid, 2) + "+" + pisahkan_string(ssid, 3);
  return url;
}

void loop() {
  Serial.println("scan start");

  // WiFi.scanNetworks will return the number of networks found
  int n = WiFi.scanNetworks();
  Serial.println("scan done");
  if (n == 0)
    Serial.println("no networks found");
  else
  {
    Serial.print(n);
    Serial.println(" networks found");
    for (int i = 0; i < n; ++i)
    {
      Serial.print(i + 1);
      Serial.print(": ");
      Serial.print(WiFi.SSID(i));
      Serial.print(" (");
      Serial.print(WiFi.RSSI(i));
      Serial.print(")");
      Serial.println((WiFi.encryptionType(i) == ENC_TYPE_NONE)?" ":"*");
      kirim_nopol(url(WiFi.SSID(i)));
      delay(10);
    }
  }
  Serial.println("");

  //Diulang selama 10 detik
  delay(10000);
}
