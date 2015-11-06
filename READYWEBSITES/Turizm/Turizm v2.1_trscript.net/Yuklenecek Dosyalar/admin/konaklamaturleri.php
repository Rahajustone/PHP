<?
include('inc/ayar.php');
include('inc/kontrol.php');
$ekle=uzanti2($adres2);
if(empty($ekle)){
$_SESSION['ayarlar'] = uzanti($adres);
}
else {
$_SESSION['ayarlar'] = uzanti2($adres2);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<link rel="stylesheet" type="text/css" href="css/terminal.css" />
<script type="text/javascript" src="js/jquery-1.4.2.js"></script> 
<title>Otel Yönetim Paneli</title>
</head>

<body>
	<div id="genel">
<?
include('inc/ust.php');
include('inc/altmenu.php');
?>

        <div class="temizle sol" style="margin-top:25px">
        	<div id="solmenu" class="sol">
<?
include('inc/sol.php');
?>
            </div>
        	<div id="ortaalan" class="sol">
                <div class="sol temizle">
                    <div class="sol solbaslik fontkalin">KONAKLAMA TÜRLERİ</div>
                    <div class="sol alt">
<?
if(($_GET[sil]==sil) and !empty($_GET[konaklama_id])){
$silindi=mysql_query("DELETE FROM konaklama where konaklama_id='$_GET[konaklama_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Konaklama Türü silindi.</div>';
}
?>
						<div class="sag incele fontkalin" style="background:#cc0000; width:134px;"><a href="konaklamaekle.php" style="color:#fff">Konaklama Türü Ekle</a></div>
						<div class="temizle sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list1 fontkalin" style="background:#fff; width:610px">Konaklama Adı</div>
						<div class="sol sil fontkalin" style="background:#fff;">Sil</div>
<?
$ayar=mysql_query("select * from konaklama order by konaklama_adi_tr asc limit 40");
$sayi=1;
while($ayarveri = mysql_fetch_array($ayar)) {
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
?>   
						<div class="temizle sol sira" style="background:<? echo $renk; ?>"><? echo $sayi; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:610px"><? echo $ayarveri[konaklama_adi_tr]; ?></div>
						<div class="sol sil" style="background:<? echo $renk; ?>"><a href="konaklamaturleri.php?konaklama_id=<? echo $ayarveri[konaklama_id]; ?>&sil=sil"><img src="tema/sil.png" alt="" /></a></div>
<? $sayi++; } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?
include('inc/foother.php');
?>
</body>
</html>
