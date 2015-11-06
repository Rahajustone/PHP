<?
include('inc/ayar.php');
include('inc/kontrol.php');
$_SESSION['ayarlar'] = uzanti($adres);
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
                    <div class="sol solbaslik fontkalin">SİTE AYARLARI</div>
                    <div class="sol alt">
<? if($_GET[guncelle]==guncelle) { $sonuc=mysql_query("UPDATE siteayarlari set tr_titleyazisi='$_POST[tr_titleyazisi]',fr_titleyazisi='$_POST[fr_titleyazisi]',ru_titleyazisi='$_POST[ru_titleyazisi]',en_titleyazisi='$_POST[en_titleyazisi]',de_titleyazisi='$_POST[de_titleyazisi]',tr_anahtarkelime='$_POST[tr_anahtarkelime]',ru_anahtarkelime='$_POST[ru_anahtarkelime]',fr_anahtarkelime='$_POST[fr_anahtarkelime]',en_anahtarkelime='$_POST[en_anahtarkelime]',de_anahtarkelime='$_POST[de_anahtarkelime]',tr_metadesc='$_POST[tr_metadesc]',ru_metadesc='$_POST[ru_metadesc]',fr_metadesc='$_POST[fr_metadesc]',en_metadesc='$_POST[en_metadesc]',de_metadesc='$_POST[de_metadesc]' where site_id='1'"); }?>

                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">Türkçe</a></li>
                    <li><a href="#EN">İngilizce</a></li>
                </ul>
<?
$ayar=mysql_query("select * from siteayarlari where site_id='1'");
$ayarveri = mysql_fetch_array($ayar);
?>
<form action="ayarlar.php?guncelle=guncelle" method="post">
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Site Başlığını Yazınız</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="tr_titleyazisi" value="<? echo $ayarveri[tr_titleyazisi]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Anahtar Kelimeler (Keyword)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="tr_anahtarkelime" value="<? echo $ayarveri[tr_anahtarkelime]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Site Açıklaması (Description)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="tr_metadesc" value="<? echo $ayarveri[tr_metadesc]; ?>"></div>
                </div>
                <div id="EN" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Site Başlığını Yazınız</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="en_titleyazisi" value="<? echo $ayarveri[en_titleyazisi]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Anahtar Kelimeler (Keyword)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="en_anahtarkelime" value="<? echo $ayarveri[en_anahtarkelime]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Site Açıklaması (Description)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="en_metadesc" value="<? echo $ayarveri[en_metadesc]; ?>"></div>
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
