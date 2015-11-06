<?
include('inc/ayar.php');
include('inc/kontrol.php');
$ekle=uzanti2($adres2);
if(empty($ekle)){
$_SESSION['ayarlar'] = uzanti($adres);
}
else {
$_SESSION['ayarlar'] = uzanti2($adres2);
}
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
                    <div class="sol solbaslik fontkalin">İÇERİK YÖNETİMİ</div>
                    <div class="sol alt">
<? 
if(($_GET[sil]==sil) and ($_GET[icerik]==icerik)){
$silindi=mysql_query("DELETE FROM icerik where icerik_id='$_GET[icerik_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">İçerik Silindi.</div>';
}
?>

						<div class="sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list2 fontkalin" style="background:#fff; width:610px">Sayfa Adı</div>
						<div class="sol duzenle fontkalin" style="background:#fff;">Düzenle</div>
<?
$icerikler=mysql_query("select * from icerik order by icerik_id asc");
$sayi=1;
while($iceriklerveri = mysql_fetch_array($icerikler)) {
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
?>                          
						<div class="temizle sol sira" style="background:<? echo $renk; ?>"><? echo $sayi; ?></div>
						<div class="sol list2" style="background:<? echo $renk; ?>; width:610px"><? echo $iceriklerveri[sayfa_adi]; ?></div>
						<div class="sol duzenle" style="background:<? echo $renk; ?>"><a href="sabityaziduzenle.php?icerik_id=<? echo $iceriklerveri[icerik_id]; ?>"><img src="tema/duzenle.png" alt="" /></a></div>

<? $sayi++;} ?>                        
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
