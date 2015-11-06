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
                    <div class="sol solbaslik fontkalin">E-MAİL AYARLARI</div>
                    <div class="sol alt">
<? if($_GET[guncelle]==guncelle) { $sonuc=mysql_query("UPDATE siteayarlari set mailsifresi='$_POST[mailsifresi]',mailsmtp='$_POST[mailsmtp]',mailadresi='$_POST[mailadresi]',mailbasligi='$_POST[mailbasligi]',en_mailbasligi='$_POST[en_mailbasligi]',de_mailbasligi='$_POST[de_mailbasligi]',ru_mailbasligi='$_POST[ru_mailbasligi]',fr_mailbasligi='$_POST[fr_mailbasligi]' where site_id='1'"); }?>
                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">Türkçe</a></li>
                    <li><a href="#EN">İngilizce</a></li>
                </ul>
<?
$ayar=mysql_query("select * from siteayarlari where site_id='1'");
$ayarveri = mysql_fetch_array($ayar);
?>
<form action="emailayarlari.php?guncelle=guncelle" method="post">
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" align="left" style="margin-right:2px" alt="" /><span style="padding-top:3px; display:block;">E-Mail Başlığı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="mailbasligi" value="<? echo $ayarveri[mailbasligi]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">E-Mail Adresiniz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="mailadresi" value="<? echo $ayarveri[mailadresi]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">E-Mail Şifreniz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="mailsifresi" value="<? echo $ayarveri[mailsifresi]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">E-Mail SMTP Adresiniz</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="mailsmtp" value="<? echo $ayarveri[mailsmtp]; ?>"></div>
                </div>
				<div id="EN" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/en.png" align="left" style="margin-right:2px" alt="" /><span style="padding-top:3px; display:block;">E-Mail Başlığı</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="en_mailbasligi" value="<? echo $ayarveri[en_mailbasligi]; ?>"></div>
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
