<?
include('inc/ayar.php');
function GetIP(){
 if(getenv("HTTP_CLIENT_IP")) {
 $ip = getenv("HTTP_CLIENT_IP");
 } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 $ip = getenv("HTTP_X_FORWARDED_FOR");
 if (strstr($ip, ',')) {
 $tmp = explode (',', $ip);
 $ip = trim($tmp[0]);
 }
 } else {
 $ip = getenv("REMOTE_ADDR");
 }
 return $ip;
}
$ip_adresi = GetIP();
$hacktarih=date("d.m.Y");
if(!empty($_SERVER['HTTP_REFERER'])){ 
$adres=$_SERVER['HTTP_REFERER'];
$ekle=mysql_query("INSERT INTO gelensite (ipadres,tarih,adres) ".
"VALUES('$ip_adresi','$hacktarih','$adres')");
}
include('inc/kontrol.php');
$_SESSION['ayarlar'] = uzanti($adres);

$siltarih=date("Y-m-d");
$silgun=date("d");
$silay=date("m");
$sil=mysql_query("DELETE FROM stop_sale WHERE tarih1<'$siltarih'");

$sil2=mysql_query("DELETE FROM tarih_araligi WHERE tarih_donus_ay<'$silay'");

$sil3=mysql_query("DELETE FROM villa_fiyat WHERE tay<'$silay'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<link rel="stylesheet" type="text/css" href="css/terminal.css" />
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
                    <div class="sol solbaslik fontkalin">SON 15 REZERVASYON</div>
                    <div class="sol alt">
						<div class="sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list1 fontkalin" style="background:#fff;">Rezervasyon Sahibi</div>
						<div class="sol tarih fontkalin" style="background:#fff;">Giriþ Tarihi</div>
						<div class="sol incele fontkalin" style="background:#fff;">Detay</div>
						<div class="sol duzenle fontkalin" style="background:#fff;">Düzenle</div>
						<div class="sol sil fontkalin" style="background:#fff;">Sil</div>
<?
$rezer=mysql_query("select * from rezervasyon order by rezervasyon_id desc limit 15");
$sayi=1;
while($rezerveri = mysql_fetch_array($rezer)) {
if($sayi%2) {
$renk = "#f2f2f2";
} else {
$renk = "#fff";
}
?>                          
						<div class="temizle sol sira" style="background:<? echo $renk; ?>"><? echo $sayi; ?></div>
						<div class="sol list1" style="background:<? echo $renk; ?>;"><? echo $rezerveri[adisoyadi]; ?></div>
						<div class="sol tarih" style="background:<? echo $renk; ?>;"><? echo $rezerveri[giristarihi]; ?></div>
						<div class="sol duzenle" style="background:<? echo $renk; ?>"><a href="rezervasyondetayi.php?rezervasyon_id=<? echo $rezerveri[rezervasyon_id]; ?>"><img src="tema/incele.png" alt="" /></a></div>
						<div class="sol duzenle" style="background:<? echo $renk; ?>"><a href="rezervasyonduzenle.php?rezervasyon_id=<? echo $rezerveri[rezervasyon_id]; ?>"><img src="tema/duzenle.png" alt="" /></a></div>
						<div class="sol sil" style="background:<? echo $renk; ?>"><a href="rezervasyonlar.php?rezervasyon_id=<? echo $rezerveri[rezervasyon_id]; ?>&sil=sil"><img src="tema/sil.png" alt="" /></a></div>
                        
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
