<?php ob_start(); session_start(); include "ayar.php"; include "fonksiyonlar.php";
$islem = strip_tags(htmlspecialchars($_GET['islem']));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<title>YUREGIM Internet Hizmetleri</title> 
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254"/> 
<link rel="stylesheet" href="resimler/yuregim.css" type="text/css"/>
</head> 
<body> 
<div id="kaplama"> 
	<div class="girisalani">
	<? if ($_POST) {	
	$kullanici = md5(strip_tags(htmlspecialchars($_POST["kullanici"])));
	$sifre = md5(strip_tags(htmlspecialchars($_POST["sifre"])));
	if (empty($kullanici) || empty($kullanici) || $kullanici == md5("Kullanıcı Adınız") || $sifre == md5("Şifreniz")) {
	echo '<div class="girisuyari"><b>Boş</b> kullanıcı / şifre</div>';
	} else { 
	$baglan = mysql_query("select * from admin where kullanici='$kullanici' and sifre='$sifre'");
	if (mysql_num_rows($baglan) > 0) {
	$_SESSION["kullanici"] = md5($kullanici);
	Header ("Location:alacaklar.php?islem=bak");
	} else {
	echo '<div class="girisuyari"><b>Yanlış</b> kullanıcı / şifre</div>';
	}}}
	?>
	<div class="giris">
	<form action="index.php" method="post">
	<input name="kullanici" type="text" class="inputlar" onfocus="if (this.value == 'Kullanıcı Adınız') this.value = '';"  type="text" value="Kullanıcı Adınız"/>
	<input name="sifre" type="password" class="inputlar" onfocus="if (this.value == 'Şifreniz') this.value = '';"  type="text" value="Şifreniz"/>
	<input name="giris" type="image" src="resimler/giris.jpg" class="girisyap"/>
	</form>
	</div>
	</div>
</div>
</body>
</html>