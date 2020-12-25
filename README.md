# Koperasi

Koperasi adalah sebuah organisasi ekonomi yang dimiliki dan dioperasikan oleh orang-seorang demi kepentingan bersama. Koperasi melandaskan kegiatan berdasarkan prinsip gerakan ekonomi rakyat yang berdasarkan asas kekeluargaan.

# Instalasi

Berikut Cara Instalasi:

- Download
- Extract Folder kedalam htdocs. jika menggunakan xampp bisanya terpadat pada directory C:XAMPP/htdocs
- Kemudian jalankan XAMPP, MAMP, LAMP, etc
- Import Database dengan nama koperasi_db. File database berada di Koperasi/db/koperasi_db.sql
- Ketikkan pada url browser http://localhost8080/Koperasi contoh jika menggunakan port 8080. Jika XAMPP biasanya menggunakan http://localhost/Koperasi.
- Nama Folder pada htdocs dapat di customisassi tergantung keinginan. Jika mendowload dari repo ini, maka nama folder bisanya akan berubah menjadi NamaFolder-Master.
- Pada saat menjalankan (running) di browser Anda menemukan error Error Database, maka cukup ke folder Koperasi/application/config/database.php. Jika menggunakan XAMPP maka password biasanya dikosongkan.
- Jika template tidak berjalan dengan benar. Maka Anda harus mengubah base_url pada file config.php (Koperasi/application/config/config.php). Mudahnya, Anda dapat mencopy url root pada browser http://localhost8080/Koperasi kemudian paste kedalam base_url.
