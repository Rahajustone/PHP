<?
include('inc/ayar.php');
include('inc/kontrol.php');
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
                    <div class="sol solbaslik fontkalin">REZERVASYON DÜZENLE</div>
                    <div class="sol alt">
<?
if($_GET[duzenle]==duzenle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$guncelle = mysql_query("UPDATE rezervasyon SET durum='$_POST[durum]' WHERE rezervasyon_id='$_GET[rezervasyon_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; width:697px">Rezervasyon Düzenlendi.</div>';
}
?>
<form action="rezervasyonduzenle.php?duzenle=duzenle&rezervasyon_id=<? echo $_GET[rezervasyon_id]; ?>" method="post">
<?
$rezer=mysql_query("select * from rezervasyon where rezervasyon_id='$_GET[rezervasyon_id]'");
$rezerveri = mysql_fetch_array($rezer);

$otel=mysql_query("select * from oteller where otel_id='$rezerveri[otel_id]'");
$otelveri = mysql_fetch_array($otel);
 echo "
							<div style='width:710px; float:left; margin-right:10px; margin-bottom:10px'>
				            	<div class='list3 fontkalin' style='float:left; background:#fff; margin-bottom:5px; width:702px; padding:5px 0 0 5px'>Kişisel Bilgileri</span></div>
								<div style='clear:both; height:25px; margin-top:20px'><span style='float:left; width:150px; display:block'>Cinsiyeti</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[cinsiyet]."</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Adı Soyadı</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[adisoyadi]."</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>E-Posta Adresi</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[eposta]."</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Telefon</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[telefon]."</span></div>
							</div>


							<div style='width:710px; float:left; margin-right:10px; margin-bottom:10px'>
				            	<div class='list3 fontkalin' style='float:left; background:#fff; margin-bottom:5px; width:702px; padding:5px 0 0 5px'>Rezervasyon Bilgileri</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Otel Adı</span><span style='float:left; width:550px; display:block'>: ".$otelveri[oteladi_tr]."</span></div>								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Oda Tipi</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[odatipi]."</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Oda Sayısı</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[odasayisi]."</span></div>

								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Giriş Tarihi</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[giristarihi]."</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Çıkış Tarihi</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[cikistarihi]."</span></div>
							</div>";
?>


				<div class="temizle sol" style="margin-bottom:10px">
					<input type="radio" name="durum" value="1" checked> Rezervasyonu Onayla
					<input type="radio" name="durum" value="2"> Rezervasyonu İptal Et
				</div>
				<div class="sol temizle">
					<input type="submit" value="Düzenle" />
				</div>
</form>
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
