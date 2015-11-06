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
                    <div class="sol solbaslik fontkalin">OTELE ODA TİPİ EKLE</div>
                    <div class="sol alt">
<? if($_GET[ekle]==ekle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$ekle=mysql_query("INSERT INTO otel_oda (oda_id,otel_id) ".
"VALUES('$oda_id','$_GET[otel_id]')");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Otele Oda Tipi Eklendi. <a href="fiyatlandirma.php?otel_id='.$_GET[otel_id].'">Geri Dön</a></div>';
}
?>

<form action="oteleodatipiekle.php?ekle=ekle&otel_id=<? echo $_GET[otel_id]; ?>" method="post">
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="display:block; margin-left:5px;"> Oda Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="oda_id" style="width:300px">
<?
$konaklamaturu=mysql_query("select * from odatipleri order by oda_id asc");
while($konaklamaturuveri = mysql_fetch_array($konaklamaturu)) {
?>   
							<option value="<? echo $konaklamaturuveri[oda_id]; ?>"><? echo $konaklamaturuveri[oda_adi_tr]; ?></option>
<? } ?>
						</select>
					</div>
					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Ekle" style="width:150px" /></div>
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
