-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 06 May 2014, 23:51:54
-- Sunucu sürümü: 5.5.37
-- PHP Sürümü: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `OgrenciBilgiSistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenciler`
--

CREATE TABLE IF NOT EXISTS `ogrenciler` (
  `numara` int(5) NOT NULL,
  `ad` varchar(20) CHARACTER SET ucs2 COLLATE ucs2_turkish_ci NOT NULL,
  `soyad` varchar(15) CHARACTER SET ucs2 COLLATE ucs2_turkish_ci NOT NULL,
  `sinif` varchar(10) CHARACTER SET ucs2 COLLATE ucs2_turkish_ci NOT NULL,
  `not` int(3) NOT NULL,
  PRIMARY KEY (`numara`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `ogrenciler`
--

INSERT INTO `ogrenciler` (`numara`, `ad`, `soyad`, `sinif`, `not`) VALUES
(909, 'Emre', 'Seymen', '2.sinif', 99),
(989, 'Hasan', 'Uslu', '2.sinif', 90),
(999, 'Ahmet', 'TEMEL', '1.sinif', 99),
(9092, 'OrÃ§un', 'LOL', '3.sinif', 99);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
