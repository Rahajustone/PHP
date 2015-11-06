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
                   <div class="sol solbaslik fontkalin">ARAÇ LİSTESİ</div>
                    <div class="sol alt">
<? 
if($_GET[sil]==sil){
$silindi=mysql_query("DELETE FROM araclar where arac_id='$_GET[arac_id]'");
echo '<div class="sol list4 fontkalin" style="background:#fff; color:#cc0000">Araç Silindi.</div>';
}
?>

						<div class="sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list2 fontkalin" style="background:#fff; width:397px;">Araç Adı</div>
						<div class="sol tarih fontkalin" style="background:#fff;">Vites</div>
						<div class="sol incele fontkalin" style="background:#fff;">Resim</div>
						<div class="sol duzenle fontkalin" style="background:#fff;">Düzenle</div>
						<div class="sol sil fontkalin" style="background:#fff;">Sil</div>
<?
$ayar=mysql_query("select * from araclar order by arac_id desc");
$sayi=1;
while($ayarveri = mysql_fetch_array($ayar)) {
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
?>                          
						<div class="temizle sol sira" style="background:<? echo $renk; ?>"><? echo $sayi; ?></div>
						<div class="sol list2" style="background:<? echo $renk; ?>; width:397px;"><? echo $ayarveri[arac_adi_tr]; ?></div>
						<div class="sol tarih" style="background:<? echo $renk; ?>;"><? if($ayarveri[arac_vites]==1){ echo "Manuel"; } else { echo "Otomatik"; } ?></div>
						<div class="sol incele" style="background:<? echo $renk; ?>"><a href="aracresimekle.php?arac_id=<? echo $ayarveri[arac_id]; ?>"><img src="tema/icon_resim.png" alt="" /></a></div>
						<div class="sol duzenle" style="background:<? echo $renk; ?>"><a href="aracduzenle.php?arac_id=<? echo $ayarveri[arac_id]; ?>"><img src="tema/duzenle.png" alt="" /></a></div>
						<div class="sol sil" style="background:<? echo $renk; ?>"><a href="rentacar.php?sil=sil&arac_id=<? echo $ayarveri[arac_id]; ?>"><img src="tema/sil.png" alt="" /></a></div>
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
