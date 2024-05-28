<?php
// Oturumu başlat
session_start();

// Oturumda kullanıcı adı var mı kontrol edelim
if (!isset($_SESSION['username'])) {
    // Kullanıcı oturum açmamışsa giriş sayfasına yönlendir
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Örneği</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style>
        /* Tam ekran arka plan görüntüsü için CSS */
        body, html {
            height: 100%;
            margin: 0;
        }
        .fullscreen-bg {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center center;
            background-image: url('panda.jpg'); /* Arka plan görüntüsü burada belirleniyor */
        }
        .navbar {
            z-index: 999; /* Navigasyonun diğer içeriklerin önünde olmasını sağlar */
        }
        .navbar-nav > li > a {
            color: white !important; /* Yazı rengini beyaz yapma */
            font-family: "Poppins", sans-serif;
        }
        .navbar-header >a{
            color: white !important; /* Yazı rengini beyaz yapma */
            font-family: "Poppins", sans-serif;
        }
        nav a:hover{
        background-color: #ffffff;
        transition:0.5s;
        color:black !important ;
        border-radius: 10rem;
        }
       
        .formContainer {
            display: none; /* Form container'ları varsayılan olarak gizli yap */
            background-color: rgba(0, 0, 0, 0.5); /* Siyah transparan arka plan */
            color: rgb(0, 0, 0); /* Metin rengini beyaz yapma */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            }

        .btn-black {
            background-color: rgb(0, 0, 0); /* Butonun arka plan rengini siyah yap */
            color: rgb(255, 255, 255); /* Yazı rengini beyaz yap */
            border: 1px solid black; /* Kenarlık rengini siyah yapabilirsiniz */
        }


    </style>
</head>
<body>

    <!-- Tam ekran arka plan görüntüsü içeren div -->
    <div class="fullscreen-bg">

        <!-- Bootstrap navigasyon menüsü -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="test.php">Anasayfa</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a href="hayvanlar_goster.php">Hayvanlar</a></li>
                    <li class="nav-item"><a href="ziyaretci_goster.php">Ziyaretçiler</a></li>
                    <li class="nav-item"><a href="personel_goster.php">Personeller</a></li>
                </ul>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-4">
                    <button type="button" class="btn btn-black btn-block" onclick="openForm('HayvanEkleme')">Hayvan Ekle</button>
                </div>
                <div class="col-sm-4">
                    <button type="button" class="btn btn-black btn-block" onclick="openForm('ZiyaretciEkleme')">Ziyaretçi Ekle</button>
                </div>
                <div class="col-sm-4">
                    <button type="button" class="btn btn-black btn-block" onclick="openForm('PersonelEkleme')">Personel Ekle</button>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <form method="post" action="hayvan_ekle.php">
                    <div id="HayvanEkleme" class="formContainer col-sm-4 d-none"> 
                        <!-- Hayvan ekleme -->
                            
                            <div class="mb-3">
                                <label for="AnimalName">Hayvan Adı:</label>
                                <input type="text" id="AnimalName" name="AnimalName">
                            </div>
                            <div class="mb-3">
                                <label for="sel1" class="form-label">Hayvan Türü Nedir?</label>
                                <select class="form-select" id="sel1" name="sel1">
                                    <option value="Omurgalı">Omurgalı</option>
                                    <option value="Omurgasız">Omurgasız</option>   
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="AnimalHealth">Sağlık Durumu:</label>
                                <input type="text" id="AnimalHealth" name="AnimalHealth">
                            </div>
                            <div class="mb-3">
                                <label for="AnimalFood">Beslenme Alışkanlığı:</label>
                                <select class="form-select" id="AnimalFood" name="AnimalFood">
                                    <option value="Et Obur">Et Obur</option>
                                    <option value="Ot Obur">Ot Obur</option>
                                    <option value="Hem Et Obur Hem Ot Obur">Hem Et Obur Hem Ot Obur</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="AnimalPlace">Yaşam Alanı Seçiniz:</label>
                                <select class="form-select" id="AnimalPlace" name="AnimalPlace">
                                    <option value="Havada Yaşayan">Havada Yaşayan</option>
                                    <option value="Karada Yaşayan">Karada Yaşayan</option>
                                    <option value="Suda Yaşayan">Suda Yaşayan</option>
                                    <option value="Hem Suda Hem Karada Yaşayan">Hem Suda Hem Karada Yaşayan</option> 
                                </select>
                            </div>
                            <button type="submit" class="btn btn-black">Hayvan Ekle</button>
                        <!--Hayvan bitiş-->
                    </div>
                </form>

                <!--Hayvan bitiş-->
                
                 <!--Ziyaretçi ekleme-->
                <form method="post" action="ziyaretci_ekle.php">
                    <div id="ZiyaretciEkleme" class="formContainer col-sm-4 d-none"> 
                        <div class="mb-3">
                            <label for="ziyaretciAd">Ziyaretçi Adı:</label>
                            <input type="text" id="ziyaretciAd" name="ziyaretciAd">
                        </div>
                        <div class="mb-3">
                            <label for="ziyaretciSoyadAd">Ziyaretçi Soyadı:</label>
                            <input type="text" id="ziyaretciSoyadAd" name="ziyaretciSoyadAd">
                        </div>
                        <div class="mb-3">
                            <label for="ziyaretciYas">Ziyaretçi Yaşı:</label>
                            <input type="text" id="ziyaretciYas" name="ziyaretciYas">
                        </div>
                        <div class="mb-3">
                            <label for="ziyaretciCinsiyet">Cinsiyet Seçiniz:</label>
                            <select class="form-select" id="ziyaretciCinsiyet" name="ziyaretciCinsiyet">
                                <option value="Kadın">Kadın</option>
                                <option value="Erkek">Erkek</option>
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="#Date">Ziyaret Tarihi</label>
                        <input type="date" id="#Date" name="ziyaretTarihi">
                    </div>
                        <button type="submit" class="btn btn-black">Ziyaretçi Ekle</button>
                    </div>
                </form>
                <!--Ziyaretçi bitiş-->
                
                <!--Personel ekleme-->
                <form method="post" action="personel_ekle.php">
                    <div id="PersonelEkleme" class="formContainer col-sm-4 d-none"> 
                        <!-- Form 3 İçeriği Buraya Gelecek -->
                        <div class="mb-3">
                            <label for="personelAd">Personel Adı:</label>
                            <input type="text" id="personelAd" name="personelAd">
                        </div>
                        <div class="mb-3">
                            <label for="personelSoyad">Personel Soyadı:</label>
                            <input type="text" id="personelSoyad" name="personelSoyad">
                        </div>
                        <div class="mb-3">
                            <label for="#Date">Doğum Tarihi</label>
                            <input type="date" id="#Date" name="dogumTarihi">
                        </div>
                        <div class="mb-3">
                            <label for="#Date">İşe Başlama Tarihi</label>
                            <input type="date" id="#Date" name="iseBaslamaTarihi">
                        </div>
                        <div class="mb-3">
                            <label for="personelCinsiyet">Cinsiyet Seçiniz:</label>
                            <select class="form-select" id="personelCinsiyet" name="personelCinsiyet">
                                <option value="Kadın">Kadın</option>
                                <option value="Erkek">Erkek</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="personelIs">Personel Görevi:</label>
                            <input type="text" id="personelIs" name="personelIs">
                        </div>
            
                        <button type="submit" class="btn btn-black">Personel Ekle</button>
                    </div>
                </form>
                <!--Personel bitiş-->
            </div>
        </div>
        
    </div>

    <script>
        function openForm(formId) {
            // Tüm form container'larını gizle
            var formContainers = document.querySelectorAll(".formContainer");
            formContainers.forEach(function(container) {
                container.style.display = "none";
            });

            // Verilen form ID'sine sahip formu göster
            var formToShow = document.getElementById(formId);
            if (formToShow) {
                formToShow.style.display = "block";
            }
        }
    </script>

</body>
</html>
