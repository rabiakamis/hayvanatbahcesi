<?php
if(isset($_POST['ziyaretciAd'], $_POST['ziyaretciSoyadAd'], $_POST['ziyaretciYas'], $_POST['ziyaretciCinsiyet'], $_POST['ziyaretTarihi'])) {
    // Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
    include('sql.php');

    // POST isteği ile gönderilen verileri alıyoruz
    $ziyaretciAd = $_POST['ziyaretciAd'];
    $ziyaretciSoyadAd = $_POST['ziyaretciSoyadAd'];
    $ziyaretciYas = $_POST['ziyaretciYas'];
    $ziyaretciCinsiyet = $_POST['ziyaretciCinsiyet'];
    $ziyaretTarihi = $_POST['ziyaretTarihi'];

    // Veritabanına ekleme sorgusu oluşturuyoruz
    $sql = "INSERT INTO ziyaretciler (ziyaretci_ad, ziyaretci_soyad, ziyaretci_yas, ziyaretci_cinsiyet,ziyaret_tarihi)
            VALUES ('$ziyaretciAd', '$ziyaretciSoyadAd', '$ziyaretciYas', '$ziyaretciCinsiyet', '$ziyaretTarihi')";

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