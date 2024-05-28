<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
include('sql.php');

// Veritabanından hayvan verilerini çekiyoruz
$sql = "SELECT hayvan_id, hayvan_ad, hayvan_turu, hayvan_saglik, hayvan_yeme, hayvan_yasam FROM hayvanlar";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hayvan Listesi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Hayvan Listesi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hayvan ID</th>
                    <th>Hayvan Adı</th>
                    <th>Hayvan Türü</th>
                    <th>Sağlık Durumu</th>
                    <th>Beslenme Alışkanlığı</th>
                    <th>Yaşam Alanı</th>
                    <th>İşlemler</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Her satır için veri döngüsü
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["hayvan_id"] . "</td>";
                        echo "<td>" . $row["hayvan_ad"] . "</td>";
                        echo "<td>" . $row["hayvan_turu"] . "</td>";
                        echo "<td>" . $row["hayvan_saglik"] . "</td>";
                        echo "<td>" . $row["hayvan_yeme"] . "</td>";
                        echo "<td>" . $row["hayvan_yasam"] . "</td>";
                        echo "<td>";
                        echo "<a href='hayvan_sil.php?id=" . $row["hayvan_id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bu kaydı silmek istediğinizden emin misiniz?\")'>Sil</a>"; // Yönlendirme yapıldı
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='hayvan_guncelle.php?id=" . $row["hayvan_id"] . "' class='btn btn-primary btn-sm' onclick='return'>Güncelle</a>"; // Yönlendirme yapıldı
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
