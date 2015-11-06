<? include('inc/ayar.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<link rel="stylesheet" type="text/css" href="<? echo $siteurl; ?>/css/terminal.css" />
<link rel="stylesheet" type="text/css" href="<? echo $siteurl; ?>/css/jqtransform.css" />
<script type="text/javascript" src="<? echo $siteurl; ?>/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<? echo $siteurl; ?>/js/jquery.jqtransform.js"></script>
<script type="text/javascript" src="<? echo $siteurl; ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<? echo $siteurl; ?>/js/UbuntuR_400.font.js"></script>
<script type="text/javascript" src="<? echo $siteurl; ?>/js/Ubuntu_700.font.js"></script>
<script type="text/javascript" src="<? echo $siteurl; ?>/js/ozel.js"></script>
<script type="text/javascript" src="<? echo $siteurl; ?>/js/jquery.tabify.source.js"></script>
<link rel="stylesheet" href="<? echo $siteurl; ?>/css/lightbox.css" type="text/css" media="screen" />
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

				<div class="temizle sol" style="margin:0; width:790px" id="rezervasyon">
<?
$ay=date(m);
$arac=mysql_query("select * from araclar order by gun1ay1 asc");
$sayi=1;
while($aracveri = mysql_fetch_array($arac)) {
if($sayi%3) {
$css = 'tablo"';
} else {
$css = 'tablo" style="margin-right:0px;"';
}
$arac_resim="rent/".$aracveri[arac_resim];
?>
					<div class="sol <? echo $css; ?>>
						<div class="sol aracbaslik ubuntu"><a href="<? echo $siteurl; ?>/rentacar/<? echo $aracveri[arac_sef]; ?>.html" style="color:#fff"><? echo $aracveri[arac_adi_tr]; ?></a></div>
						<div class="sol resim"><a href="<? echo $siteurl; ?>/rentacar/<? echo $aracveri[arac_sef]; ?>.html"><img src="<? echo $siteurl; ?>/<? echo $arac_resim; ?>" alt="" /></a></div>
						<div class="sol fiyat">
							<span class="sol ubuntu" style="margin-right:5px; margin-left:5px; font-size:14px; color:#cc0000">Günlük <? if($ay=='01'){ echo $fiyat1=$aracveri[gun1ay1]; } if($ay=='02'){ echo $fiyat1=$aracveri[gun1ay2]; } if($ay=='03'){ echo $fiyat1=$aracveri[gun1ay3]; }  if($ay=='04'){ echo $fiyat1=$aracveri[gun1ay4]; } if($ay=='05'){ echo $fiyat1=$aracveri[gun1ay5]; } if($ay=='06'){ echo $fiyat1=$aracveri[gun1ay6]; } if($ay=='07'){ echo $fiyat1=$aracveri[gun1ay7]; } if($ay=='08'){ echo $fiyat1=$aracveri[gun1ay8]; } if($ay=='09'){ echo $fiyat1=$aracveri[gun1ay9]; } if($ay=='10'){ echo $fiyat1=$aracveri[gun1ay10]; } if($ay=='11'){ echo $fiyat1=$aracveri[gun1ay11]; } if($ay=='12'){ echo $fiyat1=$aracveri[gun1ay12]; } ?>.00 TL</span>
							<a href="<? echo $siteurl; ?>/rentacar/<? echo $aracveri[arac_sef]; ?>.html"><span class="sag" style="margin-top:-2px; color:#333;">Detaylar için tıklayınız</span></a>
						</div>
					</div>
<? $sayi++; } ?>
				</div>

            </div>
        </div>
		<div class="temizle sol" id="foother"><? include('inc/foother.php'); ?></div>
    </div>
</div>


</body>
</html>
