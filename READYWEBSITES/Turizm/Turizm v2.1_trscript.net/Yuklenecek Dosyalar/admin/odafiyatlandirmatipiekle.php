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
                    <div class="sol solbaslik fontkalin">ODA FİYATLANDIRMA TİPİ EKLE</div>
                    <div class="sol alt">
<? if($_GET[ekle]==ekle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$ekle=mysql_query("INSERT INTO carpanlar (carpan_adi,kisi1,kisi2,kisi3,kisi4,kisi5) ".
"VALUES('$carpan_adi','$kisi1','$kisi2','$kisi3','$kisi4','$kisi5')");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Oda Fiyatlandırma Tipi Eklendi</div>';
}
?>

<form action="odafiyatlandirmatipiekle.php?ekle=ekle" method="post">
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="display:block; margin-left:5px;"> Fiyatlandırma Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="carpan_adi" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="display:block; margin-left:5px;"> 1 Kişi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="kisi1" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="display:block; margin-left:5px;"> 2 Kişi</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="kisi2" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="display:block; margin-left:5px;"> İlave Yatak</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="kisi3" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="display:block; margin-left:5px;"> 1.Çoçuk</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="kisi4" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><span class="sol" style="display:block; margin-left:5px;"> 2.Çoçuk</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="kisi5" style="border:1px solid #444; width:400px"></div>
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
