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
<title>Otel Y�netim Paneli</title>
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
                    <div class="sol solbaslik fontkalin">ANAHTAR KEL�ME D�ZENLEME PANEL�</div>
                    <div class="sol alt">
<div class="sol list4 fontkalin" style="background:#fff; width:695px"><a href="villaduzenle.php?villa_id=<? echo $_GET[villa_id]; ?>">Geri D�n</a></div>
<? if($_GET[ekle]==ekle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$sonuc=mysql_query("UPDATE villalar set villa_title_tr='$_POST[villa_title_tr]',villa_title_en='$_POST[villa_title_en]',villa_keyword_tr='$_POST[villa_keyword_tr]',villa_keyword_en='$_POST[villa_keyword_en]',villa_metatag_tr='$_POST[villa_metatag_tr]',villa_metatag_en='$_POST[villa_metatag_en]' where villa_id='$_GET[villa_id]'");

echo '<div class="sol list4 fontkalin" style="background:#fff;">G�ncelleme Yap�ld�.</div>';
}
$otel=mysql_query("select * from villalar where villa_id='$_GET[villa_id]'");
$otelveri = mysql_fetch_array($otel);
?>

<form action="villaanahtarkelimeler.php?ekle=ekle&villa_id=<? echo $_GET[villa_id]; ?>" method="post">
                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">T�rk�e</a></li>
                    <li><a href="#EN">�ngilizce</a></li>
                </ul>
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa Ba�l��� (Title)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_title_tr" value="<? echo $otelveri[villa_title_tr]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Anahtar Kelime (Keyword)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_keyword_tr" value="<? echo $otelveri[villa_keyword_tr]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Site A��klamas� (Metatag)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_metatag_tr" value="<? echo $otelveri[villa_metatag_tr]; ?>"></div>
                </div>
                <div id="EN" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Sayfa Ba�l��� (Title)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_title_en" value="<? echo $otelveri[villa_title_en]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Anahtar Kelime (Keyword)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_keyword_en" value="<? echo $otelveri[villa_keyword_en]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Site A��klamas� (Metatag)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="villa_metatag_en" value="<? echo $otelveri[villa_metatag_en]; ?>"></div>
                </div>

					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="G�ncelle" style="width:150px" /></div>
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
