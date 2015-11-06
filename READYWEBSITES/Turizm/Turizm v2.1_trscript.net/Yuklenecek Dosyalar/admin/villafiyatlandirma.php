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
<?
$otel=mysql_query("select * from villalar where villa_id='$_GET[villa_id]'");
$otelveri = mysql_fetch_array($otel);
?>
                    <div class="sol solbaslik fontkalin"><span style="color:#cc0000"><? echo $otelveri[villaadi_tr]; ?> >></span> FİYATLANDIRMA YÖNETİMİ</div>
                    <div class="sol alt">
<?
if(($_GET[sil]==sil) and !empty($_GET[fiyat_id])){
$silindi=mysql_query("DELETE FROM villa_fiyat where fiyat_id='$_GET[fiyat_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Fiyat ve Tarih Aralığı Silindi.</div>';
}
?>
						<div class="sag incele fontkalin" style="background:#cc0000; width:134px;"><a href="villaucretlendirme.php?villa_id=<? echo $_GET[villa_id]; ?>" style="color:#fff">Ücretlendirme Ekle</a></div>
						<div class="temizle sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list1 fontkalin" style="background:#fff; width:506px">Tarih Aralığı</div>
						<div class="sol list1 fontkalin" style="background:#fff; width:100px; padding-left:0px; text-align:center;">Ücretlendirme</div>
						<div class="sol sil fontkalin" style="background:#fff;">Sil</div>

<?
$tarih=mysql_query("select * from villa_fiyat where villa_id='$_GET[villa_id]'");
while($tarihveri = mysql_fetch_array($tarih)) {
?>
						<div class="temizle sol sira" style="background:#99CC33">-</div>
						<div class="sol list1" style="background:#99CC33; width:506px"><? echo $tarihveri[tarih1]; ?> - <? echo $tarihveri[tarih2]; ?></div>
						<div class="sol list1 " style="background:#99CC33; width:100px; padding-left:0px; text-align:center;"><? echo $tarihveri[ucret]; ?>.00 TL</div>
						<div class="sol sil" style="background:#99CC33"><a href="villafiyatlandirma.php?fiyat_id=<? echo $tarihveri[fiyat_id]; ?>&villa_id=<? echo $_GET[villa_id]; ?>&sil=sil"><img src="tema/sil.png" alt="" /></a></div>
<? } ?>




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
