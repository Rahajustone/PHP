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
<title>Otel Y�netim Paneli</title>
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
                    <div class="sol solbaslik fontkalin">OTEL'�N A�IK OLDU�U TAR�HLER� EKLE</div>
                    <div class="sol alt">
<div class="sol list4 fontkalin" style="background:#fff; width:695px"><a href="otelduzenle.php?otel_id=<? echo $_GET[otel_id]; ?>">Geri D�n</a></div>
<? if($_GET[ekle]==ekle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}


$sonuc=mysql_query("UPDATE oteller set otel_indirim='$_POST[otel_indirim]' where otel_id='$_GET[otel_id]'");

	echo '<div class="sol list4 fontkalin" style="background:#fff;">�ndirim oran� kaydedildi.</div>';

}
$otel=mysql_query("select * from oteller where otel_id='$_GET[otel_id]'");
$otelveri = mysql_fetch_array($otel);
?>


<form action="otelindirim.php?ekle=ekle&otel_id=<? echo $_GET[otel_id]; ?>" method="post" enctype="multipart/form-data">
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">�ndirim (10,20,v.b.) %</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_indirim" value="<? echo $otelveri[otel_indirim]; ?>"></div>
					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="G�ncelle" style="width:150px" /></div>
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
