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
                    <div class="sol solbaslik fontkalin">SABİT BAŞLIK AYARLARI</div>
                    <div class="sol alt">
<? if($_GET[guncelle]==guncelle) { $sonuc=mysql_query("UPDATE icerik set title_tr='$_POST[title_tr]',keyword_tr='$_POST[keyword_tr]',metatag_tr='$_POST[metatag_tr]',title_en='$_POST[title_en]',keyword_en='$_POST[keyword_en]',metatag_en='$_POST[metatag_en]' where icerik_id='$_GET[icerik_id]'"); 
echo '<div class="sol list4 fontkalin" style="background:#fff;">Sabit Başlık Güncellendi</div>';
}?>

                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">Türkçe</a></li>
                    <li><a href="#EN">İngilizce</a></li>
                </ul>
<?
$ayar=mysql_query("select * from icerik where icerik_id='$_GET[icerik_id]'");
$ayarveri = mysql_fetch_array($ayar);
?>
<form action="sabityaziduzenle.php?guncelle=guncelle&icerik_id=<? echo $_GET[icerik_id]; ?>" method="post">
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sabit Başlık Adı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="sayfa_adi" value="<? echo $ayarveri[sayfa_adi]; ?>" disabled></div>
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa Başlığı (Title)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="title_tr" value="<? echo $ayarveri[title_tr]; ?>"></div>
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Anahtar Kelime (Keyword)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="keyword_tr" value="<? echo $ayarveri[keyword_tr]; ?>"></div>
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Site Açıklaması (Metatag)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="metatag_tr" value="<? echo $ayarveri[metatag_tr]; ?>"></div>
                </div>
                <div id="EN" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa Başlığı (Title)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="title_en" value="<? echo $ayarveri[title_en]; ?>"></div>
					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Anahtar Kelime (Keyword)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="keyword_en" value="<? echo $ayarveri[keyword_en]; ?>"></div>
					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Site Açıklaması (Metatag)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="metatag_en" value="<? echo $ayarveri[metatag_en]; ?>"></div>
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
