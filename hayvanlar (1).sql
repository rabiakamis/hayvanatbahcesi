-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 May 2024, 17:22:49
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hayvanlar`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hayvanlar`
--

CREATE TABLE `hayvanlar` (
  `hayvan_id` int(11) NOT NULL,
  `hayvan_ad` varchar(255) DEFAULT NULL,
  `hayvan_turu` varchar(255) DEFAULT NULL,
  `hayvan_saglik` varchar(255) DEFAULT NULL,
  `hayvan_yeme` varchar(255) DEFAULT NULL,
  `hayvan_yasam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `hayvanlar`
--

INSERT INTO `hayvanlar` (`hayvan_id`, `hayvan_ad`, `hayvan_turu`, `hayvan_saglik`, `hayvan_yeme`, `hayvan_yasam`) VALUES
(1, 'sinek', 'Omurgalı', 'kötü', 'Et Obur', 'Havada Yaşayan'),
(2, 'ayı', 'Omurgalı', 'obez', 'Et Obur', 'Karada Yaşayan'),
(4, 'kurt', 'Omurgalı', 'iyi', 'Et Obur', 'Karada Yaşayan'),
(6, 'kuş', 'Omurgalı', 'iyi', 'Hem Et Obur Hem Ot Obur', 'Havada Yaşayan');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personeller`
--

CREATE TABLE `personeller` (
  `personel_id` int(11) NOT NULL,
  `personel_ad` varchar(50) DEFAULT NULL,
  `personel_soyad` varchar(50) DEFAULT NULL,
  `personel_dogum_tarihi` varchar(50) DEFAULT NULL,
  `personel_ise_baslangic` varchar(50) DEFAULT NULL,
  `personel_cinsiyet` varchar(10) DEFAULT NULL,
  `personel_gorevi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `personeller`
--

INSERT INTO `personeller` (`personel_id`, `personel_ad`, `personel_soyad`, `personel_dogum_tarihi`, `personel_ise_baslangic`, `personel_cinsiyet`, `personel_gorevi`) VALUES
(2, 'hanife', 'kamış', '2024-05-02', '2024-05-17', 'Kadın', 'bakıcı'),
(3, 'Selim', 'gedik', '1990-02-12', '2024-04-04', 'Erkek', 'veter'),
(4, 'erva', 'gedik', '1991-07-17', '2024-04-04', 'Kadın', 'veteriner');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ziyaretciler`
--

CREATE TABLE `ziyaretciler` (
  `ziyaretci_id` int(11) NOT NULL,
  `ziyaretci_ad` varchar(255) DEFAULT NULL,
  `ziyaretci_soyad` varchar(255) DEFAULT NULL,
  `ziyaretci_yas` varchar(255) DEFAULT NULL,
  `ziyaretci_cinsiyet` varchar(255) DEFAULT NULL,
  `ziyaret_tarihi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ziyaretciler`
--

INSERT INTO `ziyaretciler` (`ziyaretci_id`, `ziyaretci_ad`, `ziyaretci_soyad`, `ziyaretci_yas`, `ziyaretci_cinsiyet`, `ziyaret_tarihi`) VALUES
(1, 'rwgreg', 'ergertvg', '32', 'Kadın', '2024-05-02'),
(2, 'rabia', 'kamış', '21', 'Kadın', '2024-05-08'),
(3, 'nermin', 'baycan', '21', 'Kadın', '2024-05-08'),
(4, 'fatma', 'uysal', '51', 'Kadın', '2024-05-04'),
(5, 'ali', 'kara', '32', 'Erkek', '2024-03-01'),
(6, 'semiha', 'ulu', '43', 'Kadın', '2024-05-02'),
(7, 'nermin', 'kılıç', '34', 'Kadın', '2024-05-04');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `hayvanlar`
--
ALTER TABLE `hayvanlar`
  ADD PRIMARY KEY (`hayvan_id`);

--
-- Tablo için indeksler `personeller`
--
ALTER TABLE `personeller`
  ADD PRIMARY KEY (`personel_id`);

--
-- Tablo için indeksler `ziyaretciler`
--
ALTER TABLE `ziyaretciler`
  ADD PRIMARY KEY (`ziyaretci_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `hayvanlar`
--
ALTER TABLE `hayvanlar`
  MODIFY `hayvan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `personeller`
--
ALTER TABLE `personeller`
  MODIFY `personel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `ziyaretciler`
--
ALTER TABLE `ziyaretciler`
  MODIFY `ziyaretci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
