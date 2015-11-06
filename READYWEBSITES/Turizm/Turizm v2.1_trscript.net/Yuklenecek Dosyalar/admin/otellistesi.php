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
        	<div id="ortaalan" class="sol" style="width:1000px">
                <div class="sol temizle">
                    <div class="sol otel fontkalin">OTEL LİSTESİ</div>
                    <div class="sol otelalt">
<?
if(($_GET[sil]==sil) and !empty($_GET[otel_id])){
$silindi=mysql_query("DELETE FROM oteller where otel_id='$_GET[otel_id]'");
$silindi2=mysql_query("DELETE FROM firsatotelleri where otel_id='$_GET[otel_id]'");
$silindi3=mysql_query("DELETE FROM erkenrezervasyon where otel_id='$_GET[otel_id]'");
$silindi4=mysql_query("DELETE FROM ozeloteller where otel_id='$_GET[otel_id]'");
$silindi5=mysql_query("DELETE FROM bayramotelleri where otel_id='$_GET[otel_id]'");
$silindi6=mysql_query("DELETE FROM termalotelleri where otel_id='$_GET[otel_id]'");
$silindi7=mysql_query("DELETE FROM otel_fiyat where otel_id='$_GET[otel_id]'");
$silindi8=mysql_query("DELETE FROM otel_oda where otel_id='$_GET[otel_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000; width:972px">Otel silindi.</div>';
}
if(($_GET[firsat]==ekle) and !empty($_GET[otel_id])){
$ekle=mysql_query("INSERT INTO firsatotelleri (otel_id) ".
"VALUES('$_GET[otel_id]')");

$guncelle = mysql_query("UPDATE oteller SET otel_firsat='1' WHERE otel_id='$_GET[otel_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000; width:972px">Fırsat Oteli Olarak Eklendi.</div>';
}
if(($_GET[firsat]==cikar) and !empty($_GET[otel_id])){
$silindi=mysql_query("DELETE FROM firsatotelleri where otel_id='$_GET[otel_id]'");
$guncelle = mysql_query("UPDATE oteller SET otel_firsat='0' WHERE otel_id='$_GET[otel_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000; width:972px">Fırsat Oteli Grubundan Silindi.</div>';
}

if(($_GET[erken]==ekle) and !empty($_GET[otel_id])){
$ekle=mysql_query("INSERT INTO erkenrezervasyon (otel_id) ".
"VALUES('$_GET[otel_id]')");
$guncelle = mysql_query("UPDATE oteller SET otel_erken='1' WHERE otel_id='$_GET[otel_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000; width:972px">Erken Rezervasyon Oteli Olarak Eklendi.</div>';
}
if(($_GET[erken]==cikar) and !empty($_GET[otel_id])){
$silindi=mysql_query("DELETE FROM erkenrezervasyon where otel_id='$_GET[otel_id]'");
$guncelle = mysql_query("UPDATE oteller SET otel_erken='0' WHERE otel_id='$_GET[otel_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000; width:972px">Erken Rezervasyon Oteli Grubundan Silindi.</div>';

}

if(($_GET[ozel]==ekle) and !empty($_GET[otel_id])){
$ekle=mysql_query("INSERT INTO ozeloteller (otel_id) ".
"VALUES('$_GET[otel_id]')");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000; width:972px">Özel Otel Olarak Eklendi.</div>';
}
if(($_GET[ozel]==cikar) and !empty($_GET[otel_id])){
$silindi=mysql_query("DELETE FROM ozeloteller where otel_id='$_GET[otel_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000; width:972px">Özel Oteller Grubundan Silindi.</div>';
}

if(($_GET[bayram]==ekle) and !empty($_GET[otel_id])){
$ekle=mysql_query("INSERT INTO bayramotelleri (otel_id) ".
"VALUES('$_GET[otel_id]')");
$guncelle = mysql_query("UPDATE oteller SET otel_bayram='1' WHERE otel_id='$_GET[otel_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000; width:972px">Bayram Oteli Olarak Eklendi.</div>';
}
if(($_GET[bayram]==cikar) and !empty($_GET[otel_id])){
$silindi=mysql_query("DELETE FROM bayramotelleri where otel_id='$_GET[otel_id]'");
$guncelle = mysql_query("UPDATE oteller SET otel_bayram='0' WHERE otel_id='$_GET[otel_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000; width:972px">Bayram Otelleri Grubundan Silindi.</div>';
}

if(($_GET[termal]==ekle) and !empty($_GET[otel_id])){
$ekle=mysql_query("INSERT INTO termalotelleri (otel_id) ".
"VALUES('$_GET[otel_id]')");
$guncelle = mysql_query("UPDATE oteller SET otel_kaplica='1' WHERE otel_id='$_GET[otel_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000; width:972px">Termal & Kaplıca Oteli Olarak Eklendi.</div>';
}
if(($_GET[termal]==cikar) and !empty($_GET[otel_id])){
$silindi=mysql_query("DELETE FROM termalotelleri where otel_id='$_GET[otel_id]'");
$guncelle = mysql_query("UPDATE oteller SET otel_kaplica='0' WHERE otel_id='$_GET[otel_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000; width:972px">Termal & Kaplıca Otelleri Grubundan Silindi.</div>';
}
?>
<div class="sol list4 fontkalin" style="background:#fff; height:40px; color:#cc0000; width:972px">
	<div class="sol" style="width:40px;">F.O.</div>
	<div class="sol" style="width:200px; color:#000">: Fırsat Otelleri</div>
	<div class="sol" style="width:40px;">E.R.</div>
	<div class="sol" style="width:200px; color:#000">: Erken Rezervasyon Otelleri</div>
	<div class="sol" style="width:40px;">Özel</div>
	<div class="sol" style="width:200px; color:#000">: Özel Oteller</div>
	<div class="sol" style="width:40px;">B.O.</div>
	<div class="sol" style="width:200px; color:#000">: Bayram Otelleri</div>
	<div class="sol" style="width:40px; margin-top:10px;">K&T.O.</div>
	<div class="sol" style="width:200px; margin-top:10px; color:#000">: Kaplıca & Termal Oteller</div>
	<div class="sol" style="width:40px; margin-top:10px;">R.E.</div>
	<div class="sol" style="width:200px; margin-top:10px; color:#000">: Resim Ekle</div>
	<div class="sol" style="width:40px; margin-top:10px;">R.S.</div>
	<div class="sol" style="width:200px; margin-top:10px; color:#000">: Resim Sil</div>
	<div class="sol" style="width:40px; margin-top:10px;">S.K.</div>
	<div class="sol" style="width:200px;  margin-top:10px;color:#000">: Satışa Açık Tarihler</div>
</div>
						<div class="temizle sag incele fontkalin" style="background:#cc0000; width:94px;"><a href="otelekle.php" style="color:#fff">Otel Ekle</a></div>
						<div class="temizle sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list1 fontkalin" style="background:#fff; width:345px">Otel Adı</div>
						<div class="sol sil fontkalin" style="background:#fff; width:40px">F.O.</div>
						<div class="sol sil fontkalin" style="background:#fff; width:40px">E.R.</div>
						<div class="sol sil fontkalin" style="background:#fff; width:40px">Özel</div>
						<div class="sol sil fontkalin" style="background:#fff; width:40px">B.O.</div>
						<div class="sol sil fontkalin" style="background:#fff; width:40px">K&T.O.</div>
						<div class="sol sil fontkalin" style="background:#fff; width:40px">R.E.</div>
						<div class="sol sil fontkalin" style="background:#fff; width:40px">R.S.</div>
						<div class="sol sil fontkalin" style="background:#fff; width:40px">S.A.</div>
						<div class="sol sil fontkalin" style="background:#fff; width:85px">Fiyatlandırma</div>
						<div class="sol duzenle fontkalin" style="background:#fff; width:50px;">İndirim</div>
						<div class="sol duzenle fontkalin" style="background:#fff; width:60px;">Güncelle</div>
						<div class="sol sil fontkalin" style="background:#fff; width:30px">Sil</div>
<?
$otel=mysql_query("select * from oteller order by otel_id asc limit 40");
$sayi=1;
while($otelveri = mysql_fetch_array($otel)) {
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
?>   
						<div class="temizle sol sira" style="background:<? echo $renk; ?>"><? echo $sayi; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:345px"><? echo $otelveri[oteladi_tr]; ?></div>
						<div class="sol sil" style="background:<? echo $renk; ?>; width:40px"><? $firsat=mysql_query("select * from firsatotelleri where otel_id='$otelveri[otel_id]'"); $firsatveri = mysql_fetch_array($firsat); if(empty($firsatveri[firsat_id])){ ?><a href="otellistesi.php?firsat=ekle&otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/icon_pasif.png" alt="" title="Ekle" /></a><? } else { ?><a href="otellistesi.php?firsat=cikar&otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/icon_aktif.png" alt="" title="Sil" /></a><? } ?></div>
						<div class="sol sil" style="background:<? echo $renk; ?>; width:40px"><? $erken=mysql_query("select * from erkenrezervasyon where otel_id='$otelveri[otel_id]'"); $erkenveri = mysql_fetch_array($erken); if(empty($erkenveri[erken_id])){ ?><a href="otellistesi.php?erken=ekle&otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/icon_pasif.png" alt="" title="Ekle" /></a><? } else { ?><a href="otellistesi.php?erken=cikar&otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/icon_aktif.png" alt="" title="Sil" /></a><? } ?></div>
						<div class="sol sil" style="background:<? echo $renk; ?>; width:40px"><? $ozel=mysql_query("select * from ozeloteller where otel_id='$otelveri[otel_id]'"); $ozelveri = mysql_fetch_array($ozel); if(empty($ozelveri[ozel_id])){ ?><a href="otellistesi.php?ozel=ekle&otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/icon_pasif.png" alt="" title="Ekle" /></a><? } else { ?><a href="otellistesi.php?ozel=cikar&otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/icon_aktif.png" alt="" title="Sil" /></a><? } ?></div>
						<div class="sol sil" style="background:<? echo $renk; ?>; width:40px"><? $bayram=mysql_query("select * from bayramotelleri where otel_id='$otelveri[otel_id]'"); $bayramveri = mysql_fetch_array($bayram); if(empty($bayramveri[bayram_id])){ ?><a href="otellistesi.php?bayram=ekle&otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/icon_pasif.png" alt="" title="Ekle" /></a><? } else { ?><a href="otellistesi.php?bayram=cikar&otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/icon_aktif.png" alt="" title="Sil" /></a><? } ?></div>
						<div class="sol sil" style="background:<? echo $renk; ?>; width:40px"><? $termal=mysql_query("select * from termalotelleri where otel_id='$otelveri[otel_id]'"); $termalveri = mysql_fetch_array($termal); if(empty($termalveri[termal_id])){ ?><a href="otellistesi.php?termal=ekle&otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/icon_pasif.png" alt="" title="Ekle" /></a><? } else { ?><a href="otellistesi.php?termal=cikar&otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/icon_aktif.png" alt="" title="Sil" /></a><? } ?></div>
						<div class="sol sil" style="background:<? echo $renk; ?>; width:40px"><a href="otelresimekle.php?otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/icon_resim.png" alt="" title="Ekle" /></a></div>
						<div class="sol sil" style="background:<? echo $renk; ?>; width:40px"><a href="otelresimsil.php?otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/icon_delete.png" alt="" title="Sil" /></a></div>
						<div class="sol sil" style="background:<? echo $renk; ?>; width:40px"><a href="oteltarih.php?otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/incele.png" alt="" /></a></div>
						<div class="sol sil" style="background:<? echo $renk; ?>; width:85px"><a href="fiyatlandirma.php?otel_id=<? echo $otelveri[otel_id]; ?>">Fiyatlandırma</a></div>

						<div class="sol duzenle" style="background:<? echo $renk; ?>; width:50px;"><a href="otelindirim.php?otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/indirim.png" alt="" /></a></div>
						<div class="sol duzenle" style="background:<? echo $renk; ?>;width:60px;"><a href="otelduzenle.php?otel_id=<? echo $otelveri[otel_id]; ?>"><img src="tema/duzenle.png" alt="" /></a></div>
						<div class="sol sil" style="background:<? echo $renk; ?>; width:30px"><a href="otellistesi.php?otel_id=<? echo $otelveri[otel_id]; ?>&sil=sil"><img src="tema/sil.png" alt="" /></a></div>
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
