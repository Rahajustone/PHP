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
                    <div class="sol solbaslik fontkalin">OTEL RESİM SİL</div>
                    <div class="sol alt">


<?

if(!empty($_GET[galeri_resim_id])){
$silindi=mysql_query("DELETE FROM otel_galeri_resim where galeri_resim_id='$_GET[galeri_resim_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Resim Silindi.</div>';
}
$resimler=mysql_query("select * from otel_galeri_resim where otel_id='$_GET[otel_id]'");
while($resimlerveri = mysql_fetch_array($resimler)){
$resim_goster="../oteller/galeri/".$resimlerveri[galeri_resim_adi];
?>
<div class="sol" style="text-align:center; margin-right:5px;"><img src="<? echo $resim_goster; ?>" style="width:150px; height:110px" alt="" /><p style="margin-top:5px" class="fontkalin"><a href="otelresimsil.php?galeri_resim_id=<? echo $resimlerveri[galeri_resim_id]; ?>&otel_id=<? echo $_GET[otel_id]; ?>" style="color:#cc0000">Resmi Sil</a></p></div>
<?
}
?>

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
