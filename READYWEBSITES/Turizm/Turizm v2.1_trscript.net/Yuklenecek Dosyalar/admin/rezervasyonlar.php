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
                    <div class="sol solbaslik fontkalin">REZERVASYON LİSTESİ</div>
                    <div class="sol alt">
<?
if($_GET[sil]==sil){
$silindi=mysql_query("DELETE FROM rezervasyon where rezervasyon_id='$_GET[rezervasyon_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Rezervasyon Silindi.</div>';
}
?>
						<div class="sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list1 fontkalin" style="background:#fff;">Rezervasyon Sahibi</div>
						<div class="sol tarih fontkalin" style="background:#fff;">Giriş Tarihi</div>
						<div class="sol incele fontkalin" style="background:#fff;">Detay</div>
						<div class="sol duzenle fontkalin" style="background:#fff;">Düzenle</div>
						<div class="sol sil fontkalin" style="background:#fff;">Sil</div>
<?
$ayar=mysql_query("select * from rezervasyon order by rezervasyon_id desc limit 40");
$sayi=1;
while($ayarveri = mysql_fetch_array($ayar)) {
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
?>   
						<div class="temizle sol sira" style="background:<? echo $renk; ?>"><? echo $sayi; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>;"><? echo $ayarveri[adisoyadi]; ?></div>
						<div class="sol tarih" style="background:<? echo $renk; ?>;"><? echo $ayarveri[giristarihi]; ?></div>
						<div class="sol duzenle" style="background:<? echo $renk; ?>"><a href="rezervasyondetayi.php?rezervasyon_id=<? echo $ayarveri[rezervasyon_id]; ?>"><img src="tema/incele.png" alt="" /></a></div>
						<div class="sol duzenle" style="background:<? echo $renk; ?>"><a href="rezervasyonduzenle.php?rezervasyon_id=<? echo $ayarveri[rezervasyon_id]; ?>"><img src="tema/duzenle.png" alt="" /></a></div>
						<div class="sol sil" style="background:<? echo $renk; ?>"><a href="rezervasyonlar.php?rezervasyon_id=<? echo $ayarveri[rezervasyon_id]; ?>&sil=sil"><img src="tema/sil.png" alt="" /></a></div>
                        
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
