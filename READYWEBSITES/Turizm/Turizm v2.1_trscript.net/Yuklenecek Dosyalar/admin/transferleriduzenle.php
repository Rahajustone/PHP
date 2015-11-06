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
<title>Rent A Car V5 Yönetim Paneli</title>
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
                    <div class="sol solbaslik fontkalin">TRANSFERİ DÜZENLE</div>
                    <div class="sol alt">
<? 
if($_GET[guncelle]==guncelle) { 
$sonuc=mysql_query("UPDATE transferler set alis_yeri_tr='$_POST[alis_yeri_tr]',alis_yeri_en='$_POST[alis_yeri_en]',alis_yeri_de='$_POST[alis_yeri_de]',varis_yeri_tr='$_POST[varis_yeri_tr]',varis_yeri_en='$_POST[varis_yeri_en]',varis_yeri_de='$_POST[varis_yeri_de]',gun4='$_POST[gun4]',gun3='$_POST[gun3]',gun2='$_POST[gun2]',gun1='$_POST[gun1]',mesafe='$_POST[mesafe]' where transferler_id='$_GET[transferler_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Transfer Düzenlendi</div>';
}
$ayar2=mysql_query("select * from transferler where transferler_id='$_GET[transferler_id]'");
$ayarveri2 = mysql_fetch_array($ayar2);
?>

                <ul id="menu2" class="sol tabsmenu">
                    <li class="active"><a href="#TR">Türkçe</a></li>
                    <li><a href="#EN">İngilizce</a></li>
                </ul>

<form action="transferleriduzenle.php?guncelle=guncelle&transferler_id=<? echo $_GET[transferler_id]; ?>" method="post">
				<div id="TR" class="aciklama temizle sol" style="display: block;">
					<div class="sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Alış Yeri</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="alis_yeri_tr" value="<? echo $ayarveri2[alis_yeri_tr]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/tr.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Varış Yeri</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="varis_yeri_tr" value="<? echo $ayarveri2[varis_yeri_tr]; ?>"></div>
                </div>
                <div id="EN" class="aciklama temizle sol" style="display: none;">
					<div class="sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Alış Yeri</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="alis_yeri_en" value="<? echo $ayarveri2[alis_yeri_en]; ?>"></div>
					<div class="temizle sol inputadi fontkalin"><img src="tema/en.png" alt="" align="left" style="margin-right:2px" /> <span style="padding-top:3px; display:block;">Varış Yeri</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="varis_yeri_en" value="<? echo $ayarveri2[varis_yeri_en]; ?>"></div>
                </div>

					<div class="temizle sol inputadi fontkalin" style="margin-right:11px;"><span style="padding-top:3px; display:block; padding-left:3px;">Mesafe</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik">
						<input type="text" name="mesafe" value="<? echo $ayarveri2[mesafe]; ?>">
					</div>
					<div class="temizle sol inputadi fontkalin" style="margin-right:11px;"><span style="padding-top:3px; display:block; color:#cc0000; padding-left:3px;">Fiyat Ayarları</span></div>
					<div class="temizle sol gunaraligi" style="background:#fff; color:#cc0000; width:90px">Kişi Sayısı</div>
<? 
$ayar=mysql_query("select * from siteayarlari where site_id='1'");
$ayarveri = mysql_fetch_array($ayar);
?>
					<div class="sol sezon" style="background:#fff; color:#cc0000; width:150px"><? echo $ayarveri[kisi1]; ?> Kişi Ücreti</div>
					<div class="sol sezon" style="background:#fff; color:#cc0000; width:150px"><? echo $ayarveri[kisi2]; ?> Kişi Ücreti</div>
					<div class="sol sezon" style="background:#fff; color:#cc0000; width:150px"><? echo $ayarveri[kisi3]; ?> Kişi Ücreti</div>
					<div class="sol sezon" style="background:#fff; color:#cc0000; width:150px"><? echo $ayarveri[kisi4]; ?> Kişi Ücreti</div>
					<div class="temizle sol gunaraligi" style="background:#fff; width:90px"></div>
					<div class="sol sezon2" style="background:#fff; width:150px; margin-right:3px"><input type="text" class="sezoninput" style="width:150px" value="<? echo $ayarveri2[gun1]; ?>" name="gun1"></div>
					<div class="sol sezon2" style="background:#fff; width:150px; margin-right:3px"><input type="text" class="sezoninput" style="width:150px" value="<? echo $ayarveri2[gun2]; ?>" name="gun2"></div>
					<div class="sol sezon2" style="background:#fff; width:150px; margin-right:3px"><input type="text" class="sezoninput" style="width:150px" value="<? echo $ayarveri2[gun3]; ?>" name="gun3"></div>
					<div class="sol sezon2" style="background:#fff; width:150px"><input type="text" class="sezoninput" style="width:150px" value="<? echo $ayarveri2[gun4]; ?>" name="gun4"></div>
<div class="sol temizle">
				<input type="submit" value="Düzenle" />
</div>
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
