<?php 
ob_start(); session_start(); include "ayar.php"; include "fonksiyonlar.php"; kontrol();
$islem = strip_tags(htmlspecialchars($_GET['islem'])); 
$tarih = strip_tags(htmlspecialchars($_GET['tarih'])); 
if($islem != "bak" && $islem != "sil") {Header("Location:index.php");}
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
<div class="icerik">
	<div class="sol">
	<?php menuler();?>
	</div>
	<div class="sag">
	<div class="baslik2"><?php echo $tarih;?> ayına ait hesaplar
	</div>
	<?php
	switch ($islem) {
	default;Header("Location:index.php");break;
	// Sil
	case("sil"):
	arsivhesapsil();
	break;
	// Listeye Bak
	case("bak"):
	?>
	<div class="yazi">
	<?php arsivebak();?>
	</div>
	<?
	break;
	}?>
	</div>
</div>
<?php yapan();?>
</div>
</body>
</html>