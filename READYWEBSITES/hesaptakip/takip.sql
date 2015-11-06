-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Anamakine: server6.yuregim.com
-- Üretim Zamanı: 21 Eylül 2010 saat 19:32:01
-- Sunucu sürümü: 5.0.51
-- PHP Sürümü: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Veritabanı: `kontrol`
-- 

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `admin`
-- 

CREATE TABLE `admin` (
  `kullanici` varchar(40) NOT NULL,
  `sifre` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Tablo döküm verisi `admin`
-- 

INSERT INTO `admin` VALUES ('21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

-- 
-- Tablo yapısı: `arsiv`
-- 

CREATE TABLE `arsiv` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `durum` int(5) NOT NULL,
  `bitis` varchar(30) NOT NULL,
  `tarih` varchar(25) NOT NULL,
  `adsoyad` varchar(100) NOT NULL,
  `yapilan` varchar(200) NOT NULL,
  `borc` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `arsiv`
-- 


-- --------------------------------------------------------

-- 
-- Tablo yapısı: `hesaplar`
-- 

CREATE TABLE `hesaplar` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `adsoyad` varchar(100) NOT NULL,
  `site` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `yapilan` varchar(100) NOT NULL,
  `tarih` varchar(20) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `alinan` varchar(100) NOT NULL default '0',
  `borc` varchar(20) NOT NULL,
  `arsiv` varchar(2) NOT NULL default '0',
  `durum` varchar(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Tablo döküm verisi `hesaplar`
-- 

