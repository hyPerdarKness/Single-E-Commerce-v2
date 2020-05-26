-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Ağu 2019, 16:27:57
-- Sunucu sürümü: 10.3.16-MariaDB
-- PHP Sürümü: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `tekurun`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `content` longtext COLLATE utf8_bin NOT NULL,
  `resimyolu` varchar(100) COLLATE utf8_bin NOT NULL,
  `tarih` datetime NOT NULL,
  `keywords` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `sefurl` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bloks`
--

CREATE TABLE `bloks` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `picture` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `calling`
--

CREATE TABLE `calling` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(50) COLLATE utf8_bin NOT NULL,
  `telefon` varchar(20) COLLATE utf8_bin NOT NULL,
  `tarih` datetime NOT NULL,
  `ip` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `blogID` int(11) NOT NULL,
  `adsoyad` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `yorum` text COLLATE utf8_bin NOT NULL,
  `tarih` datetime NOT NULL,
  `ip` varchar(20) COLLATE utf8_bin NOT NULL,
  `onay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `telefon` varchar(20) COLLATE utf8_bin NOT NULL,
  `mesaj` text COLLATE utf8_bin NOT NULL,
  `tarih` datetime NOT NULL,
  `ip` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odemebildirimi`
--

CREATE TABLE `odemebildirimi` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `telefon` varchar(20) COLLATE utf8_bin NOT NULL,
  `hesap` varchar(100) COLLATE utf8_bin NOT NULL,
  `textnot` text COLLATE utf8_bin NOT NULL,
  `tarih` datetime NOT NULL,
  `ip` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `sira` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `content` longtext COLLATE utf8_bin NOT NULL,
  `sefurl` varchar(100) COLLATE utf8_bin NOT NULL,
  `durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `logo` varchar(150) COLLATE utf8_bin NOT NULL,
  `seolink` varchar(5) COLLATE utf8_bin NOT NULL,
  `keywords` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `facebook` varchar(150) COLLATE utf8_bin NOT NULL,
  `twitter` varchar(150) COLLATE utf8_bin NOT NULL,
  `telefon` varchar(20) COLLATE utf8_bin NOT NULL,
  `color` varchar(10) COLLATE utf8_bin NOT NULL,
  `yerimiz` text COLLATE utf8_bin NOT NULL,
  `contact` text COLLATE utf8_bin NOT NULL,
  `yazi_limit` int(11) NOT NULL,
  `analytics` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`title`, `logo`, `seolink`, `keywords`, `description`, `facebook`, `twitter`, `telefon`, `color`, `yerimiz`, `contact`, `yazi_limit`, `analytics`) VALUES
('Tek Ürün Satış Scripti', '', '.html', '#', '#', '#', '#', '2123 545 00 00', 'green', '<iframe width=\"270\" height=\"250\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"http://maps.google.com/maps?f=q&source=s_q&hl=tr&geocode=&q=%C4%B0stanbul,+T%C3%BCrkiye&aq=0&oq=istanbul&sll=37.0625,-95.677068&sspn=58.598104,135.263672&ie=UTF8&hq=&hnear=%C4%B0stanbul,+T%C3%BCrkiye&t=m&z=11&ll=41.00527,28.97696&output=embed\"></iframe><br /><small><a href=\"http://maps.google.com/maps?f=q&source=embed&hl=tr&geocode=&q=%C4%B0stanbul,+T%C3%BCrkiye&aq=0&oq=istanbul&sll=37.0625,-95.677068&sspn=58.598104,135.263672&ie=UTF8&hq=&hnear=%C4%B0stanbul,+T%C3%BCrkiye&t=m&z=11&ll=41.00527,28.97696\" style=\"color:#0000FF;text-align:left\">Daha Büyük Görüntüle</a></small>', '<b>Adres</b> : asdasd <br><br>\r\n<b>Telefon</b> : 8654654 <br><br>\r\n<b>Mobil</b> : 654654<br><br>\r\n<b>E-Mail</b> : asdasd', 5, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

CREATE TABLE `siparisler` (
  `id` int(11) NOT NULL,
  `urun` varchar(50) COLLATE utf8_bin NOT NULL,
  `yontem` varchar(20) COLLATE utf8_bin NOT NULL,
  `adsoyad` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `telefon` varchar(20) COLLATE utf8_bin NOT NULL,
  `adres` text COLLATE utf8_bin NOT NULL,
  `il` varchar(50) COLLATE utf8_bin NOT NULL,
  `ilce` varchar(50) COLLATE utf8_bin NOT NULL,
  `textnot` text COLLATE utf8_bin NOT NULL,
  `tarih` datetime NOT NULL,
  `ip` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetim`
--

CREATE TABLE `yonetim` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `yonetim`
--

INSERT INTO `yonetim` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `yorum` text COLLATE utf8_bin NOT NULL,
  `tarih` datetime NOT NULL,
  `ip` varchar(20) COLLATE utf8_bin NOT NULL,
  `onay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bloks`
--
ALTER TABLE `bloks`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `calling`
--
ALTER TABLE `calling`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odemebildirimi`
--
ALTER TABLE `odemebildirimi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparisler`
--
ALTER TABLE `siparisler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetim`
--
ALTER TABLE `yonetim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `bloks`
--
ALTER TABLE `bloks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `calling`
--
ALTER TABLE `calling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `odemebildirimi`
--
ALTER TABLE `odemebildirimi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `siparisler`
--
ALTER TABLE `siparisler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `yonetim`
--
ALTER TABLE `yonetim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
