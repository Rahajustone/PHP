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
                    <div class="sol solbaslik fontkalin">DİLLER</div>
                    <div class="sol alt">

						<div class="temizle sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list3 fontkalin" style="background:#fff; width:609px;">Dil Adı</div>
						<div class="sol duzenle fontkalin" style="background:#fff;">Düzenle</div> 
                   
						<div class="temizle sol sira fontkalin" style="background:#f2f2f2;">1</div>
						<div class="sol list3 fontkalin" style="background:#f2f2f2; width:609px;">Türkçe</div>
						<div class="sol duzenle" style="background:#f2f2f2;"></div> 

						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#fff; width:609px;">Anasayfa Yazıları</div>
						<div class="sol duzenle" style="background:#fff;"><a href="dillerduzenle.php?dil_id=1&anasayfa=anasayfa"><img src="tema/duzenle.png" alt="" /></a></div> 

						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">Menüler & Butonlar</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=1&menuler=menuler"><img src="tema/duzenle.png" alt="" /></a></div> 


						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#fff; width:609px;">Üst Bilgiler & Alt Bilgiler</div>
						<div class="sol duzenle" style="background:#fff;"><a href="dillerduzenle.php?dil_id=1&ust=ust"><img src="tema/duzenle.png" alt="" /></a></div> 

						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">E-Bülten & Galeri</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=1&ebulten=ebulten"><img src="tema/duzenle.png" alt="" /></a></div> 


						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">Sağ Rezervasyon Bilgileri</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=1&sag=sag"><img src="tema/duzenle.png" alt="" /></a></div> 



						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">İletişim Bilgileri</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=1&iletisim=iletisim"><img src="tema/duzenle.png" alt="" /></a></div> 


						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">Rezervasyon Sayfası</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=1&rezervasyon=rezervasyon"><img src="tema/duzenle.png" alt="" /></a></div> 
                   
						<div class="temizle sol sira fontkalin" style="background:#f2f2f2;">2</div>
						<div class="sol list3 fontkalin" style="background:#f2f2f2; width:609px;">İngilizce</div>
						<div class="sol duzenle" style="background:#f2f2f2;"></div> 


						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#fff; width:609px;">Anasayfa Yazıları</div>
						<div class="sol duzenle" style="background:#fff;"><a href="dillerduzenle.php?dil_id=2&anasayfa=anasayfa"><img src="tema/duzenle.png" alt="" /></a></div> 

						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">Menüler & Butonlar</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=2&menuler=menuler"><img src="tema/duzenle.png" alt="" /></a></div> 


						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#fff; width:609px;">Üst Bilgiler & Alt Bilgiler</div>
						<div class="sol duzenle" style="background:#fff;"><a href="dillerduzenle.php?dil_id=2&ust=ust"><img src="tema/duzenle.png" alt="" /></a></div> 

						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">E-Bülten & Galeri</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=2&ebulten=ebulten"><img src="tema/duzenle.png" alt="" /></a></div> 


						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">Sağ Rezervasyon Bilgileri</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=2&sag=sag"><img src="tema/duzenle.png" alt="" /></a></div> 



						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">İletişim Bilgileri</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=2&iletisim=iletisim"><img src="tema/duzenle.png" alt="" /></a></div> 



						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">Rezervasyon Sayfası</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=2&rezervasyon=rezervasyon"><img src="tema/duzenle.png" alt="" /></a></div> 

  
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
