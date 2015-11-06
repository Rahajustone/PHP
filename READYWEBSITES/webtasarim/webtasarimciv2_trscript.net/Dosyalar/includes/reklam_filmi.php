<?php
error_reporting(0);
define('ELKATEK_ELEKTRONIK_YENIYOL',false);
include('../library/Elkatek_Connection.php');
$sorgu=mysql_query("SELECT video FROM ayarlar LIMIT 1");
$yaz=mysql_fetch_assoc($sorgu);

echo stripslashes($yaz['video']);
?>