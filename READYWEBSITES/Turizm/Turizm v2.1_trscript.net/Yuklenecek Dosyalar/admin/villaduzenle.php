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
<title>Otel Y�netim Paneli</title>
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
                    <div class="sol otel fontkalin">V�LLA D�ZENLEME ALANI</div>
                    <div class="sol otelalt">
<?
$otel=mysql_query("select * from villalar where villa_id='$_GET[villa_id]'");
$otelveri = mysql_fetch_array($otel);
$renk="#fff";
?>

	<div class="sol list4 fontkalin" style="background:#fff; width:232px; color:#000; text-align:center;"><a href="villaguncelle.php?villa_id=<? echo $_GET[villa_id]; ?>" style="color:#cc0000;">Bilgileri G�ncelle</a></div>
	<div class="sol list4 fontkalin" style="background:#fff; width:232px; color:#000; text-align:center;"><a href="villaanahtarkelimeler.php?villa_id=<? echo $_GET[villa_id]; ?>" style="color:#cc0000;">Anahtar Kelimeler</a></div>
	<div class="sol list4 fontkalin" style="background:#fff; width:232px; text-align:center;"><a href="villaozellikleri.php?villa_id=<? echo $_GET[villa_id]; ?>" style="color:#cc0000;">Villa �zellikleri</a></div>
	<div class="sol list4 fontkalin" style="background:#fff; width:232px; color:#000; text-align:center;"><a href="villagooglemaps.php?villa_id=<? echo $_GET[villa_id]; ?>" style="color:#cc0000;">Google Maps</a></div>



						<div class="temizle sol sira" style="background:<? echo $renk; ?>; width:120px; height:107px"><img src="../oteller/<? echo $otelveri[villa_resim]; ?>" style="width:110px; height:100px;" alt="" /></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:150px; color:#cc0000">Villa Ad� (Tr)</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[villaadi_tr]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:150px; color:#cc0000">Villa Ad� (En)</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[villaadi_en]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:150px; color:#cc0000">Tatil B�lgesi</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? $bolge=mysql_query("select * from villailceler where ilce_id='$otelveri[villa_bolge_id]'"); $bolgeveri = mysql_fetch_array($bolge); echo $bolgeveri[ilce_adi_tr]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:150px; color:#cc0000">Denize Uzakl�k</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[villa_deniz]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">Merkeze Uzakl�k</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[villa_merkez]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">Havaalan� Uzakl�k</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[villa_havaalani]; ?></div>

						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">Markete Uzakl�k</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[villa_market]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">S�permarket Uzakl�k</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[villa_supermarket]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">Restauranta Uzakl�k</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[villa_restaurant]; ?></div>


						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">Kapasite</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[kapasite]; ?> Ki�ilik</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">Banyo Say�s�</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[villa_banyo]; ?> Banyo</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">Oda Say�s�</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[villa_oda]; ?> Oda</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:149px; padding-left:135px; color:#cc0000">Yatak Odas�</div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:682px"><? echo $otelveri[villa_yatak]; ?> Yatak Odas�</div>


						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; color:#cc0000">A��klama (Tr)</div>
						<div class="sol" style="padding:5px; border:1px solid #999; margin-left:1px; margin-bottom:2px; background:<? echo $renk; ?>; width:970px; min-height:20px;"><? echo $otelveri[villa_aciklama_tr]; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; color:#cc0000">A��klama (En)</div>
						<div class="sol" style="padding:5px; border:1px solid #999; margin-left:1px; margin-bottom:2px; background:<? echo $renk; ?>; width:970px; min-height:20px;"><? echo $otelveri[villa_aciklama_en]; ?></div>


						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; color:#cc0000">Fiyata Dahil Hizmetler (Tr)</div>
						<div class="sol" style="padding:5px; border:1px solid #999; margin-left:1px; margin-bottom:2px; background:<? echo $renk; ?>; width:970px; min-height:20px;"><? echo $otelveri[villa_fiyatdahil_tr]; ?></div>

						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; color:#cc0000">Fiyata Dahil Hizmetler (En)</div>
						<div class="sol" style="padding:5px; border:1px solid #999; margin-left:1px; margin-bottom:2px; background:<? echo $renk; ?>; width:970px; min-height:20px;"><? echo $otelveri[villa_fiyatdahil_en]; ?></div>

						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; color:#cc0000">Fiyata Dahil Olmayan Hizmetler (Tr)</div>
						<div class="sol" style="padding:5px; border:1px solid #999; margin-left:1px; margin-bottom:2px; background:<? echo $renk; ?>; width:970px; min-height:20px;"><? echo $otelveri[villa_fiyatdahildegil_tr]; ?></div>

						<div class="sol list1" style="background:<? echo $renk; ?>; width:970px; color:#cc0000">Fiyata Dahil Olmayan Hizmetler (En)</div>
						<div class="sol" style="padding:5px; border:1px solid #999; margin-left:1px; margin-bottom:2px; background:<? echo $renk; ?>; width:970px; min-height:20px;"><? echo $otelveri[villa_fiyatdahildegil_en]; ?></div>



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
