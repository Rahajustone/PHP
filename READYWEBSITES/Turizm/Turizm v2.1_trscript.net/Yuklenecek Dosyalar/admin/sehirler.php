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
                    <div class="sol solbaslik fontkalin">ŞEHİR LİSTESİ</div>
                    <div class="sol alt">

<?
if($_GET[sil]==sil){
$silindi=mysql_query("DELETE FROM sehirler where sehir_id='$_GET[sehir_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff;">Şehir Silindi</div>';
}
if($_GET[aktif]=="aktif"){
$sonuc=mysql_query("UPDATE siteayarlari set varsayilan_sehir='$_GET[sehir_id]' where site_id='1'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Varsayılan Şehir Seçildi.</div>';
}
?>
						<div class="sag sira fontkalin" style="background:#fff; width:100px;"><a href="sehirekle.php" style="color:#cc0000">Şehir Ekle</a></div>
						<div class="temizle sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list3 fontkalin" style="background:#fff; width:536px;">Şehir Adı</div>
						<div class="sol duzenle fontkalin" style="background:#fff; width:70px;">Varsayılan</div>
						<div class="sol sil fontkalin" style="background:#fff;">Sil</div>
<?
$ayar=mysql_query("select * from sehirler order by sehir_id desc");
$sayi=1;
while($ayarveri = mysql_fetch_array($ayar)) {
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
?>                        
						<div class="temizle sol sira" style="background:<? echo $renk; ?>;"><? echo $sayi; ?></div>
						<div class="sol list3" style="background:<? echo $renk; ?>; width:536px;"><? echo $ayarveri[il_adi]; ?></div>
						<div class="sol duzenle fontkalin" style="background:<? echo $renk; ?>; width:70px;"><? if($siteayarlarveri[varsayilan_sehir]==$ayarveri[sehir_id]){ echo '<img src="tema/icon_aktif.png" alt="" />'; } else { echo '<a href="sehirler.php?aktif=aktif&sehir_id='.$ayarveri[sehir_id].'"><img src="tema/icon_pasif.png" alt="" /></a>'; } ?></div>
						<div class="sol sil" style="background:<? echo $renk; ?>;"><a href="sehirler.php?sil=sil&sehir_id=<? echo $ayarveri[sehir_id]; ?>"><img src="tema/sil.png" alt="" /></a></div>
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
