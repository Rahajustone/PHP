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
                    <div class="sol otel fontkalin">OTEL DÜZENLEME ALANI</div>
                    <div class="sol otelalt">
<?
$otel=mysql_query("select * from oteller where otel_id='$_GET[otel_id]'");
$otelveri = mysql_fetch_array($otel);
$renk="#fff";
?>

	<div class="sol list4 fontkalin" style="background:#fff; width:232px; color:#000; text-align:center;"><a href="otelguncelle.php?otel_id=<? echo $_GET[otel_id]; ?>" style="color:#cc0000;">Bilgileri Güncelle</a></div>
	<div class="sol list4 fontkalin" style="background:#fff; width:232px; color:#000; text-align:center;"><a href="anahtarkelimeler.php?otel_id=<? echo $_GET[otel_id]; ?>" style="color:#cc0000;">Anahtar Kelimeler</a></div>
	<div class="sol list4 fontkalin" style="background:#fff; width:232px; text-align:center;"><a href="otelozellikleri.php?otel_id=<? echo $_GET[otel_id]; ?>" style="color:#cc0000;">Otel Özellikleri</a></div>
	<div class="sol list4 fontkalin" style="background:#fff; width:232px; color:#000; text-align:center;"><a href="odaozellikleri.php?otel_id=<? echo $_GET[otel_id]; ?>" style="color:#cc0000;">Oda Özellikleri</a></div>
	<div class="sol list4 fontkalin" style="background:#fff; width:232px; color:#000; text-align:center;"><a href="ucretsizaktiviteler.php?otel_id=<? echo $_GET[otel_id]; ?>" style="color:#cc0000;">Ücretsiz Aktiviteler</a></div>
	<div class="sol list4 fontkalin" style="background:#fff; width:232px; color:#000; text-align:center;"><a href="ucretliaktiviteler.php?otel_id=<? echo $_GET[otel_id]; ?>" style="color:#cc0000;">Ücretli Aktiviteler</a></div>
	<div class="sol list4 fontkalin" style="background:#fff; width:232px; color:#000; text-align:center;"><a href="googlemaps.php?otel_id=<? echo $_GET[otel_id]; ?>" style="color:#cc0000;">Google Maps</a></div>



						<div class="temizle sol sira" style="background:<? echo $renk; ?>; width:120px; height:107px"><img src="../oteller/<? echo $otelveri[otel_resim]; ?>" style="width:110px; height:100px;" alt="" /></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:150px; color:#cc0000">Otel Adı (Tr)</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[oteladi_tr]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:150px; color:#cc0000">Otel Adı (En)</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[oteladi_en]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:150px; color:#cc0000">Tatil Bölgesi</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? $bolge=mysql_query("select * from ilceler where ilce_id='$otelveri[otel_bolge_id]'"); $bolgeveri = mysql_fetch_array($bolge); echo $bolgeveri[ilce_adi_tr]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:150px; color:#cc0000">Konaklama Türü</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? $konaklama=mysql_query("select * from konaklama where konaklama_id='$otelveri[konaklama_id]'"); $konaklamaveri = mysql_fetch_array($konaklama); echo $konaklamaveri[konaklama_adi_tr]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">Yıldız Sayısı</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? if($otelveri[otel_yildiz]!='0'){  echo $otelveri[otel_yildiz]." Yıldızlı"; } else { echo "Apart Otel"; } ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">1.Çoçuk</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[cocuk1]; ?> Yaş Arası</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">2.Çoçuk</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[cocuk2]; ?> Yaş Arası</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">Denize Uzaklık</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[otel_deniz]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">Merkeze Uzaklık</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[otel_merkez]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">Havaalanı Uzaklık</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[otel_havaalani]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; color:#cc0000">Açıklama (Tr)</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; min-height:50px;"><? echo $otelveri[otel_aciklama_tr]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; color:#cc0000">Açıklama (En)</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; min-height:50px;"><? echo $otelveri[otel_aciklama_en]; ?></div>

						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; color:#cc0000">Yemek Konsepti (Tr)</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; min-height:50px;"><? echo $otelveri[otel_yemek_tr]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; color:#cc0000">Yemek Konsepti (En)</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; min-height:50px;"><? echo $otelveri[otel_yemek_en]; ?></div>


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
