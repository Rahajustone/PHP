<?php
$host = "localhost";
$dbkullanici = "root";
$dbsifre = "123456";
$dbadi = "kontrol";
$baglanti = @mysql_connect($host,$dbkullanici,$dbsifre) or die ("MySQL bağlantısı yapılamıyor!");
@mysql_select_db($dbadi,$baglanti) or die ("Veritabanına bağlanılamıyor");
mysql_query("SET NAMES 'latin5'"); 
mysql_query("SET CHARACTER SET latin5"); 
mysql_query("SET COLLATION_CONNECTION = 'latin5_turkish_ci'");
?>