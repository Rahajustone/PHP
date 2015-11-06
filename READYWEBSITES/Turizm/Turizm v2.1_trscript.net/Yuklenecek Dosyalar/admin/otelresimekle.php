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
                    <div class="sol solbaslik fontkalin">OTEL RESMİ EKLE</div>
                    <div class="sol alt">
<? if($_GET[ekle]==ekle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}

if(($_GET[ekle]==ekle)){
	$pos = strpos($_FILES['resimx']['name'],"php");
	$pos2 = strpos($_FILES['resimx']['name'],"php3");
	$pos3 = strpos($_FILES['resimx']['name'],"exe");
	$pos4 = strpos($_FILES['resimx']['name'],"asp");
	$pos5 = strpos($_FILES['resimx']['name'],"php4");
	if (($pos !== false) or ($pos2 !== false) or ($pos3 !== false) or ($pos4 !== false) or ($pos5 !== false)) {
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
$resimadi=$_FILES['resimx']['name'];
$ekle=mysql_query("INSERT INTO hack (ipadres,tarih,dosyaadi) ".
"VALUES('$ip_adresi','$hacktarih','$resimadi')");
			echo '<div class="sol list4 fontkalin" style="background:#fff;">Hatalı bir dosya yüklediniz.</div>';
	} 
	else {
		if ($_FILES['resimx']['type'] != "image/gif" && 
		$_FILES['resimx']['type'] != "image/jpeg" && 
		$_FILES['resimx']['type'] != "image/pjpeg" && 
		$_FILES['resimx']['type'] != "image/png"){ 
			echo '<div class="sol list4 fontkalin" style="background:#fff;">Dosya formatınız yanlış</div>';
		} else { 
		if($_FILES['resimx']['type'] == "image/gif") $uzanti=".gif"; 
		elseif($_FILES['resimx']['type'] == "image/jpeg") $uzanti=".jpeg"; 
		elseif($_FILES['resimx']['type'] == "image/pjpeg") $uzanti=".jpg"; 
		elseif($_FILES['resimx']['type'] == "image/png") $uzanti=".png"; 
		$resim=$_FILES['resimx']['name']; 
		$uzanti=substr_replace($resim,"",0,-3); 
		$isim=md5(rand(9,99999)); 
		$yeniisim=$isim.".".$uzanti; 
		$resim=$yeniisim; 
		move_uploaded_file($_FILES['resimx']['tmp_name'], "../oteller/galeri/".$yeniisim); 


$ekle=mysql_query("INSERT INTO otel_galeri_resim (otel_id,galeri_resim_adi) ".
"VALUES('$_GET[otel_id]','$resim')");



	echo '<div class="sol list4 fontkalin" style="background:#fff;">Resmi Yüklendi.</div>';
		} 
	}
	}
}
?>


<form action="otelresimekle.php?ekle=ekle&otel_id=<? echo $_GET[otel_id]; ?>" method="post" enctype="multipart/form-data">
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Resim Ekle</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="file" name="resimx" style="border:1px solid #444; width:400px"></div>
					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Resim Ekle" style="width:150px" /></div>
</form>

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
