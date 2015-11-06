<?
session_start();
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
define('DB_HOST', 'localhost');
define('DB_USER', 'demo_turizm');
define('DB_PASSWORD', '654123');
define('DB_DATABASE', 'demo_turizm');

include('../inc/database.php');

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