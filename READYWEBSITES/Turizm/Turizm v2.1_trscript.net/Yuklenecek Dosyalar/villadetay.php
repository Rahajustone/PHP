<? include('inc/ayar.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />

<? include('inc/oteldetayjs.php'); ?>
<? include('inc/title.php'); ?>
</head>

<body onload="test();">
<div id="pixel">
	<div id="genel">
    	<div class="sol" id="ustcizgi"></div>
<? include('inc/ustmenuler.php'); ?>

        <div class="sol ortakdiv">
        	<div class="sol" id="solalan">
<? include('inc/solmenu.php'); ?>
            </div>
        	<div class="sol" id="ortaalan">
<?
$indexoteller=mysql_query("select * from villalar where villa_sef='$_GET[villa_sef]'");
while($indexotellerveri = mysql_fetch_array($indexoteller)) {
$resimotel="oteller/".$indexotellerveri[villa_resim];
$indexbolge=mysql_query("select * from villailceler where ilce_id='$indexotellerveri[villa_bolge_id]'");
$indexbolgeveri = mysql_fetch_array($indexbolge);
$indexil=mysql_query("select * from villailler where il_id='$indexbolgeveri[il_id]'");
$indexilveri = mysql_fetch_array($indexil);
$indexfiyat=mysql_query("select * from villa_fiyat where tay>='$tay' and villa_id='$indexotellerveri[villa_id]'");
$indexfiyatveri = mysql_fetch_array($indexfiyat);
?>
				<div class="sol oteldetaybaslik ubuntu"><? echo $indexotellerveri[villaadi_tr]; ?></div><div class="sol oteldetayil"><? echo $indexilveri[il_adi]; ?>, <? echo $indexbolgeveri[ilce_adi_tr]; ?></div>
				<div class="sol temizle" style="height:1px; background:#ccc; width:790px; margin-bottom:5px;"></div>
				<div class="sol temizle">
							<div class="sol oteldetayresim"><img src="<? echo $siteurl; ?>/<? echo $resimotel; ?>" alt="" title="" /></div>
							<div class="sol detayayrinti" style="margin-top:5px; margin-left:5px;">
								<div class="sol" style="margin:0 0; width:390px">
									<div class="sol ubuntu" style="width:120px; height:25px">Kapasite</div><div class="sol ubuntu" style="color:#cc0000; width:60px; margin-right:20px; height:25px">: <? echo $indexotellerveri[kapasite]; ?> Kişilik</div>
									<div class="sol ubuntu" style="width:120px; height:25px">Merkeze Uzaklık</div><div class="sol ubuntu" style="color:#cc0000; width:50px; margin-right:20px; height:25px">: <? echo $indexotellerveri[villa_merkez]; ?> </div>
									<div class="sol ubuntu" style="width:120px; height:25px">Banyo Sayısı</div><div class="sol ubuntu" style="color:#cc0000; width:60px; margin-right:20px; height:25px">: <? echo $indexotellerveri[villa_banyo]; ?> Banyo</div>
									<div class="sol ubuntu" style="width:120px; height:25px">Havaaalanı Uzaklık</div><div class="sol ubuntu" style="color:#cc0000; width:50px; height:25px">: <? echo $indexotellerveri[villa_havaalani]; ?></div>

									<div class="sol ubuntu" style="width:120px; height:25px">Oda Sayısı</div><div class="sol ubuntu" style="color:#cc0000; width:60px; margin-right:20px; height:25px">: <? echo $indexotellerveri[villa_oda]; ?> Oda </div>
									<div class="sol ubuntu" style="width:120px; height:25px">Denize Uzaklık</div><div class="sol ubuntu" style="color:#cc0000; width:50px; margin-right:20px; height:25px">: <? echo $indexotellerveri[villa_deniz]; ?> </div>
									<div class="sol ubuntu" style="width:120px; height:25px">Yatak Odası</div><div class="sol ubuntu" style="color:#cc0000; width:60px; margin-right:20px; height:25px">: <? echo $indexotellerveri[villa_yatak]; ?> Oda </div>
									<div class="sol ubuntu" style="width:120px; height:25px">Market Uzaklık</div><div class="sol ubuntu" style="color:#cc0000; width:50px; height:25px">: <? echo $indexotellerveri[villa_market]; ?> </div>

									<div class="sol ubuntu" style="width:120px; height:25px"></div><div class="sol ubuntu" style="color:#cc0000; width:60px; margin-right:20px; height:25px"></div>
									<div class="sol ubuntu" style="width:120px; height:25px">Süpermar. Uzaklık</div><div class="sol ubuntu" style="color:#cc0000; width:50px; margin-right:20px; height:25px">: <? echo $indexotellerveri[villa_supermarket]; ?> </div>
									<div class="sol ubuntu" style="width:120px; height:25px"></div><div class="sol ubuntu" style="color:#cc0000; width:60px; margin-right:20px; height:25px"></div>
									<div class="sol ubuntu" style="width:120px; height:25px">Restaurant Uzaklık</div><div class="sol ubuntu" style="color:#cc0000; width:50px; height:25px">: <? echo $indexotellerveri[villa_restaurant]; ?> </div>
								</div>
								<div class="sol" style="margin:0 0; width:390px">
<? if($indexotellerveri[villa_ozelhavuz]=='1'){ ?><div class="sol" style="margin-right:10px; height:40px"><img src="<? echo $siteurl; ?>/tema/villa_havuz.jpg" alt="" /></div><div class="sol ubuntu" style="padding-top:10px; width:140px; height:30px; margin-bottom:10px">Özel Havuz</div> <? } ?>
<? if($indexotellerveri[villa_denizesifir]=='1'){ ?><div class="sol" style="margin-right:10px; height:40px"><img src="<? echo $siteurl; ?>/tema/villa_deniz.jpg" alt="" /></div><div class="sol ubuntu" style="padding-top:10px; width:140px; height:30px; margin-bottom:10px">Denize Sıfır</div> <? } ?>
<? if($indexotellerveri[villa_balayi]=='1'){ ?><div class="sol" style="margin-right:10px; height:40px"><img src="<? echo $siteurl; ?>/tema/villa_balayi.jpg" alt="" /></div><div class="sol ubuntu" style="padding-top:10px; width:140px; height:30px; margin-bottom:10px">Balayı Çiftleri</div> <? } ?>
<? if($indexotellerveri[villa_ortakhavuz]=='1'){ ?><div class="sol" style="margin-right:10px; height:40px"><img src="<? echo $siteurl; ?>/tema/villa_havuz.jpg" alt="" /></div><div class="sol ubuntu" style="padding-top:10px; width:140px; height:30px; margin-bottom:10px">Ortak Havuz</div> <? } ?>
<? if($indexotellerveri[villa_evcilhayvan]=='1'){ ?><div class="sol" style="margin-right:10px; height:40px"><img src="<? echo $siteurl; ?>/tema/villa_evcil.jpg" alt="" /></div><div class="sol ubuntu" style="padding-top:10px; width:140px; height:30px; margin-bottom:10px">Evcil Hayvan</div> <? } ?>
<? if($indexotellerveri[villa_luksev]=='1'){ ?><div class="sol" style="margin-right:10px; height:40px"><img src="<? echo $siteurl; ?>/tema/villa_luksev.jpg" alt="" /></div><div class="sol ubuntu" style="padding-top:10px; width:140px; height:30px; margin-bottom:10px">Lüks Ev</div> <? } ?>

								</div>
							</div>
				</div>
<? if($_GET[kayit]==1){ 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$ekle=mysql_query("INSERT INTO villarezervasyon (cinsiyet,adisoyadi,eposta,telefon,giristarihi,cikistarihi,talep,odatipi,odasayisi,villa_id) ".
"VALUES('$cinsiyet','$adisoyadi','$email','$telefon','$startdate','$enddate','$talep','$odatipi','$odasayisi','$indexotellerveri[villa_id]')");
?>
	<div class="mavitablo sol temizle ubuntu" style="margin-top:10px;">Rezervasyon Oluşturuldu.</div>
<? } ?>
				<div class="temizle sol">
		
<? if(!empty($indexotellerveri[enlem])){ ?>
	<div class="mavitablo sol temizle ubuntu" style="margin-bottom:10px; margin-top:10px;">Google Maps</div>
    <div id="mapCanvas" style="width:100%; height:350px; position:relative; margin-bottom:10px;"></div>
   <script type="text/javascript">
      //haritamizin baslangicda konumlanacagi noktayi tanimliyoruz
      var startPoint = new google.maps.LatLng(<? echo $indexotellerveri[enlem]; ?>, <? echo $indexotellerveri[boylam]; ?>);

      //harita seceneklerimizi tanimliyoruz.
      var mapOptions = {
        zoom      : 16,
        center    : startPoint,
        mapTypeId : google.maps.MapTypeId.ROADMAP
      }

      //haritamizi yukleyip ekranda goruntuluyoruz.
      var mapCanvas = document.getElementById('mapCanvas');
      var map = new google.maps.Map( mapCanvas, mapOptions );

      //marker ekle butonun olayini tanimliyoruz.
       function test()
      {
        var markerPoint = new google.maps.LatLng(<? echo $indexotellerveri[enlem]; ?>, <? echo $indexotellerveri[boylam]; ?>);

        var marker = new google.maps.Marker({
          title : 'Yeni marker',
          position : markerPoint,
          map : map
        })
      }
    </script>
<? } ?>


		<ul id="tabs" class="tabs" style="margin-top:10px">
			<li class="active"><a href="#description">Genel Bilgiler</a></li>
			<li><a href="#usage">Sezon Fiyatları</a></li>
			<li><a href="#download">Müsaitlik Durumu</a></li>
			<li><a href="#rezervasyon">Rezervasyon</a></li>
			<li><a href="#galeri">Fotoğraf Galerisi</a></li>
		</ul>
		<div id="description" class="content">
<? include('villa/ozellik.php'); ?>
		</div>
		<div id="usage" class="content">
<? include('villa/sezon.php'); ?>
		</div>
		<div id="download" class="content">
<? include('villa/musaitlik.php'); ?>
		</div>


		<div id="rezervasyon" class="content">
			<div class="sol fiyatlandirma ubuntu">Rezervasyon Formu</div>
			<form action="<? echo $siteurl."/villalar/".$indexbolgeveri[ilce_sef]."/".$indexotellerveri[villa_sef]."-kayitolusturuldu"; ?>" method="post" id="formID">
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Cinsiyet</div><div class="sol" style="font-size:13px; margin:5px 0 0 0"><span class="sol ubuntu" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><select style="width:225px;" name="cinsiyet"><option>Bay</option><option>Bayan</option></select></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Adınız Soyadınız</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="isim" name="adisoyadi" class="validate[required]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Telefon Numaranız</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="telefon" name="telefon" class="validate[required,custom[phone]]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">E-Mail Adresiniz</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="email" name="email" class="validate[required,custom[email]]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Talepleriniz</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><textarea name="talep" style="width:400px; resize:none; height:100px; font-family:arial; background:#fefefe; border-radius:5px; border:1px solid #ccc;" cols="45" rows="5"></textarea></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Giriş Tarihi</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="startdate" name="startdate" class="date-pick validate[required]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Çıkış Tarihi</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="enddate" name="enddate" class="date-pick validate[required]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;"></div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px"></span> <span style="display:block; margin-top:2px; margin-left:5px" class="sol"><input type="submit" class="fontkalin" value="Rezervasyonu Kaydet" style="width:250px; height:30px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" /></span></div>
			</form>
		</div>


		<div id="galeri" class="content">
<div id="gallery">
    <ul>
        <li>
			<div class="sol resim"><a href="<? echo $siteurl; ?>/<? echo $resimotel; ?>" rel="lightbox[plants]"><img src="<? echo $siteurl; ?>/<? echo $resimotel; ?>" alt="" /></a></div>
		</li>
<?
$galeri=mysql_query("select * from villa_galeri_resim where villa_id='$indexotellerveri[villa_id]' order by galeri_resim_id asc"); 
while($galeriveri = mysql_fetch_array($galeri)) { 
$resimgaleri="oteller/galeri/".$galeriveri[galeri_resim_adi];
?><li>
			<div class="sol resim"><a href="<? echo $siteurl; ?>/<? echo $resimgaleri; ?>" rel="lightbox[plants]"><img src="<? echo $siteurl; ?>/<? echo $resimgaleri; ?>" alt="" /></a></div>
</li><? }?>
</ul>
</div>
		</div>
	</div>
<? } ?>

            </div>
        </div>
		<div class="temizle sol" id="foother"><? include('inc/foother.php'); ?></div>
    </div>

</div>

<script type="text/javascript" src="<? echo $siteurl; ?>/js/lightbox.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });


</script>
</body>
</html>
