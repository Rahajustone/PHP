<?
include('inc/ayar.php');
include('inc/kontrol.php');
$apikey = "AIzaSyABA6oO8JJcnAMWiOHm8ymVouIQWFfttso";
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
                    <div class="sol solbaslik fontkalin">GOOGLE MAPS DÜZENLEME PANELİ</div>
                    <div class="sol alt">
<div class="sol list4 fontkalin" style="background:#fff; width:695px"><a href="villaduzenle.php?villa_id=<? echo $_GET[villa_id]; ?>">Geri Dön</a></div>
<? if($_GET[ekle]==ekle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}

$sonuc=mysql_query("UPDATE villalar set boylam='$_POST[boylam]',enlem='$_POST[enlem]' where villa_id='$_GET[villa_id]'");

echo '<div class="sol list4 fontkalin" style="background:#fff;">Güncelleme Yapıldı.</div>';
}
$otel=mysql_query("select * from villalar where villa_id='$_GET[villa_id]'");
$otelveri = mysql_fetch_array($otel);
?>

<form action="villagooglemaps.php?ekle=ekle&villa_id=<? echo $_GET[villa_id]; ?>" method="post">

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Enlem (Latitude)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="enlem" value="<? echo $otelveri[enlem]; ?>"></div>
					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Boylam (Longitude)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="boylam" value="<? echo $otelveri[boylam]; ?>"></div>
				<input type="submit" value="Maps Güncelle" />
<iframe name="google" src="http://www.getlatlon.com/" style="width:710px; height:590px" scrolling="no" frameborder="0" background="transparent"></iframe>

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
