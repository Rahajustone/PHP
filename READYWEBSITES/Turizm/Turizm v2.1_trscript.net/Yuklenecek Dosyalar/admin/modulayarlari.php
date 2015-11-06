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
                    <div class="sol solbaslik fontkalin">MODÜL AYARLARI</div>
                    <div class="sol alt">
<? if($_GET[guncelle]==guncelle) { $sonuc=mysql_query("UPDATE siteayarlari set doviz='$_POST[doviz]',dolarkuru='$_POST[dolarkuru]',eurokuru='$_POST[eurokuru]' where site_id='1'"); }?>

<?
$ayar=mysql_query("select * from siteayarlari where site_id='1'");
$ayarveri = mysql_fetch_array($ayar);
?>
<form action="modulayarlari.php?guncelle=guncelle" method="post">

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Döviz Kurları</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol" style="padding-top:5px; height:15px;"><input type="radio" name="doviz" value="0" /> Manuel Kuru Kullan <input type="radio" name="doviz" value="1" checked /> Otomatik Kuru Kullan</div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block; width:500px">Manuel Döviz Kuru için aşağıdan kurları giriniz. Örnek (1.76)</span></div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">$ Dolar Kuru</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="dolarkuru" value="<? echo $ayarveri[dolarkuru]; ?>" style="border:1px solid #444; width:50px"></div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">&euro; Euro Kuru</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="eurokuru" value="<? echo $ayarveri[eurokuru]; ?>" style="border:1px solid #444; width:50px"></div>

					<div class="sol temizle"><input type="submit" value="Güncelle" /></div>
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
