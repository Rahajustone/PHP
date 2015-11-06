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
                    <div class="sol solbaslik fontkalin">ALIŞ VE DÖNÜŞ YERİ EKLE</div>
                    <div class="sol alt">
<? if($_GET[ekle]==ekle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$ekle=mysql_query("INSERT INTO yerler (il_id,yer_adi_tr,yer_adi_en,yer_adi_de) ".
"VALUES('$il_id','$yer_adi_tr','$yer_adi_en','$yer_adi_de')");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Alış ve Dönüş Yeri Eklendi</div>';
}
?>

<form action="alisvedonusyeriekle.php?ekle=ekle" method="post">
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:3px" /><span style="padding-top:3px; display:block;">Alış ve Dönüş Yeri Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="yer_adi_tr" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:3px" /><span style="padding-top:3px; display:block;">Alış ve Dönüş Yeri Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="yer_adi_en" style="border:1px solid #444; width:400px"></div>
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
