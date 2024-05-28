<?php
if(isset($_POST['personelAd'], $_POST['personelSoyad'], $_POST['dogumTarihi'], $_POST['iseBaslamaTarihi'], $_POST['personelCinsiyet'], $_POST['personelIs'])) {
    // Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
    include('sql.php');

    // POST isteği ile gönderilen verileri alıyoruz
    $personelAd = $_POST['personelAd'];
    $personelSoyad = $_POST['personelSoyad'];
    $dogumTarihi = $_POST['dogumTarihi'];
    $iseBaslamaTarihi = $_POST['iseBaslamaTarihi'];
    $personelCinsiyet = $_POST['personelCinsiyet'];
    $personelIs = $_POST['personelIs'];


    // Veritabanına ekleme sorgusu oluşturuyoruz
    $sql = "INSERT INTO personeller (personel_ad, personel_soyad, personel_dogum_tarihi, personel_ise_baslangic, personel_cinsiyet,personel_gorevi)
            VALUES ('$personelAd', '$personelSoyad', '$dogumTarihi', '$iseBaslamaTarihi', '$personelCinsiyet', '$personelIs')";

    // Sorguyu çalıştırıyoruz ve sonucu kontrol ediyoruz
    if ($conn->query($sql) === TRUE) {
        echo "Yeni kayıt başarıyla eklendi";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }

    // Veritabanı bağlantısını kapatıyoruz
    $conn->close();
} else {
    echo "Hata: Formdan eksik veri gönderildi.";
}
?>