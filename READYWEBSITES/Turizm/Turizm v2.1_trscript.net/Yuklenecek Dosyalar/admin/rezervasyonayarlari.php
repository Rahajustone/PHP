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
                    <div class="sol solbaslik fontkalin">REZERVASYON AYARLARI</div>
                    <div class="sol alt">
<? if($_GET[guncelle]==guncelle) { $sonuc=mysql_query("UPDATE siteayarlari set gun1='$_POST[gun1]',gun2='$_POST[gun2]',gun3='$_POST[gun3]',gun4='$_POST[gun4]',gun5='$_POST[gun5]',gun6='$_POST[gun6]',kisi1='$_POST[kisi1]',kisi2='$_POST[kisi2]',kisi3='$_POST[kisi3]',kisi4='$_POST[kisi4]',saatfarki='$_POST[saatfarki]' where site_id='1'"); }?>

<?
$ayar=mysql_query("select * from siteayarlari where site_id='1'");
$ayarveri = mysql_fetch_array($ayar);
?>
<form action="rezervasyonayarlari.php?guncelle=guncelle" method="post">

					<div class="sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Gün Aralıkları</span></div>
					<div class="sol temizle">
						<div class="sol" style="margin-right:5px"><input type="text" name="gun1" value="<? echo $ayarveri[gun1]; ?>" style="border:1px solid #444; width:50px"></div>
						<div class="sol" style="margin-right:5px"><input type="text" name="gun2" value="<? echo $ayarveri[gun2]; ?>" style="border:1px solid #444; width:50px"></div>
						<div class="sol" style="margin-right:5px"><input type="text" name="gun3" value="<? echo $ayarveri[gun3]; ?>" style="border:1px solid #444; width:50px"></div>
						<div class="sol" style="margin-right:5px"><input type="text" name="gun4" value="<? echo $ayarveri[gun4]; ?>" style="border:1px solid #444; width:50px"></div>
						<div class="sol" style="margin-right:5px"><input type="text" name="gun5" value="<? echo $ayarveri[gun5]; ?>" style="border:1px solid #444; width:50px"></div>
						<div class="sol" style="margin-right:5px"><input type="text" name="gun6" value="<? echo $ayarveri[gun6]; ?>" style="border:1px solid #444; width:50px"></div>
					</div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Transfer Kişi Sayıları</span></div>
					<div class="sol temizle">
						<div class="sol" style="margin-right:5px"><input type="text" name="kisi1" value="<? echo $ayarveri[kisi1]; ?>" style="border:1px solid #444; width:50px"></div>
						<div class="sol" style="margin-right:5px"><input type="text" name="kisi2" value="<? echo $ayarveri[kisi2]; ?>" style="border:1px solid #444; width:50px"></div>
						<div class="sol" style="margin-right:5px"><input type="text" name="kisi3" value="<? echo $ayarveri[kisi3]; ?>" style="border:1px solid #444; width:50px"></div>
						<div class="sol" style="margin-right:5px"><input type="text" name="kisi4" value="<? echo $ayarveri[kisi4]; ?>" style="border:1px solid #444; width:50px"></div>
					</div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:0px; display:block;">Kiralamada Saat Farkı (1,2,3,v.b.)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="text" name="saatfarki" value="<? echo $ayarveri[saatfarki]; ?>" style="border:1px solid #444; width:50px"></div>


					<div class="sol temizle"><input type="submit" value="Güncelle" /></div>
</form>
					<div class="sol temizle" style="margin:5px 0"><span style="font-weight:bold">Not 1:</span> Gün aralık kısmına 6 farklı gün aralığı girmelisiniz. Son gün aralığı 29-999 veya 30-999 şeklinde olmalıdır.</div>
					<div class="sol temizle" style="margin:5px 0"><span style="font-weight:bold">Not 2:</span> Transfer kişi aralık kısmına 4 farklı kişi aralığı girmelisiniz. Son gün aralığı 15-999 veya 16-999 şeklinde olmalıdır.</div>
					<div class="sol temizle" style="margin:5px 0"><span style="font-weight:bold">Not 3:</span> Gün ve transfer kişi aralığı en az ve en fazla 2 rakamdan oluşmalıdır 1-3, 4-7, 8-15 şeklinde.</div>
					<div class="sol temizle" style="margin:5px 0"><span style="font-weight:bold">Not 4:</span> Kiralamada Saat Farkı sadece tam sayı olabilir.</div>
					<div class="sol temizle" style="margin:5px 0"><span style="font-weight:bold">Not 5:</span> Kullanacak olduğunuz 2 rakam arasına mutlaka "-" koyunuz aksi takdirde hesaplamalar yanlış olacaktır.</div>
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
