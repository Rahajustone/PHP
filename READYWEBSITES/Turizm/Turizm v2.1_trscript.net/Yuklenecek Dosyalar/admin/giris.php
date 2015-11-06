<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<link rel="stylesheet" type="text/css" href="css/terminal.css" />
<title>Otel Yönetim Paneli</title>
</head>

<body>
	<div style="width:726px; margin:0 auto">


        <div class="temizle sol" style="margin-top:230px">
        	<div id="ortaalan" class="sol">
                <div class="sol temizle">
                    <div class="sol solbaslik fontkalin" style="text-align:center">Admin Girişi</div>
                    <div class="sol alt">
						<form action="giriskontrol.php" method="POST">
						<div class="sol fontkalin" style="width:200px; height:20px; padding:5px 0 0 150px;">Yönetici Adı</div>
						<div class="sol fontkalin" style="width:10px; height:20px; padding:5px 0 0 0;">:</div>
						<div class="sol" style="width:200px; height:25px; padding:0 0 0 0;"><input type="text" name="kullanici_adi" style="width:200px; border:1px solid #666;"></div>

						<div class="temizle sol fontkalin" style="width:200px; height:20px; padding:5px 0 0 150px;">Şifre</div>
						<div class="sol fontkalin" style="width:10px; height:20px; padding:5px 0 0 0;">:</div>
						<div class="sol" style="width:200px; height:25px; padding:0 0 0 0;"><input type="password" name="sifre" style="width:200px; border:1px solid #666;"></div>

						<div class="temizle sol fontkalin" style="width:200px; height:20px; padding:5px 0 0 150px;"></div>
						<div class="sol fontkalin" style="width:10px; height:20px; padding:5px 0 0 0;"></div>
						<div class="sol" style="width:200px; height:25px; padding:0 0 0 0;"><input type="submit" value="Giriş Yap" style="width:200px; border:1px solid #666;"></div>
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
