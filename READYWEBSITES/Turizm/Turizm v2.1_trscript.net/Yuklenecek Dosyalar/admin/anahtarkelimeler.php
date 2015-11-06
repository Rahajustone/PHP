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
                    <div class="sol solbaslik fontkalin">ANAHTAR KELİME DÜZENLEME PANELİ</div>
                    <div class="sol alt">
<div class="sol list4 fontkalin" style="background:#fff; width:695px"><a href="otelduzenle.php?otel_id=<? echo $_GET[otel_id]; ?>">Geri Dön</a></div>
<? if($_GET[ekle]==ekle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$sonuc=mysql_query("UPDATE oteller set otel_title_tr='$_POST[otel_title_tr]',otel_title_en='$_POST[otel_title_en]',otel_keyword_tr='$_POST[otel_keyword_tr]',otel_keyword_en='$_POST[otel_keyword_en]',otel_metatag_tr='$_POST[otel_metatag_tr]',otel_metatag_en='$_POST[otel_metatag_en]' where otel_id='$_GET[otel_id]'");

echo '<div class="sol list4 fontkalin" style="background:#fff;">Güncelleme Yapıldı.</div>';
}
$otel=mysql_query("select * from oteller where otel_id='$_GET[otel_id]'");
$otelveri = mysql_fetch_array($otel);
?>

<form action="anahtarkelimeler.php?ekle=ekle&otel_id=<? echo $_GET[otel_id]; ?>" method="post">
                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">Türkçe</a></li>
                    <li><a href="#EN">İngilizce</a></li>
                </ul>
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa Başlığı (Title)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_title_tr" value="<? echo $otelveri[otel_title_tr]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Anahtar Kelime (Keyword)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_keyword_tr" value="<? echo $otelveri[otel_keyword_tr]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Site Açıklaması (Metatag)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_metatag_tr" value="<? echo $otelveri[otel_metatag_tr]; ?>"></div>
                </div>
                <div id="EN" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa Başlığı (Title)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_title_en" value="<? echo $otelveri[otel_title_en]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Anahtar Kelime (Keyword)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_keyword_en" value="<? echo $otelveri[otel_keyword_en]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Site Açıklaması (Metatag)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="otel_metatag_en" value="<? echo $otelveri[otel_metatag_en]; ?>"></div>
                </div>

					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Güncelle" style="width:150px" /></div>
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
