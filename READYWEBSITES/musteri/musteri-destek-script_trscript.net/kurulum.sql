-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 14 Tem 2015, 23:29:54
-- Sunucu sürümü: 5.5.42-cll
-- PHP Sürümü: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `musterid_2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE IF NOT EXISTS `ayar` (
  `id` int(11) NOT NULL DEFAULT '0',
  `firmaadi` text NOT NULL,
  `paypalmail` text NOT NULL,
  `smsdurum` int(1) NOT NULL DEFAULT '1',
  `smsid` int(11) DEFAULT NULL,
  `smskey` varchar(60) DEFAULT NULL,
  `smstel` bigint(11) DEFAULT NULL,
  `banka` text CHARACTER SET latin5 NOT NULL,
  `kayitsms` int(1) NOT NULL DEFAULT '1',
  `uyesms` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`id`, `firmaadi`, `paypalmail`, `smsdurum`, `smsid`, `smskey`, `smstel`, `banka`, `kayitsms`, `uyesms`) VALUES
(0, 'Musteri-Destek.net', 'mailadresiniz@mail.com', 1, NULL, NULL, NULL, 'Banka Hesap Bilgileriniz', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE IF NOT EXISTS `duyurular` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `pm` text CHARACTER SET latin5 NOT NULL,
  `trh` date NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `duyurular`
--

INSERT INTO `duyurular` (`did`, `pm`, `trh`) VALUES
(3, 'Bu script musteri-destek.net tarafından ücretsiz dağıtılmaktadır. Güvenliğiniz için web sitemizden indirin', '2015-07-13'),
(4, 'Script ile ilgili web sitemizden ücretsiz destek alabilirsiniz! musteri-destek.net', '2015-07-13');
(6, 'Sms sistemine kayıt olmak için! musteri-destek.net/support adresinden kayıt olun!', '2015-07-13');
(7, 'Sms sistemine kayıt olanlar güncellemelerden ücretsiz yararlanacaklar!', '2015-07-13');
(5, 'Paypal otomatik ödeme için paypal ayarlarınızı yapmalısınız. Öğrenmek için <a href="http://musteri-destek.net/support/paypalayarlari.png">tıklayın.</a>', '2015-07-13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE IF NOT EXISTS `mesajlar` (
  `mno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kim` int(11) DEFAULT NULL,
  `zaman` datetime DEFAULT NULL,
  `ticketid` int(60) DEFAULT NULL,
  `mesaj` text CHARACTER SET latin5 NOT NULL,
  `y` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=216 ;

-- --------------------------------------------------------



--
-- Tablo için tablo yapısı `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `kim` int(11) NOT NULL,
  `baslik` text CHARACTER SET latin5 NOT NULL,
  `durum` int(11) NOT NULL,
  `gun` date NOT NULL,
  `ka` text NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE IF NOT EXISTS `urunler` (
  `uno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `urun_adi` text CHARACTER SET latin5,
  `urun_fiyat` int(4) DEFAULT NULL,
  `urun_kimin` int(4) DEFAULT NULL,
  `urun_durumu` int(11) DEFAULT '0',
  `urun_bilgisi` text CHARACTER SET latin5,
  `urun_aciklama` text CHARACTER SET latin5,
  `urun_bitistarihi` date DEFAULT NULL,
  `urun_odemedurumu` int(1) NOT NULL DEFAULT '1',
  `urun_sipariszamani` datetime NOT NULL,
  `urun_alistarihi` date DEFAULT NULL,
  PRIMARY KEY (`uno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kadi` varchar(15) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `sifre` varchar(50) DEFAULT NULL,
  `kayittarihi` date DEFAULT NULL,
  `songiris` varchar(20) DEFAULT NULL,
  `yetki` int(1) NOT NULL DEFAULT '0',
  `ad` text CHARACTER SET latin5,
  `kredi` int(11) NOT NULL DEFAULT '0',
  `smskodu` int(4) NOT NULL,
  `sifunut` int(10) NOT NULL,
  `smsonay` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kadi`, `tel`, `sifre`, `kayittarihi`, `songiris`, `yetki`, `ad`, `kredi`, `smskodu`, `smsonay`) VALUES
(67, 'admin', '5420000000', '14e1b600b1fd579f47433b88e8d85291', '2015-07-10', '2015.07.14 23:18:18', 1, 'Ad Soyad', 0, 0, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
