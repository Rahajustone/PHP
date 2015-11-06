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
                    <div class="sol solbaslik fontkalin">ODA TİPİ DÜZENLE</div>
                    <div class="sol alt">
<? if($_GET[duzenle]==duzenle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$sonuc=mysql_query("UPDATE oda_tipi set oda_tipi_adi_tr='$oda_tipi_adi_tr',oda_tipi_adi_fr='$oda_tipi_adi_fr',oda_tipi_adi_ru='$oda_tipi_adi_ru',oda_tipi_adi_de='$oda_tipi_adi_de',oda_tipi_adi_en='$oda_tipi_adi_en' where oda_tipi_id='$_GET[oda_tipi_id]'"); 

echo '<div class="sol list4 fontkalin" style="background:#fff;">Oda Tipi Düzenlendi</div>';
}
?>
<?
$konaklama=mysql_query("select * from oda_tipi where oda_tipi_id='$_GET[oda_tipi_id]'");
$konaklamaveri = mysql_fetch_array($konaklama);
?>

<form action="odatipiduzenle.php?duzenle=duzenle&oda_tipi_id=<? echo $_GET[oda_tipi_id]; ?>" method="post">
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="color:#cc0000">TR </span> <span class="sol" style="display:block; margin-left:5px;"> Oda Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="oda_tipi_adi_tr" value="<? echo $konaklamaveri[oda_tipi_adi_tr]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="color:#cc0000">EN </span> <span class="sol" style="display:block; margin-left:5px;"> Oda Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="oda_tipi_adi_en" value="<? echo $konaklamaveri[oda_tipi_adi_en]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="color:#cc0000">DE </span> <span class="sol" style="display:block; margin-left:5px;"> Oda Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="oda_tipi_adi_de" value="<? echo $konaklamaveri[oda_tipi_adi_de]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="color:#cc0000">RU </span> <span class="sol" style="display:block; margin-left:5px;"> Oda Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="oda_tipi_adi_ru" value="<? echo $konaklamaveri[oda_tipi_adi_ru]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="color:#cc0000">FR </span> <span class="sol" style="display:block; margin-left:5px;"> Oda Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="oda_tipi_adi_fr" value="<? echo $konaklamaveri[oda_tipi_adi_fr]; ?>" style="border:1px solid #444; width:400px"></div>
					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Düzenle" style="width:150px" /></div>
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
