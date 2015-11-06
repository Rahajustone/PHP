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
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="<? echo $siteurl; ?>/js/jquery.tabify.source.js"></script>
<link rel="stylesheet" href="<? echo $siteurl; ?>/css/lightbox.css" type="text/css" media="screen" />
<? include('inc/title.php'); ?>
</head>

<body onload="test();">
<div id="container2">
<div id="pixel">
	<div id="genel">
    	<div class="sol" id="ustcizgi"></div>
<? include('inc/ustmenuler.php'); ?>

        <div class="sol ortakdiv">
        	<div class="sol" id="solalan">
<? include('inc/solmenu.php'); ?>
            </div>
        	<div class="sol" id="ortaalan">
<?
$yazi=mysql_query("select * from sabitler where sabit_id='1'");
$yaziveri = mysql_fetch_array($yazi);

?>
				<div class="sol mavitablo ubuntu"><? echo $yaziveri[sabit_adi_tr]; ?></div>
				<div class="temizle sol" style="margin:10px 0;">
					<table width="100%" border="0px"><tr><td><? echo $yaziveri[sabit_aciklama_tr]; ?></td></tr></table>
				</div>

            </div>
        </div>
		<div class="temizle sol" id="foother"><? include('inc/foother.php'); ?></div>
    </div>
</div>


</body>
</html>
