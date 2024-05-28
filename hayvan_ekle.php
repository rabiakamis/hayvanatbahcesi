<?php
if(isset($_POST['AnimalName'], $_POST['sel1'], $_POST['AnimalHealth'], $_POST['AnimalFood'], $_POST['AnimalPlace'])) {
    // Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
    include('sql.php');

    // POST isteği ile gönderilen verileri alıyoruz
    $AnimalName = $_POST['AnimalName'];
    $sel1 = $_POST['sel1'];
    $AnimalHealth = $_POST['AnimalHealth'];
    $AnimalFood = $_POST['AnimalFood'];
    $AnimalPlace = $_POST['AnimalPlace'];

    // Veritabanına ekleme sorgusu oluşturuyoruz
    $sql = "INSERT INTO hayvanlar (hayvan_ad, hayvan_turu, hayvan_saglik, hayvan_yeme, hayvan_yasam)
            VALUES ('$AnimalName', '$sel1', '$AnimalHealth', '$AnimalFood', '$AnimalPlace')";

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