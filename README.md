# Identifikasi-kendaraan
implementasi konsep V2I dengan pokok permasalahan identifikasi kendaraan yang terpasang chip ESP8266

# Install Program and Testing chip
  kebutuhan:
    1. web server (XAMPP, LAMPP)
    2. laptop (nanti sebagai server)
    3. smartphone (nanti sebagai client)
    
  install web server:
    kopi folder identifikasi - web - service ke folder xampp->htdocs
    rename folder tsb dengan nama webservice
    ketikan localhost phpmyadmin di url web browser
    lalu buat database dengan nama identifikasi
    lalu klik tab import
    lalu arahkan ke file yang berada di dalam folder DB
    
  testing chip
    hubungkan chip dengan kabel usb yang terpasang di listrik
    nyalakan hostpot smartphone dengan nama SSID (L 6125 QZ)
    dekatkan smartphone dengan chip
    lalu cek di webservice dengan mengetikan localhost/webservice lalu klik tab identifikasi
