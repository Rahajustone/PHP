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
                    <div class="sol solbaslik fontkalin">TATİL BÖLGELERİ</div>
                    <div class="sol alt">
<?
if(($_GET[sil]==sil) and !empty($_GET[il_id])){
$silindi=mysql_query("DELETE FROM iller where il_id='$_GET[il_id]'");
$silindi2=mysql_query("DELETE FROM ilceler where il_id='$_GET[il_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">İl, Tatil Bölgeleri ve Bu il ile tatil bölgelerinde kayıtlı oteller silindi.</div>';
}

if(($_GET[sil]==sil) and !empty($_GET[ilce_id])){
$silindi=mysql_query("DELETE FROM ilceler where ilce_id='$_GET[ilce_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Tatil Bölgesi Silindi.</div>';
}
?>
						<div class="sag incele fontkalin" style="background:#cc0000; width:104px;"><a href="ilekle.php" style="color:#fff">İl Ekle</a></div>
						<div class="temizle sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list1 fontkalin" style="background:#fff; width:530px">İl Adı / Tatil Bölgesi</div>
						<div class="sol duzenle fontkalin" style="background:#fff; width:76px">Bölge Ekle</div>
						<div class="sol sil fontkalin" style="background:#fff;">Sil</div>
<?
$ayar=mysql_query("select * from iller order by il_adi asc limit 40");
$sayi=1;
while($ayarveri = mysql_fetch_array($ayar)) {
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
?>   
						<div class="temizle sol sira" style="background:<? echo $renk; ?>"><? echo $sayi; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>; width:530px"><? echo $ayarveri[il_adi]; ?></div>
						<div class="sol duzenle" style="background:<? echo $renk; ?>; width:76px"><a href="bolgeekle.php?il_id=<? echo $ayarveri[il_id]; ?>">Ekle</a></div>
						<div class="sol sil" style="background:<? echo $renk; ?>"><a href="tatilbolgeleri.php?il_id=<? echo $ayarveri[il_id]; ?>&sil=sil"><img src="tema/sil.png" alt="" /></a></div>
      
<?
$konaklama=mysql_query("select * from ilceler where il_id='$ayarveri[il_id]' order by ilce_adi_tr asc limit 40");
while($konaklamaveri = mysql_fetch_array($konaklama)) {
?>   
						<div class="temizle sol" style="width:30px; height:30px;margin-right:4px;"></div>
						<div class="sol list1" style="background:#e1e1e1; width:530px"><? echo $konaklamaveri[ilce_adi_tr]; ?></div>
						<div class="sol duzenle" style="background:#e1e1e1; width:76px"><a href="tatilbolgeleriduzenle.php?ilce_id=<? echo $konaklamaveri[ilce_id]; ?>"><img src="tema/duzenle.png" alt="" /></a></div>
						<div class="sol sil" style="background:#e1e1e1"><a href="tatilbolgeleri.php?ilce_id=<? echo $konaklamaveri[ilce_id]; ?>&sil=sil"><img src="tema/sil.png" alt="" /></a></div>
<? } ?>

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
