<?
session_start();
ob_start();
function permayap($deger1) {
$turkce=array("þ","Þ","ý","(",")","'","ü","Ü","ö","Ö","ç","Ç"," ","/","*","?","þ","Þ","ý","ð","Ð","Ý","ö","Ö","Ç","ç","ü","Ü","M","N","S","E","A","C","V","H","B","W","D","F","G","J","K","L","P","R","Y","Z","O");
$duzgun=array("þ","Þ","i","(",")","'","u","u","o","o","c","c","-","/","*","?","s","s","i","g","g","i","o","o","c","c","u","u","m","n","s","e","a","c","v","h","b","w","d","f","g","j","k","l","p","r","y","z","o");
$deger1=str_replace($turkce,$duzgun,$deger1);
$deger1 = preg_replace("@[^A-Za-z0-9. ,\-_]+@i","",$deger1);
return $deger1;
} 
$rw = array ('select', 'insert', 'delete', 'update', 'drop table', 'union', 'null', 'SELECT', 'INSERT', 'DELETE', 'UPDATE', 'DROP TABLE', 'UNION', 'NULL','order by','order  by'); 
for ($a = 0; $a < sizeof ($_GET); ++$a){ 
for ($b = 0; $b < sizeof ($rw); ++$b){ 
foreach($_GET as $gets){ 
if(preg_match ('/' . $rw[$b] . '/', $gets)){ 
$temp = key ($_GET); 
$_GET[$temp] = ''; 
exit('Þansýný Zorlama'); 
continue; 
} 
} 
} 
} 

include('inc/database.php');
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
$ay=date(m);
if($ay==01) { $tay='1';}
elseif($ay==02) { $tay='2';}
elseif($ay==03) { $tay='3';}
elseif($ay==04) { $tay='4';}
elseif($ay==05) { $tay='5';}
elseif($ay==06) { $tay='6';}
elseif($ay==07) { $tay='7';}
elseif($ay==08) { $tay='8';}
elseif($ay==09) { $tay='9';}
else { $tay=$ay; }

$site2url=$_SERVER['HTTP_HOST'];
$siteurl="http://turizm.demoincele.com";
$siteayarlar=mysql_query("select * from siteayarlari WHERE site_id='1'");
$siteayarlarveri = mysql_fetch_array($siteayarlar);


function uzanti($adres){ 
$ender = explode("/",$adres); 
$uzanti = $ender[count($ender)-1]; 
return $uzanti; 
} 
$adres = $_SERVER['REQUEST_URI']; 

function uzanti2($adres2){ 
$ender2 = explode("?",$adres2); 
$uzanti2 = $ender2[count($ender2)-2]; 
return $uzanti2; 
} 

$adres2=uzanti($adres);

?>