<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
include('sql.php');

// GET isteği ile gönderilen id'yi alıyoruz
if(isset($_GET['id'])) {
    $ziyaretci_id = $_GET['id'];

    // Veritabanından ilgili ziyaretçiyi silme sorgusu oluşturuyoruz
    $sql = "DELETE FROM ziyaretciler WHERE ziyaretci_id = $ziyaretci_id";

    // Sorguyu çalıştırıyoruz ve sonucu kontrol ediyoruz
    if ($conn->query($sql) === TRUE) {
        echo "Kayıt başarıyla silindi";
    } else {
        echo "Hata: " . $conn->error;
    }

    // Veritabanı bağlantısını kapatıyoruz
    $conn->close();
} else {
    echo "Hata: Geçersiz ID";
}
?>
