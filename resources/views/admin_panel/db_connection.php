<?php
// Veritabanı bilgileri
$host = "localhost";
$dbname = "freeprj";
$username = "root";
$password = "";

try {
    // PDO nesnesi oluşturarak veritabanına bağlanma
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Hata modunu ayarlama
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Diğer PDO ayarları
    // $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

   //  echo "Veritabanına başarıyla bağlandı.";
} catch (PDOException $e) {
    // Bağlantı hatası durumunda hata mesajını göster
   // die("Veritabanına bağlanırken hata oluştu: " . $e->getMessage());
}
