<?php
// Veritabanı bağlantısını sağlamak için sql.php dosyasını dahil ediyoruz
include('sql.php');
// Eğer form gönderilmişse (yani güncelleme butonuna basılmışsa) 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri alıyoruz
    $hayvan_id = $_POST["hayvan_id"];
    $hayvan_ad = $_POST["hayvan_ad"];
    $hayvan_turu = $_POST["hayvan_turu"];
    $hayvan_saglik = $_POST["hayvan_saglik"];
    $hayvan_yeme = $_POST["hayvan_yeme"];
    $hayvan_yasam = $_POST["hayvan_yasam"];
    // Veritabanında ilgili kaydı güncelliyoruz
    $sql = "UPDATE hayvanlar SET 
            hayvan_ad = '$hayvan_ad', 
            hayvan_turu = '$hayvan_turu', 
            hayvan_saglik = '$hayvan_saglik', 
            hayvan_yeme = '$hayvan_yeme', 
            hayvan_yasam = '$hayvan_yasam'
            WHERE hayvan_id = $hayvan_id";

    if ($conn->query($sql) === TRUE) {
        echo "Hayvan bilgileri başarıyla güncellendi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}

// Eğer bir hayvan_id gönderilmişse, ilgili hayvanı veritabanından alıyoruz
if(isset($_GET["id"])) {
    $hayvan_id = $_GET["id"];
    $sql = "SELECT * FROM hayvanlar WHERE hayvan_id = $hayvan_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hayvan Bilgilerini Güncelle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Hayvan Bilgilerini Güncelle</h2>
        <form method="post">
            <div class="form-group">
                <label for="hayvan_ad">Hayvan Adı:</label>
                <input type="text" class="form-control" id="hayvan_ad" name="hayvan_ad" value="<?php echo $row['hayvan_ad']; ?>">
            </div>
            <div class="form-group">
                <label for="hayvan_turu">Hayvan Türü:</label>
                <input type="text" class="form-control" id="hayvan_turu" name="hayvan_turu" value="<?php echo $row['hayvan_turu']; ?>">
            </div>
            <div class="form-group">
                <label for="hayvan_saglik">Hayvan Sağlık Durumu:</label>
                <input type="text" class="form-control" id="hayvan_saglik" name="hayvan_saglik" value="<?php echo $row['hayvan_saglik']; ?>">
            </div>
            <div class="form-group">
                <label for="hayvan_yeme">Hayvan Yeme Alışkanlığı:</label>
                <input type="text" class="form-control" id="hayvan_yeme" name="hayvan_yeme" value="<?php echo $row['hayvan_yeme']; ?>">
            </div>
            <div class="form-group">
                <label for="hayvan_yasam">Hayvan Yaşam Alanı:</label>
                <input type="text" class="form-control" id="hayvan_yasam" name="hayvan_yasam" value="<?php echo $row['hayvan_yasam']; ?>">
            </div>
            
            <input type="hidden" name="hayvan_id" value="<?php echo $row['hayvan_id']; ?>">
            <button type="submit" class="btn btn-primary">Güncelle</button>
            <a href="test.php" class="btn btn-primary btn-default">Ana Sayfa</a>
        </form>
    </div>
</body>
</html>