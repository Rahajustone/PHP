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
                    <div class="sol solbaslik fontkalin">İLETİŞİM AYARLARI</div>
                    <div class="sol alt">
<? if($_GET[guncelle]==guncelle) { $sonuc=mysql_query("UPDATE siteayarlari set tr_unvan='$_POST[tr_unvan]',ru_unvan='$_POST[ru_unvan]',fr_unvan='$_POST[fr_unvan]',en_unvan='$_POST[en_unvan]',de_unvan='$_POST[de_unvan]',telefon='$_POST[telefon]',faks='$_POST[faks]',harita='$_POST[harita]',email='$_POST[email]',tr_adres='$_POST[tr_adres]',fr_adres='$_POST[fr_adres]',ru_adres='$_POST[ru_adres]',en_adres='$_POST[en_adres]',de_adres='$_POST[de_adres]',subetelefon='$_POST[subetelefon]',subefaks='$_POST[subefaks]',tr_subeadres='$_POST[tr_subeadres]',en_subeadres='$_POST[en_subeadres]',de_subeadres='$_POST[de_subeadres]',subeemail='$_POST[subeemail]' where site_id='1'"); }?>
                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">Türkçe</a></li>
                    <li><a href="#EN">İngilizce</a></li>
                </ul>
<?
$ayar=mysql_query("select * from siteayarlari where site_id='1'");
$ayarveri = mysql_fetch_array($ayar);
?>
<form action="iletisimayarlari.php?guncelle=guncelle" method="post">
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Ünvanı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="tr_unvan" value="<? echo $ayarveri[tr_unvan]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Adres</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="tr_adres" value="<? echo $ayarveri[tr_adres]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Telefon</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="telefon" value="<? echo $ayarveri[telefon]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Fax</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="faks" value="<? echo $ayarveri[faks]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">E-Mail</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="email" value="<? echo $ayarveri[email]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Facebook Sayfası</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="de_unvan" value="<? echo $ayarveri[de_unvan]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Harita</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><textarea name="harita" style="width:468px; height:100px"><? echo $ayarveri[harita]; ?></textarea></div>

                </div>
                <div id="EN" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Ünvanı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="en_unvan" value="<? echo $ayarveri[en_unvan]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Adres</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="en_adres" value="<? echo $ayarveri[en_adres]; ?>"></div>

                </div>

				<input type="submit" value="Güncelle" />
</form>
<script src="js/jquery.tabify.js" type="text/javascript"></script>
<script type="text/javascript">
                    // <![CDATA[
                        
                    $(document).ready(function () {
                        $('#tabsmenu').tabify();
                        $('#menu2').tabify();
                    });
                            
                    // ]]>
</script>
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
