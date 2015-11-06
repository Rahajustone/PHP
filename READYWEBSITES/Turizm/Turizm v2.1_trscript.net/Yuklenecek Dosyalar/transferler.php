<? include('inc/ayar.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<? include('inc/oteldetayjs.php'); ?>
<? include('inc/title.php'); ?>
</head>

<body onload="test();">
<div id="pixel">
	<div id="genel">
    	<div class="sol" id="ustcizgi"></div>
<? include('inc/ustmenuler.php'); ?>

        <div class="sol ortakdiv">
        	<div class="sol" id="solalan">
<? include('inc/solmenu.php'); ?>
            </div>
        	<div class="sol" id="ortaalan">

				<div class="sol aracuzunbaslik ubuntu">Transfer Hizmetlerimiz</div>
				<div class="temizle sol transferalt">
					<div class="sol alis">Alış Yeri</div>
					<div class="sol alis">Varış Yeri</div>
					<div class="sol gun">1-4 Kişi</div>
					<div class="sol gun">5-8 Kişi</div>
					<div class="sol gun">9-15 Kişi</div>
					<div class="sol gun">16+ Kişi</div>
					<div class="sol gun">Mesafe</div>
					<div class="sol gun" style="width:75px">Rezervasyon</div>

<?
$arac=mysql_query("select * from transferler order by transferler_id desc");
while($aracveri = mysql_fetch_array($arac)) {
?>

						<div class="sol alis" style="color:#000"><? echo $aracveri[alis_yeri_tr]; ?></div>
						<div class="sol alis" style="color:#000"><? echo $aracveri[varis_yeri_tr]; ?></div>
						<div class="sol gun" style="color:#000">
							<? echo $aracveri[gun1].".00 TL"; ?>
						</div>
						<div class="sol gun" style="color:#000">
							<? echo $aracveri[gun2].".00 TL"; ?>
						</div>
						<div class="sol gun" style="color:#000">
							<? echo $aracveri[gun3].".00 TL"; ?>
						</div>
						<div class="sol gun" style="color:#000">
							<? echo $aracveri[gun4].".00 TL"; ?>
						</div>
						<div class="sol gun" style="color:#000"><? echo $aracveri[mesafe]; ?> KM</div>	
						<div class="sol gun" style="width:75px"><a href="#transfer.html" style="color:#666">Rezervasyon</a></div>						
<? } ?>
				</div>
            </div>
        </div>
		<div class="temizle sol" id="foother"><? include('inc/foother.php'); ?></div>
    </div>
</div>


</body>
</html>
