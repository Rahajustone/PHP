<?php
session_start();
error_reporting(0);

if(!isset($_POST['urunID']) || empty($_POST['urunID']) || !isset($_POST['kat']) || empty($_POST['kat']) || !isset($_POST['toplam']) || empty($_POST['toplam'])) { exit(); } else
{
	include('../../library/Elkatek_Connection.php');
	include('../../library/guvenlik.php');
	include('../../library/functions.php');
	$fonks = new yeniyol();
	
	function temizle($veri) { return trim(strip_tags(mysql_real_escape_string($veri))); }
	
	$say=mysql_num_rows(mysql_query("SELECT id FROM sepet WHERE sepet='".temizle($sessionID)."' AND urun='".intval($_POST['urunID'])."'"));
	if($say>0)
	{
		$guncelle=mysql_query("UPDATE sepet SET adet=adet+".intval($_POST['toplam'])."  WHERE sepet='".temizle($sessionID)."' AND urun='".intval($_POST['urunID'])."' LIMIT 1");
	}
	else
	{	
		$kayit=mysql_query("INSERT INTO sepet VALUES(NULL,'".date("Y-m-d")."','".temizle($sessionID)."','".intval($_POST['kat'])."','".intval($_POST['toplam'])."','".intval($_POST['urunID'])."','')");
	}
	echo $fonks->sepet(temizle($sessionID));

	$baglan->kapat();
}
?>