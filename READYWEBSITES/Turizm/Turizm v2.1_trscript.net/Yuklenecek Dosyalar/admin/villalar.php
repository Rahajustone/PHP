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
                   <div class="sol solbaslik fontkalin">VİLLA LİSTESİ</div>
                    <div class="sol alt">
<? 
if($_GET[sil]==sil){
$silindi=mysql_query("DELETE FROM villalar where villa_id='$_GET[villa_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Villa Silindi.</div>';
}
?>
						<div class="temizle sag incele fontkalin" style="background:#cc0000; width:94px;"><a href="villaekle.php" style="color:#fff">Villa Ekle</a></div>
						<div class="temizle sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list2 fontkalin" style="background:#fff; width:190px;">Villa Adı</div>
						<div class="sol tarih fontkalin" style="background:#fff; width:170px;">Bölge</div>
						<div class="sol tarih fontkalin" style="background:#fff; width:100px;">Fiyatlandırma</div>
						<div class="sol incele fontkalin" style="background:#fff; width:30px">S.A</div>
						<div class="sol incele fontkalin" style="background:#fff;">Resim</div>
						<div class="sol duzenle fontkalin" style="background:#fff;">Güncelle</div>
						<div class="sol sil fontkalin" style="background:#fff;">Sil</div>
<?
$ayar=mysql_query("select * from villalar order by villa_id desc");
$sayi=1;
while($ayarveri = mysql_fetch_array($ayar)) {
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
?>                          
						<div class="temizle sol sira" style="background:<? echo $renk; ?>"><? echo $sayi; ?></div>
						<div class="sol list2" style="background:<? echo $renk; ?>; width:190px;"><? echo $ayarveri[villaadi_tr]; ?></div>
						<div class="sol tarih" style="background:<? echo $renk; ?>; width:160px; text-align:left; padding-left:10px;"><? $bolge=mysql_query("select * from villailceler order by ilce_id desc"); $bolgeveri = mysql_fetch_array($bolge); echo $bolgeveri[ilce_adi_tr]; ?></div>
						<div class="sol tarih" style="background:<? echo $renk; ?>; width:100px;"><a href="villafiyatlandirma.php?villa_id=<? echo $ayarveri[villa_id]; ?>">Fiyatlandırma</a></div>
						<div class="sol incele" style="background:<? echo $renk; ?>; width:30px"><a href="villatarih.php?villa_id=<? echo $ayarveri[villa_id]; ?>"><img src="tema/incele.png" alt="" /></a></div>
						<div class="sol incele" style="background:<? echo $renk; ?>"><a href="villaresimekle.php?villa_id=<? echo $ayarveri[villa_id]; ?>"><img src="tema/icon_resim.png" alt="" /></a> <a href="villaresimsil.php?villa_id=<? echo $ayarveri[villa_id]; ?>"><img src="tema/icon_delete.png" alt="" /></a></div>
						<div class="sol duzenle" style="background:<? echo $renk; ?>"><a href="villaduzenle.php?villa_id=<? echo $ayarveri[villa_id]; ?>"><img src="tema/duzenle.png" alt="" /></a></div>
						<div class="sol sil" style="background:<? echo $renk; ?>"><a href="villalar.php?sil=sil&villa_id=<? echo $ayarveri[villa_id]; ?>"><img src="tema/sil.png" alt="" /></a></div>
<? $sayi++;} ?>              
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
