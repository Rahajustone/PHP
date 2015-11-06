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
$indexoteller=mysql_query("select * from oteller where otel_sef='$_GET[otel_sef]'");
while($indexotellerveri = mysql_fetch_array($indexoteller)) {
$resimotel="oteller/".$indexotellerveri[otel_resim];
$indexbolge=mysql_query("select * from ilceler where ilce_id='$indexotellerveri[otel_bolge_id]'");
$indexbolgeveri = mysql_fetch_array($indexbolge);
$indexil=mysql_query("select * from iller where il_id='$indexbolgeveri[il_id]'");
$indexilveri = mysql_fetch_array($indexil);
$indexkonaklama=mysql_query("select * from konaklama where konaklama_id='$indexotellerveri[konaklama_id]'");
$indexkonaklamaveri = mysql_fetch_array($indexkonaklama);
$indexerken=mysql_query("select * from erkenrezervasyon where otel_id='$indexotellerveri[otel_id]'");
$indexerkenveri = mysql_fetch_array($indexerken);
$indexfirsat=mysql_query("select * from firsatotelleri where otel_id='$indexotellerveri[otel_id]'");
$indexfirsatveri = mysql_fetch_array($indexfirsat);
$indexfiyat=mysql_query("select * from otel_fiyat where tay>='$tay' and otel_id='$indexotellerveri[otel_id]'");
$indexfiyatveri = mysql_fetch_array($indexfiyat);
?>
				<div class="sol oteldetaybaslik ubuntu"><? echo $indexotellerveri[oteladi_tr]; ?></div><div class="sol oteldetayil"><? echo $indexilveri[il_adi]; ?>, <? echo $indexbolgeveri[ilce_adi_tr]; ?></div>
				<div class="sol temizle" style="height:1px; background:#ccc; width:790px; margin-bottom:5px;"></div>
				<div class="sol temizle">
							<div class="sol oteldetayresim"><img src="<? echo $siteurl; ?>/<? echo $resimotel; ?>" alt="" title="" /></div>
							<div class="sol detayayrinti">
								<?  if(!empty($indexotellerveri[otel_indirim]) and ($indexotellerveri[otel_indirim]!=0)){ ?><div class="sol oteldetayindirim ubuntu"><? echo "%".$indexotellerveri[otel_indirim]." İndirim"; ?></div><? } ?>
								<div class="sol fiyat"><? if(!empty($indexfiyatveri[fiyat_id])){ if(empty($indexotellerveri[otel_indirim]) or ($indexotellerveri[otel_indirim]==0)) { ?><div class=" ubuntu"> <? echo $indexfiyatveri[ucret].".00 TL</div>"; } else { $yuzde3="1.".$indexotellerveri[otel_indirim]; $indirim3=$indexfiyatveri[ucret]/$yuzde3; echo "<div class='sol ubuntu' style='color:#cc0000; font-size:18px;'> ".ceil($indirim3).".00 TL</div> <span style='text-decoration:line-through; color:#666; font-size:16px; margin-left:20px' class='sol'>".$indexfiyatveri[ucret].".00 TL</span>"; } } ?></div>
								<div class="sol konaklama ubuntu"><? echo $indexkonaklamaveri[konaklama_adi_tr]; ?></div>
								<div class="sol konaklama ubuntu" style="color:#E86E23"><? echo $indexotellerveri[cocuk1]; ?> Yaş Ücretsiz</div>
								<div class="temizle sol">
									<div class="sol"><? if($indexotellerveri[otel_yildiz]==0){ echo "<span class='fontkalin' style='color:white'>Apart Otel</span>"; } else { $yildiz=1; while($yildiz<=$indexotellerveri[otel_yildiz]) { ?><img src="<? echo $siteurl; ?>/tema/icon_sari.png" alt="" /> <? $yildiz++; } } ?>
								</div>
								<div class="temizle sol ubuntu" style="margin:15px 0 0 0; font-size:16px; color:#666;"><? if(!empty($indexerkenveri[erken_id]))  { ?>ERKEN REZERVASYON<? } if(empty($indexerkenveri[erken_id]) and !empty($indexfirsatveri[firsat_id]))  { ?>FIRSAT OTELİ<? } ?></div>
								<div class="temizle sol">
								<div class="temizle sol ubuntu" style="margin:55px 0 5px 0; width:150px">Denize Uzaklık</div><div class="sol ubuntu" style="margin:55px 0 5px 0; color:#666; width:200px;">: <? echo $indexotellerveri[otel_deniz]; ?></div>
								<div class="temizle sol ubuntu" style="margin:10px 0 5px 0; width:150px">Merkeze Uzaklık</div><div class="sol ubuntu" style="margin:10px 0 5px 0; color:#666; width:200px">: <? echo $indexotellerveri[otel_merkez]; ?></div>
								<div class="temizle sol ubuntu" style="margin:10px 0 5px 0; width:150px">Havaalanına Uzaklık</div><div class="sol ubuntu" style="margin:10px 0 5px 0; color:#666; width:200px">: <? echo $indexotellerveri[otel_havaalani]; ?></div>
								</div>
							</div>
				</div>
<? if(!empty($_GET[kayit])){ 
foreach($_POST AS $key => $value) {
${$key} = $value;
}
$ekle=mysql_query("INSERT INTO rezervasyon (cinsiyet,adisoyadi,eposta,telefon,giristarihi,cikistarihi,talep,odatipi,odasayisi,otel_id) ".
"VALUES('$cinsiyet','$adisoyadi','$email','$telefon','$startdate','$enddate','$talep','$odatipi','$odasayisi','$indexotellerveri[otel_id]')");
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


		<ul id="tabs" class="tabs">
			<li class="active"><a href="#description">Genel Bilgiler</a></li>
			<li><a href="#usage">Sezon Fiyatları</a></li>
			<li><a href="#download">Müsaitlik Durumu</a></li>
			<li><a href="#rezervasyon">Rezervasyon</a></li>
			<li><a href="#galeri">Fotoğraf Galerisi</a></li>
		</ul>
		<div id="description" class="content">
<? include('otel/ozellik.php'); ?>
		</div>
		<div id="usage" class="content">
<? include('otel/sezon.php'); ?>
		</div>

		<div id="download" class="content">
<? include('otel/musaitlik.php'); ?>
		</div>


		<div id="rezervasyon" class="content">
			<div class="sol fiyatlandirma ubuntu">Rezervasyon Formu</div>
			<form action="<? echo $siteurl."/".$indexbolgeveri[ilce_sef]."/".$indexotellerveri[otel_sef]."-kayitolusturuldu"; ?>" method="post" id="formID">
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Cinsiyet</div><div class="sol" style="font-size:13px; margin:5px 0 0 0"><span class="sol ubuntu" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><select style="width:225px;" name="cinsiyet"><option>Bay</option><option>Bayan</option></select></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Adınız Soyadınız</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="isim" name="adisoyadi" class="validate[required]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Telefon Numaranız</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="telefon" name="telefon" class="validate[required,custom[phone]]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">E-Mail Adresiniz</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="email" name="email" class="validate[required,custom[email]]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Talepleriniz</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><textarea name="talep" style="width:400px; resize:none; height:100px; font-family:arial; background:#fefefe; border-radius:5px; border:1px solid #ccc;" cols="45" rows="5"></textarea></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Giriş Tarihi</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="startdate" name="startdate" class="date-pick validate[required]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Çıkış Tarihi</div><div class="sol ubuntu" style="font-size:13px; margin:5px 0 0 0"><span class="sol" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><input type="text" style="width:250px; height:25px; background:#fefefe; border-radius:5px; border:1px solid #ccc;" id="enddate" name="enddate" class="date-pick validate[required]" /></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Oda Tipi</div><div class="sol" style="font-size:13px; margin:5px 0 0 0"><span class="sol ubuntu" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><select style="width:225px;" name="odatipi"><option>Oda Tipi Seçiniz</option>
<? $selectoda=mysql_query("select * from otel_oda where otel_id='$indexotellerveri[otel_id]' order by otel_oda_id asc"); 
while($selectodaveri = mysql_fetch_array($selectoda)) { 
$seletodalar=mysql_query("select * from odatipleri where oda_id='$selectodaveri[oda_id]'");
$seletodalarveri = mysql_fetch_array($seletodalar);
?><option><? echo $seletodalarveri[oda_adi_tr]; ?></option><? } ?></select></span></div>
			<div class="sol temizle ubuntu" style="font-size:13px; margin:15px 0 0 10px; width:250px;">Oda Sayısı</div><div class="sol" style="font-size:13px; margin:5px 0 0 0"><span class="sol ubuntu" style="margin-right:5px; margin-top:10px">:</span> <span style="display:block; margin-top:2px;" class="sol"><select style="width:225px;" name="odasayisi"><option>1 Oda</option><option>2 Oda</option><option>3 Oda</option><option>4 Oda</option><option>5 Oda</option></select></span></div>
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
$galeri=mysql_query("select * from otel_galeri_resim where otel_id='$indexotellerveri[otel_id]' order by galeri_resim_id asc"); 
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
