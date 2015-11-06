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
<title>Rent A Car V5 Yönetim Paneli</title>
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
                    <div class="sol solbaslik fontkalin">ŞİFREMİ DEĞİŞTİR</div>
                    <div class="sol alt">
<? if($_GET[ekle]==ekle) { 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
if(!empty($sifre)){
	if($sifre==$sifre2){
	$yenisifre=md5($sifre);
		$sonuc=mysql_query("UPDATE admin set sifre='$yenisifre' where admin_id=1");
	echo '<div class="sol list4 fontkalin" style="background:#fff;">Şifreniz Değiştirilmiştir.</div>';
	}
	else {
	echo '<div class="sol list4 fontkalin" style="background:#fff;">Şifreler farklı girildiği için değiştirilememiştir.</div>';
	}
}
else {
	echo '<div class="sol list4 fontkalin" style="background:#fff;">Şifreyi boş bırakamazsınız.</div>';
}
}
?>

<form action="sifremidegistir.php?ekle=ekle" method="post">
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Şifre</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="password" name="sifre" style="border:1px solid #444; width:400px"></div>
					<div class="temizle sol inputadi fontkalin"><span style="padding-top:3px; display:block;">Şifre (Tekrar)</span></div><div class="sol inputnokta fontkalin">:</div><div class="sol inputicerik"><input type="password" name="sifre2" style="border:1px solid #444; width:400px"></div>
					<div class="sol temizle" style="margin-left:208px"><input type="submit" value="Ekle" style="width:150px" /></div>
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
