<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
include('sql.php');

// Veritabanından hayvan verilerini çekiyoruz
$sql = "SELECT personel_id, personel_ad, personel_soyad, personel_dogum_tarihi, personel_ise_baslangic, personel_cinsiyet,personel_gorevi FROM personeller";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Listesi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Personel Listesi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Personel ID</th>
                    <th>Personel Adı</th>
                    <th>Personel Soyadı</th>
                    <th>Personel Doğum Tarihi</th>
                    <th>Personel İşe Başlangıç</th>
                    <th>Personel Cinsiyet</th>
                    <th>Personel Görevi</th>
                    <th>İşlemler</th> <!-- Yeni ekledik -->
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Her satır için veri döngüsü
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["personel_id"] . "</td>";
                        echo "<td>" . $row["personel_ad"] . "</td>";
                        echo "<td>" . $row["personel_soyad"] . "</td>";
                        echo "<td>" . $row["personel_dogum_tarihi"] . "</td>";
                        echo "<td>" . $row["personel_ise_baslangic"] . "</td>";
                        echo "<td>" . $row["personel_cinsiyet"] . "</td>";
                        echo "<td>" . $row["personel_gorevi"] . "</td>";
                        echo "<td>";
                        echo "<a href='personel_sil.php?id=" . $row["personel_id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bu kaydı silmek istediğinizden emin misiniz?\")'>Sil</a>"; // Yönlendirme yapıldı
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='personel_guncelle.php?id=" . $row["personel_id"] . "' class='btn btn-primary btn-sm' onclick='return'>Güncelle</a>"; // Yönlendirme yapıldı
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Kayıt bulunamadı</td></tr>";
                }
                // Veritabanı bağlantısını kapatıyoruz
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
