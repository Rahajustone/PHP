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
                    <div class="sol solbaslik fontkalin">REZERVASYON DETAYI</div>
                    <div class="sol alt">
<?
$rezer=mysql_query("select * from transfer where transfer_id='$_GET[transfer_id]'");
$rezerveri = mysql_fetch_array($rezer);

 echo "
							<div style='width:710px; float:left; margin-right:10px; margin-bottom:10px'>
				            	<div class='list3 fontkalin' style='float:left; background:#fff; margin-bottom:5px; width:702px; padding:5px 0 0 5px'>Kişisel Bilgileri</span></div>
								<div style='clear:both; height:25px; margin-top:20px'><span style='float:left; width:150px; display:block'>Cinsiyeti</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[cinsiyet]."</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Adı Soyadı</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[adisoyadi]."</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>E-Posta Adresi</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[eposta]."</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Telefon</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[telefon]."</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Talepler</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[talep]."</span></div>
							</div>


							<div style='width:710px; float:left; margin-right:10px; margin-bottom:10px'>
				            	<div class='list3 fontkalin' style='float:left; background:#fff; margin-bottom:5px; width:702px; padding:5px 0 0 5px'>Rezervasyon Bilgileri</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Talep Tarihi</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[giristarihi]."</span></div>	
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Talep Saati</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[saati]."</span></div>

								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Uçuş Firması</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[ucusfirmasi]."</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Uçuş No</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[ucusno]."</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Kalkış Havalimanı</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[kalkis]."</span></div>
								<div style='clear:both; height:25px;'><span style='float:left; width:150px; display:block'>Kişi Sayısı</span><span style='float:left; width:550px; display:block'>: ".$rezerveri[kisi]."</span></div>
							</div>
";

?>

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
