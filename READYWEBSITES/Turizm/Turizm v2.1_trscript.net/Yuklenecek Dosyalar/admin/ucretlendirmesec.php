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
                    <div class="sol solbaslik fontkalin">ODA İÇİN ÜCRETLENDİRME SEÇ</div>
                    <div class="sol alt">
<? if($_GET[ekle]==ekle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$sonuc=mysql_query("UPDATE otel_oda set carpan_id='$carpan_id' where otel_oda_id='$_GET[otel_oda_id]'"); 

echo '<div class="sol list4 fontkalin" style="background:#fff;">Ücretlendirme Eklendi. <a href="fiyatlandirma.php?otel_id='.$_GET[otel_id].'">Geri Dön</a></div>';
}
?>

<form action="ucretlendirmesec.php?ekle=ekle&otel_oda_id=<? echo $_GET[otel_oda_id]; ?>&otel_id=<? echo $_GET[otel_id]; ?>" method="post">
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="display:block; margin-left:5px;"> Ücretlendirme Türü</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<select name="carpan_id" style="width:300px">
<?
$konaklamaturu=mysql_query("select * from carpanlar order by carpan_id asc");
while($konaklamaturuveri = mysql_fetch_array($konaklamaturu)) {
?>   
							<option value="<? echo $konaklamaturuveri[carpan_id]; ?>"><? echo $konaklamaturuveri[carpan_adi]; ?></option>
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
