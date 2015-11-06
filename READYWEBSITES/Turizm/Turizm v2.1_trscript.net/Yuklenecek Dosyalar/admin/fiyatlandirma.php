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
$otel=mysql_query("select * from oteller where otel_id='$_GET[otel_id]'");
$otelveri = mysql_fetch_array($otel);
?>
                    <div class="sol solbaslik fontkalin"><span style="color:#cc0000"><? echo $otelveri[oteladi_tr]; ?> >></span> FİYATLANDIRMA YÖNETİMİ</div>
                    <div class="sol alt">
<?
if(($_GET[sil]==sil) and !empty($_GET[otel_oda_id])){
$silindi=mysql_query("DELETE FROM otel_oda where otel_oda_id='$_GET[otel_oda_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Oda Tipi Silindi.</div>';
}

if(($_GET[sil]==sil) and !empty($_GET[oda_konaklama_id])){
$silindi=mysql_query("DELETE FROM oda_konaklama where oda_konaklama_id='$_GET[oda_konaklama_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Konaklama Türü Silindi.</div>';
}

if(($_GET[sil]==sil) and !empty($_GET[tarih_id])){
$silindi=mysql_query("DELETE FROM tarih_araligi where tarih_id='$_GET[tarih_id]'");
$silindi=mysql_query("DELETE FROM stop_sale where tarih_id='$_GET[tarih_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Tarih Silindi.</div>';
}
if(($_GET[sil]==sil) and !empty($_GET[fiyat_id])){
$silindi=mysql_query("DELETE FROM otel_fiyat where fiyat_id='$_GET[fiyat_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Fiyat ve Tarih Aralığı Silindi.</div>';
}
?>
						<div class="sag incele fontkalin" style="background:#cc0000; width:134px;"><a href="oteleodatipiekle.php?otel_id=<? echo $_GET[otel_id]; ?>" style="color:#fff">Otele Oda Tipi Ekle</a></div>
						<div class="temizle sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list1 fontkalin" style="background:#fff; width:402px">Oda Adı / Tarih Aralığı</div>
						<div class="sol list1 fontkalin" style="background:#fff; width:100px; padding-left:0px; text-align:center;">Ücretlendirme</div>
						<div class="sol list1 fontkalin" style="background:#fff; width:100px; padding-left:0px; text-align:center;">Tarih</div>
						<div class="sol sil fontkalin" style="background:#fff;">Sil</div>
<?
$ayar=mysql_query("select * from otel_oda where otel_id='$_GET[otel_id]' order by otel_oda_id desc limit 40");
$sayi=1;
while($ayarveri = mysql_fetch_array($ayar)) {
$kontrol=$ayarveri[otel_oda_id];
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
if($ayarveri[otel_yildiz]=='0'){ }
else {

$otelismi=mysql_query("select * from odatipleri where oda_id='$ayarveri[oda_id]'");
$otelismiveri = mysql_fetch_array($otelismi);

?>   
						<div class="temizle sol sira" style="background:<? echo $renk; ?>"><? echo $sayi; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:402px"><? echo $otelismiveri[oda_adi_tr]; ?></div>
						<div class="sol list1 " style="background:<? echo $renk; ?>; width:100px; padding-left:0px; padding-top:1px; height:24px; text-align:center;"><? if($ayarveri[carpan_id]=='0'){ ?><a href="ucretlendirmesec.php?otel_oda_id=<? echo $ayarveri[otel_oda_id]; ?>&otel_id=<? echo $_GET[otel_id]; ?>"><span style="padding-top:4px; display:block">Seç</span></a><? } else { 
$carpan=mysql_query("select * from carpanlar where carpan_id='$ayarveri[carpan_id]'");
$carpanveri = mysql_fetch_array($carpan); echo $carpanveri[carpan_adi]; ?><br /><a href="ucretlendirmesec.php?otel_oda_id=<? echo $ayarveri[otel_oda_id]; ?>&otel_id=<? echo $_GET[otel_id]; ?>"><span style="font-size:10px; color:#cc0000">Değiştir</span></a><? } ?></div>
						<div class="sol list1 " style="background:<? echo $renk; ?>; width:100px; padding-left:0px; text-align:center;"><? if($ayarveri[carpan_id]=='0'){ ?><span style="font-size:10px">Önce Ücretlendirme</span><? } else { ?><a href="ucretlendirme.php?otel_id=<? echo $_GET[otel_id]; ?>&otel_oda_id=<? echo $ayarveri[otel_oda_id]; ?>">Ekle</a><? } ?></div>
						<div class="sol sil" style="background:<? echo $renk; ?>"><a href="fiyatlandirma.php?otel_oda_id=<? echo $ayarveri[otel_oda_id]; ?>&otel_id=<? echo $_GET[otel_id]; ?>&sil=sil"><img src="tema/sil.png" alt="" /></a></div>

<?
$tarih=mysql_query("select * from otel_fiyat where otel_oda_id='$ayarveri[otel_oda_id]' order by otel_oda_id asc");
while($tarihveri = mysql_fetch_array($tarih)) {
?>
						<div class="temizle sol sira" style="background:#99CC33">-</div>
						<div class="sol list1" style="background:#99CC33; width:402px"><? echo $tarihveri[tarih1]; ?> - <? echo $tarihveri[tarih2]; ?></div>
						<div class="sol list1 " style="background:#99CC33; width:100px; padding-left:0px; text-align:center;"><? echo $tarihveri[ucret]; ?>.00 TL</div>
						<div class="sol list1 " style="background:#99CC33; width:100px; padding-left:0px; text-align:center;">-</div>
						<div class="sol sil" style="background:#99CC33"><a href="fiyatlandirma.php?fiyat_id=<? echo $tarihveri[fiyat_id]; ?>&otel_id=<? echo $_GET[otel_id]; ?>&sil=sil"><img src="tema/sil.png" alt="" /></a></div>
<? } ?>


<? $sayi++;  } ?>

<?  } ?>


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
