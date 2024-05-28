<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz

include('sql.php');
// Eğer form gönderilmişse (yani güncelleme butonuna basılmışsa) 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alıyoruz
    $ziyaretci_id = $_POST["ziyaretci_id"];
    $ziyaretci_ad = $_POST["ziyaretci_ad"];
    $ziyaretci_soyad = $_POST["ziyaretci_soyad"];
    $ziyaretci_yas = $_POST["ziyaretci_yas"];
    $ziyaretci_cinsiyet = $_POST["ziyaretci_cinsiyet"];
    $ziyaret_tarihi = $_POST["ziyaret_tarihi"];
    // Veritabanında ilgili kaydı güncelliyoruz
    $sql = "UPDATE ziyaretciler SET 
            ziyaretci_ad = '$ziyaretci_ad', 
            ziyaretci_soyad = '$ziyaretci_soyad', 
            ziyaretci_yas = '$ziyaretci_yas', 
            ziyaretci_cinsiyet = '$ziyaretci_cinsiyet', 
            ziyaret_tarihi = '$ziyaret_tarihi'
            WHERE ziyaretci_id = $ziyaretci_id";

    if ($conn->query($sql) === TRUE) {
        echo "Ziyaretçi bilgileri başarıyla güncellendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Eğer bir ziyaretci_id gönderilmişse, ilgili Ziyaretçiı veritabanından alıyoruz
if(isset($_GET["id"])) {
    $ziyaretci_id = $_GET["id"];
    $sql = "SELECT * FROM ziyaretciler WHERE ziyaretci_id = $ziyaretci_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziyaretçi Bilgilerini Güncelle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Ziyaretçi Bilgilerini Güncelle</h2>
        <form method="post">
            <div class="form-group">
                <label for="ziyaretci_ad">Ziyaretçi Adı:</label>
                <input type="text" class="form-control" id="ziyaretci_ad" name="ziyaretci_ad" value="<?php echo $row['ziyaretci_ad']; ?>">
            </div>
            <div class="form-group">
                <label for="ziyaretci_soyad">Ziyaretçi Soyadı:</label>
                <input type="text" class="form-control" id="ziyaretci_soyad" name="ziyaretci_soyad" value="<?php echo $row['ziyaretci_soyad']; ?>">
            </div>
            <div class="form-group">
                <label for="ziyaretci_yas">Ziyaretçi Yaşı:</label>
                <input type="text" class="form-control" id="ziyaretci_yas" name="ziyaretci_yas" value="<?php echo $row['ziyaretci_yas']; ?>">
            </div>
            <div class="form-group">
                <label for="ziyaretci_cinsiyet">Ziyaretçi Cinsiyeti:</label>
                <input type="text" class="form-control" id="ziyaretci_cinsiyet" name="ziyaretci_cinsiyet" value="<?php echo $row['ziyaretci_cinsiyet']; ?>">
            </div>
            <div class="form-group">
                <label for="ziyaret_tarihi">Ziyareti Tarihi:</label>
                <input type="text" class="form-control" id="ziyaret_tarihi" name="ziyaret_tarihi" value="<?php echo $row['ziyaret_tarihi']; ?>">
            </div>
            
            <input type="hidden" name="ziyaretci_id" value="<?php echo $row['ziyaretci_id']; ?>">
            <button type="submit" class="btn btn-primary">Güncelle</button>
            <a href="test.php" class="btn btn-primary btn-default">Ana Sayfa</a>
        </form>
    </div>
</body>
</html>