<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
include('sql.php');
//personel_id, personel_ad, personel_soyad, personel_dogum_tarihi, personel_ise_baslangic, personel_cinsiyet,personel_gorevi
// Eğer form gönderilmişse (yani güncelleme butonuna basılmışsa) 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alıyoruz
    $personel_id = $_POST["personel_id"];
    $personel_ad = $_POST["personel_ad"];
    $personel_soyad = $_POST["personel_soyad"];
    $personel_dogum_tarihi = $_POST["personel_dogum_tarihi"];
    $personel_ise_baslangic = $_POST["personel_ise_baslangic"];
    $personel_cinsiyet = $_POST["personel_cinsiyet"];
    $personel_gorevi = $_POST["personel_gorevi"];
    // Veritabanında ilgili kaydı güncelliyoruz
    $sql = "UPDATE personeller SET 
            personel_ad = '$personel_ad', 
            personel_soyad = '$personel_soyad', 
            personel_dogum_tarihi = '$personel_dogum_tarihi', 
            personel_ise_baslangic = '$personel_ise_baslangic', 
            personel_cinsiyet = '$personel_cinsiyet',
            personel_gorevi = '$personel_gorevi' 
            WHERE personel_id = $personel_id";

    if ($conn->query($sql) === TRUE) {
        echo "Personel bilgileri başarıyla güncellendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Eğer bir personel_id gönderilmişse, ilgili bitkiyi veritabanından alıyoruz
if(isset($_GET["id"])) {
    $personel_id = $_GET["id"];
    $sql = "SELECT * FROM personeller WHERE personel_id = $personel_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Bilgilerini Güncelle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Personel Bilgilerini Güncelle</h2>
        <form method="post">
            <div class="form-group">
                <label for="personel_ad">Personel Adı:</label>
                <input type="text" class="form-control" id="personel_ad" name="personel_ad" value="<?php echo $row['personel_ad']; ?>">
            </div>
            <div class="form-group">
                <label for="personel_soyad">Personel Soyadı:</label>
                <input type="text" class="form-control" id="personel_soyad" name="personel_soyad" value="<?php echo $row['personel_soyad']; ?>">
            </div>
            <div class="form-group">
                <label for="personel_dogum_tarihi">Personel Doğum Tarihi:</label>
                <input type="text" class="form-control" id="personel_dogum_tarihi" name="personel_dogum_tarihi" value="<?php echo $row['personel_dogum_tarihi']; ?>">
            </div>
            <div class="form-group">
                <label for="personel_ise_baslangic">Personel İşe Başlangıç:</label>
                <input type="text" class="form-control" id="personel_ise_baslangic" name="personel_ise_baslangic" value="<?php echo $row['personel_ise_baslangic']; ?>">
            </div>
            <div class="form-group">
                <label for="personel_cinsiyet">Personel Cinsiyet:</label>
                <input type="text" class="form-control" id="personel_cinsiyet" name="personel_cinsiyet" value="<?php echo $row['personel_cinsiyet']; ?>">
            </div>
            <div class="form-group">
                <label for="personel_gorevi">Personel Görevi:</label>
                <input type="text" class="form-control" id="personel_gorevi" name="personel_gorevi" value="<?php echo $row['personel_gorevi']; ?>">
            </div>
            <input type="hidden" name="personel_id" value="<?php echo $row['personel_id']; ?>">
            <button type="submit" class="btn btn-primary">Güncelle</button>
            <a href="test.php" class="btn btn-primary btn-default">Ana Sayfa</a>
        </form>
    </div>
</body>
</html>