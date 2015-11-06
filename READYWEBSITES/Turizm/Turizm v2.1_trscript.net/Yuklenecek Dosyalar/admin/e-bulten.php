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
                    <div class="sol solbaslik fontkalin">E-BÜLTEN KAYIT LİSTESİ</div>
                    <div class="sol alt">

<?
if($_GET[sil]==sil){
$silindi=mysql_query("DELETE FROM ebulten where ebulten_id='$_GET[ebulten_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Abonelik Silindi</div>';
}
?>
						<div class="temizle sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list3 fontkalin" style="background:#fff; width:200px;">Adı Soyadı</div>
						<div class="sol list3 fontkalin" style="background:#fff; width:395px;">E-Mail Adresi</div>
						<div class="sol sil fontkalin" style="background:#fff;">Sil</div>
<?
$ayar=mysql_query("select * from ebulten order by ebulten_id desc");
$sayi=1;
while($ayarveri = mysql_fetch_array($ayar)) {
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
?>                        
						<div class="temizle sol sira" style="background:<? echo $renk; ?>;"><? echo $sayi; ?></div>
						<div class="sol list3" style="background:<? echo $renk; ?>; width:200px;"><? echo $ayarveri[ebulten_adisoyadi]; ?></div>
						<div class="sol list3" style="background:<? echo $renk; ?>; width:395px;"><? echo $ayarveri[ebulten_mail]; ?></div>
						<div class="sol sil" style="background:<? echo $renk; ?>;"><a href="e-bulten.php?sil=sil&ebulten_id=<? echo $ayarveri[ebulten_id]; ?>"><img src="tema/sil.png" alt="" /></a></div>
<? $sayi++; } ?>                        
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
