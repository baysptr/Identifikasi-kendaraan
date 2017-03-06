/*
 *  This sketch demonstrates how to scan WiFi networks. 
 *  The API is almost the same as with the WiFi Shield library, 
 *  the most obvious difference being the different file you need to include:
 */
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <string.h>
#define MAX_STRING_LEN 20

const char *WIFI_SSID = "Jaringan Tidak Ditemukan";
const char *WIFI_PASS = "qazwsxedc";

//variabel webservice untuk menunjukan host url dari web service yang digunakan
String webService = "http://localhost/identifikasi/resource/identifikasi.php?nopol=";

void setup() {
  Serial.begin(115200);

  Serial.print("Wait for Connecting to WIFI");
  WiFi.begin(WIFI_SSID, WIFI_PASS);
  while(WiFi.status() != WL_CONNECTED){
    delay(500);
    Serial.print(".");
  }
  Serial.println("Wifi is Connected");

  WiFi.mode(WIFI_STA);
  WiFi.disconnect();
  delay(100);

  Serial.println("Setup done");
}

//fungsi untuk mengirimkan nopol ke web service
void kirim_nopol(String nopol){
  HTTPClient http;
  
  http.begin(webService+nopol);

  int httpcode = http.GET();
  if(httpcode == HTTP_CODE_OK){
    Serial.println(httpcode);
    String response = http.getString();
    Serial.println(response);
  }else{
    Serial.println("Error in HTTP Request !!!");
  }

  http.end();
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
      // Print SSID and RSSI for each network found
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

  // Diulang Selama 15 detik
  delay(15000);
}
