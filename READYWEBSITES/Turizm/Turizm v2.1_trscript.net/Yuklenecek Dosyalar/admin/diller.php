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
<title>Otel Y�netim Paneli</title>
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
                    <div class="sol solbaslik fontkalin">D�LLER</div>
                    <div class="sol alt">

						<div class="temizle sol sira fontkalin" style="background:#fff;">No</div>
						<div class="sol list3 fontkalin" style="background:#fff; width:609px;">Dil Ad�</div>
						<div class="sol duzenle fontkalin" style="background:#fff;">D�zenle</div> 
                   
						<div class="temizle sol sira fontkalin" style="background:#f2f2f2;">1</div>
						<div class="sol list3 fontkalin" style="background:#f2f2f2; width:609px;">T�rk�e</div>
						<div class="sol duzenle" style="background:#f2f2f2;"></div> 

						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#fff; width:609px;">Anasayfa Yaz�lar�</div>
						<div class="sol duzenle" style="background:#fff;"><a href="dillerduzenle.php?dil_id=1&anasayfa=anasayfa"><img src="tema/duzenle.png" alt="" /></a></div> 

						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">Men�ler & Butonlar</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=1&menuler=menuler"><img src="tema/duzenle.png" alt="" /></a></div> 


						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#fff; width:609px;">�st Bilgiler & Alt Bilgiler</div>
						<div class="sol duzenle" style="background:#fff;"><a href="dillerduzenle.php?dil_id=1&ust=ust"><img src="tema/duzenle.png" alt="" /></a></div> 

						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">E-B�lten & Galeri</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=1&ebulten=ebulten"><img src="tema/duzenle.png" alt="" /></a></div> 


						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">Sa� Rezervasyon Bilgileri</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=1&sag=sag"><img src="tema/duzenle.png" alt="" /></a></div> 



						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">�leti�im Bilgileri</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=1&iletisim=iletisim"><img src="tema/duzenle.png" alt="" /></a></div> 


						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">Rezervasyon Sayfas�</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=1&rezervasyon=rezervasyon"><img src="tema/duzenle.png" alt="" /></a></div> 
                   
						<div class="temizle sol sira fontkalin" style="background:#f2f2f2;">2</div>
						<div class="sol list3 fontkalin" style="background:#f2f2f2; width:609px;">�ngilizce</div>
						<div class="sol duzenle" style="background:#f2f2f2;"></div> 


						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#fff; width:609px;">Anasayfa Yaz�lar�</div>
						<div class="sol duzenle" style="background:#fff;"><a href="dillerduzenle.php?dil_id=2&anasayfa=anasayfa"><img src="tema/duzenle.png" alt="" /></a></div> 

						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">Men�ler & Butonlar</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=2&menuler=menuler"><img src="tema/duzenle.png" alt="" /></a></div> 


						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#fff; width:609px;">�st Bilgiler & Alt Bilgiler</div>
						<div class="sol duzenle" style="background:#fff;"><a href="dillerduzenle.php?dil_id=2&ust=ust"><img src="tema/duzenle.png" alt="" /></a></div> 

						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">E-B�lten & Galeri</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=2&ebulten=ebulten"><img src="tema/duzenle.png" alt="" /></a></div> 


						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">Sa� Rezervasyon Bilgileri</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=2&sag=sag"><img src="tema/duzenle.png" alt="" /></a></div> 



						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">�leti�im Bilgileri</div>
						<div class="sol duzenle" style="background:#f2f2f2;"><a href="dillerduzenle.php?dil_id=2&iletisim=iletisim"><img src="tema/duzenle.png" alt="" /></a></div> 



						<div class="temizle sol sira" style="background:#cc0000; color:#fff">-</div>
						<div class="sol list3" style="background:#f2f2f2; width:609px;">Rezervasyon Sayfas�</div>
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
