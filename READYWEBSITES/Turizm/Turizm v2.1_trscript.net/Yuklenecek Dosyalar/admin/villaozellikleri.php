<?
include('inc/ayar.php');
include('inc/kontrol.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<style>
td {
width:200px;
height:25px;
}
</style>
<link rel="stylesheet" type="text/css" href="css/terminal.css" />
<script type="text/javascript" src="js/jquery-1.4.2.js"></script> 
<script type="text/javascript" src="js/base.js"></script> 
<script type="text/javascript" src="js/utility.js"></script> 

<script type="text/javascript" src="js/MXWidgets.js"></script>
<script type="text/javascript" src="js/JSRecordset.js"></script>
<script type="text/javascript" src="js/CommaCheckboxes.js"></script>
<script>
top.jsRawData_rsFeas = [
["fea_ID", "fea_name", "fea_name_en"],
//data
<? 
$ayar=mysql_query("select * from villa_ozellik order by ozellik_id asc");
while($ayarveri = mysql_fetch_array($ayar)) {
?>
["<? echo $ayarveri[ozellik_id]; ?>","<? echo $ayarveri[ozellik_adi_tr]; ?>","<? echo $ayarveri[ozellik_adi_en]; ?>"], 
<? } ?>,
];
top.rsFeas = new JSRecordset('rsFeas');
</script>
<title>Otel Y�netim Paneli</title>
</head>

<body>

	<div id="genel">
<?
include('inc/ust.php');
include('inc/altmenu.php');
?>
        <div class="temizle sol" style="margin-top:25px">
        	<div id="ortaalan" class="sol" style="width:1000px">
                <div class="sol temizle">
					<form action="villaozellikleri.php?guncelle=guncelle&villa_id=<? echo $_GET[villa_id]; ?>" method="post">
                    <div class="sol otel fontkalin">OTEL �ZELL�KLER� D�ZENLEME ALANI</div>
                    <div class="sol otelalt">
<?

if($_GET[guncelle]=='guncelle'){
$sonuc=mysql_query("UPDATE villalar set villa_ozellikleri='$_POST[hotel_fea]' where villa_id='$_GET[villa_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; width:970px">Villa �zellikleri D�zenlendi. <a href="villaduzenle.php?villa_id='.$_GET[villa_id].'">Geri D�n</a></div>';
}
else {
echo '<div class="sol list4 fontkalin" style="background:#fff; width:970px"><a href="villaduzenle.php?villa_id='.$_GET[villa_id].'">Geri D�n</a></div>';
}
$otel=mysql_query("select * from villalar where villa_id='$_GET[villa_id]'");
$otelveri = mysql_fetch_array($otel);
?>
					<div class="sol temizle"><input name="hotel_fea" id="hotel_fea" value="<? echo $otelveri[villa_ozellikleri]; ?>" wdg:recordset="rsFeas" wdg:subtype="CommaCheckboxes" wdg:type="widget" wdg:displayfield="fea_name" wdg:valuefield="fea_ID" wdg:groupby="5" /></div>
					<div class="sol temizle" style=""><input type="submit" value="G�ncelle" style="width:110px" /></div>
                    </div>
					</form>
                </div>
            </div>
        </div>
    </div>
<?
include('inc/foother.php');
?>
</body>
</html>
