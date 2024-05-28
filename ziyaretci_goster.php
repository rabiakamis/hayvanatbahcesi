<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
include('sql.php');

// Veritabanından ziyaretçi verilerini çekiyoruz
$sql = "SELECT ziyaretci_id, ziyaretci_ad, ziyaretci_soyad, ziyaretci_yas, ziyaretci_cinsiyet, ziyaret_tarihi FROM ziyaretciler";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziyaretçi Listesi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Ziyaretçi Listesi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ziyaretçi ID</th>
                    <th>Ziyaretçi Adı</th>
                    <th>Ziyaretçi Soyadı</th>
                    <th>Ziyaretçi Yaşı</th>
                    <th>Ziyaretçi Cinsiyet</th>
                    <th>Ziyaret Tarihi</th>
                    <th>İşlemler</th> <!-- Yeni eklenen sütun -->
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Her satır için veri döngüsü
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ziyaretci_id"] . "</td>";
                        echo "<td>" . $row["ziyaretci_ad"] . "</td>";
                        echo "<td>" . $row["ziyaretci_soyad"] . "</td>";
                        echo "<td>" . $row["ziyaretci_yas"] . "</td>";
                        echo "<td>" . $row["ziyaretci_cinsiyet"] . "</td>";
                        echo "<td>" . $row["ziyaret_tarihi"] . "</td>";
                        echo "<td>";
                        echo "<a href='ziyaretci_sil.php?id=" . $row["ziyaretci_id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bu kaydı silmek istediğinizden emin misiniz?\")'>Sil</a>"; // Yönlendirme yapıldı
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='ziyaretci_guncelle.php?id=" . $row["ziyaretci_id"] . "' class='btn btn-primary btn-sm' onclick='return'>Güncelle</a>"; // Yönlendirme yapıldı
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Kayıt bulunamadı</td></tr>";
                }
                // Veritabanı bağlantısını kapatıyoruz
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
