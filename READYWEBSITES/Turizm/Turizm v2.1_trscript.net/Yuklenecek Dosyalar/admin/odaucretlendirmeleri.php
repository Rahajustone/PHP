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
                    <div class="sol solbaslik fontkalin">REZERVASYON YÖNETİMİ - ODA ÜCRETLERİ</div>
                    <div class="sol alt">
<?
if($_GET[sil]==sil){
$silindi=mysql_query("DELETE FROM oda_tipi where oda_tipi_id='$_GET[oda_tipi_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Oda Ücreti Silindi.</div>';
}
?>
						<div class="sag incele fontkalin" style="background:#cc0000; width:104px;"><a href="odaucretiekle.php" style="color:#fff">Oda Ücreti Ekle</a></div>
						<div class="temizle sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list1 fontkalin" style="background:#fff; width:452px">Oda Adı</div>
						<div class="sol incele fontkalin" style="background:#fff; width:100px">Stop-Sale</div>
						<div class="sol duzenle fontkalin" style="background:#fff;">Düzenle</div>
						<div class="sol sil fontkalin" style="background:#fff;">Sil</div>
<?
$ayar=mysql_query("select * from oda_tipi order by oda_tipi_id desc limit 40");
$sayi=1;
while($ayarveri = mysql_fetch_array($ayar)) {
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
?>   
						<div class="temizle sol sira" style="background:<? echo $renk; ?>"><? echo $sayi; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:452px"><? echo $ayarveri[oda_tipi_adi_tr]; ?></div>
						<div class="sol duzenle" style="background:<? echo $renk; ?>; width:100px"><a href="rezervasyonyonetimi.php?oda_tipi_id=<? echo $ayarveri[oda_tipi_id]; ?>"><img src="tema/incele.png" alt="" /></a></div>
						<div class="sol duzenle" style="background:<? echo $renk; ?>"><a href="odatipiduzenle.php?oda_tipi_id=<? echo $ayarveri[oda_tipi_id]; ?>"><img src="tema/duzenle.png" alt="" /></a></div>
						<div class="sol sil" style="background:<? echo $renk; ?>"><a href="rezervasyonyonetimi.php?oda_tipi_id=<? echo $ayarveri[oda_tipi_id]; ?>&sil=sil"><img src="tema/sil.png" alt="" /></a></div>
                        
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
