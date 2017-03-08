# Identifikasi-kendaraan
implementasi konsep V2I dengan pokok permasalahan identifikasi kendaraan yang terpasang chip ESP8266

# Install Program and Testing chip
  kebutuhan:
    1. web server (XAMPP, LAMPP)
    2. laptop (nanti sebagai server)
    3. smartphone (nanti sebagai client)
    
  install web server:
    kopi folder identifikasi - web - service ke folder xampp->htdocs
    rename folder tsb dengan nama identifikasi
    ketikan localhost phpmyadmin di url web browser
    lalu buat database dengan nama identifikasi
    lalu klik tab import
    lalu arahkan ke file yang berada di dalam folder DB
    setalah selesai semuanya, mari kita test web service tsb dengan
    mengetikan localhost/identifikasi di url browser anda
    jika anda login berikut username dan passwordnya
    username: admin
    password: qazwsxedc
    
  testing chip
    buka file yang berada dalam folder Identifikasi - kendaraan - wemos dengan Arduino IDE
    sesuaikan inisial wifi dengan wifi di sekitar anda
    buka aplikasi cmd atau terminal anda
    bila membuka cmd ketikan ipconfig
    bila terminal ketikan ifconfig
    lalu cari alamat ip yang anda dapat dari komputer anda yang terkoneksi dengan wifi
    perlu di ingat chip ESP dan komputer anda harus sama-sama menggunakan wifi yang sama
    setelah ketemu ip anda, lalu ganti ip yang berada di inisial host dengan ip yang anda temukan
    setelah itu upload

    jika berhasil
    aktifkan hostpot smartphone anda dengan nama L 6125 QZ
    jika sudah tunggu 1 menit
    dan check di web browser dengan url localhost/identifikasi lalu klik tab identifikasi

## jika ada kesalahan dan ingin mengajukan pertanyaan hubungi
Contacs Profil: http://bayu-saputra.tk/
WA/SMS: 087855979114
e-Mail: bayu.bayusaputra11@gmail.com
