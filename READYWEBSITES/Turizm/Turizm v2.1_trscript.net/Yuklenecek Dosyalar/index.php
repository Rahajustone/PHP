<? include('inc/ayar.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<? include('inc/jsvecss.php'); ?>
<link rel="stylesheet" type="text/css" href="<? echo $siteurl; ?>/css/style.css" />
<script type="text/javascript" src="<? echo $siteurl; ?>/js/wowslider.js"></script>
<? include('inc/title.php'); ?>
</head>

<body>
<div id="pixel">
	<div id="genel">
    	<div class="sol" id="ustcizgi"></div>
<? include('inc/ustmenuler.php'); ?>
        <div class="sol ortakdiv">
            <div class="sol" id="slideralani"><? include('inc/slider.php'); ?></div>
            <div class="sol" id="aramaalani">
<? include('inc/arama.php'); ?>
            </div>
        </div>
        <div class="sol ortakdiv">
        	<div class="sol" id="solalan">
<? include('inc/solmenu.php'); ?>
            </div>
        	<div class="sol" id="ortaalan">
<? include('inc/index_firsatotelleri.php'); ?>
<? include('inc/index_erkenrezervasyonotelleri.php'); ?>
<? include('inc/index_siteozelotelleri.php'); ?>
				<div class="sol temizle" style="height:1px; background:#ccc; width:790px;"></div>
				<div class="sol temizle" style="margin-top:5px">


<?
$indexoteller=mysql_query("select * from villalar order by villa_id desc limit 4");
$sayi=1;
while($indexotellerveri = mysql_fetch_array($indexoteller)) {
if($sayi%2) {
$css = "otellistesi";
} else {
$css = "otellistesi2";
}
$resimotel="oteller/".$indexotellerveri[villa_resim];
$villabolge=mysql_query("select * from villailceler where ilce_id='$indexotellerveri[villa_bolge_id]'");
$villabolgeveri = mysql_fetch_array($villabolge);
$indexil=mysql_query("select * from villailler where il_id='$villabolgeveri[il_id]'");
$indexilveri = mysql_fetch_array($indexil);
?>

					<div class="sol <? echo $css; ?>" style="margin:0; width:790px" id="rezervasyon">
						<div class="sol aracuzunbaslik ubuntu">
							<div class="sol"><a href="<? echo $siteurl; ?>/villalar/<? echo $villabolgeveri[ilce_sef]."/".$indexotellerveri[villa_sef]; ?>" style="color:#fff"><? echo $indexotellerveri[villaadi_tr]; ?></a></div><div class="sag listeotelyildiz" style="width:300px"><span class='fontkalin' style='color:white'><? echo $villabolgeveri[ilce_adi_tr]; ?> / <? echo $indexilveri[il_adi]; ?></span></div>
						</div>
						<div class="sol tablo2">
							<div class="sol">
							<div class="sol resim2"><a href="<? echo $siteurl; ?>/villalar/<? echo $villabolgeveri[ilce_sef]."/".$indexotellerveri[villa_sef]; ?>" style="color:#fff"><img src="<? echo $siteurl; ?>/<? echo $resimotel; ?>" alt="" title="" style="border-radius:5px" /></a></div>
							</div>
							<div class="sol" style="width:540px">
								<div class="sol" style="margin:8px 0; width:540px">
									<div class="sol ubuntu" style="width:100px">Kapasite</div><div class="sol ubuntu" style="color:#cc0000; width:60px; margin-right:20px;">: <? echo $indexotellerveri[kapasite]; ?> Kişilik</div>
									<div class="sol ubuntu" style="width:120px">Merkeze Uzaklık</div><div class="sol ubuntu" style="color:#cc0000; width:50px; margin-right:20px;">: <? echo $indexotellerveri[villa_merkez]; ?> </div>
									<div class="sol ubuntu" style="width:120px">Havaaalanı Uzaklık</div><div class="sol ubuntu" style="color:#cc0000; width:50px;">: <? echo $indexotellerveri[villa_havaalani]; ?></div>

									<div class="sol ubuntu" style="width:100px; margin-top:10px">Oda Sayısı</div><div class="sol ubuntu" style="color:#cc0000; width:60px; margin-right:20px; margin-top:10px">: <? echo $indexotellerveri[villa_oda]; ?> Oda </div>
									<div class="sol ubuntu" style="width:120px; margin-top:10px">Denize Uzaklık</div><div class="sol ubuntu" style="color:#cc0000; width:50px; margin-right:20px; margin-top:10px">: <? echo $indexotellerveri[villa_deniz]; ?> </div>
									<div class="sol ubuntu" style="width:120px; margin-top:10px">Market Uzaklık</div><div class="sol ubuntu" style="color:#cc0000; width:50px; margin-top:10px">: <? echo $indexotellerveri[villa_market]; ?> </div>

									<div class="sol ubuntu" style="width:100px; margin-top:10px">Yatak Odası</div><div class="sol ubuntu" style="color:#cc0000; width:60px; margin-right:20px; margin-top:10px">: <? echo $indexotellerveri[villa_yatak]; ?> Oda </div>
									<div class="sol ubuntu" style="width:120px; margin-top:10px">Süpermar. Uzaklık</div><div class="sol ubuntu" style="color:#cc0000; width:50px; margin-right:20px; margin-top:10px">: <? echo $indexotellerveri[villa_supermarket]; ?> </div>
									<div class="sol ubuntu" style="width:120px; margin-top:10px">Restaurant Uzaklık</div><div class="sol ubuntu" style="color:#cc0000; width:50px; margin-top:10px">: <? echo $indexotellerveri[villa_restaurant]; ?> </div>

									<div class="sol ubuntu" style="width:100px; margin-top:10px">Banyo Sayısı</div><div class="sol ubuntu" style="color:#cc0000; width:60px; margin-right:20px; margin-top:10px">: <? echo $indexotellerveri[villa_banyo]; ?> Banyo</div>
								</div>

<?
$villafiyat=mysql_query("select * from villa_fiyat where villa_id='$indexotellerveri[villa_id]' order by gtarih asc");
$villafiyatveri = mysql_fetch_array($villafiyat);
if(!empty($villafiyatveri[ucret])){
?>
								<div class="sol temizle ubuntu" style="font-size:16px; color:#cc0000; margin-top:15px;"><span style="width:190px; color:#000; text-align:right; margin-right:10px;" class="sol">Günlük Ücret</span>
									<span class="sol">: 
										<? echo $villafiyatveri[ucret]; ?>.00 TL
									</span>
								</div>
<? } ?>
								<div class="sag fontkalin" style="width:140px; margin-top:-10px; height:78px">
									<? if($indexotellerveri[villa_ozelhavuz]=='1'){ echo '<div class="sol" style="margin-right:4px; margin-bottom:4px;"><img src="'.$siteurl.'/tema/ozelhavuz.jpg" alt="" /></div>'; } ?>
									<? if($indexotellerveri[villa_denizesifir]=='1'){ echo '<div class="sol" style="margin-right:4px; margin-bottom:4px;"><img src="'.$siteurl.'/tema/denizesifir.jpg" alt="" /></div>'; } ?>
									<? if($indexotellerveri[villa_ortakhavuz]=='1'){ echo '<div class="sol" style="margin-right:4px; margin-bottom:4px;"><img src="'.$siteurl.'/tema/ortakhavuz.jpg" alt="" /></div>'; } ?>
									<? if($indexotellerveri[villa_balayi]=='1'){ echo '<div class="sol" style="margin-right:4px; margin-bottom:4px;"><img src="'.$siteurl.'/tema/balayi.jpg" alt="" /></div>'; } ?>
									<? if($indexotellerveri[villa_evcilhayvan]=='1'){ echo '<div class="sol" style="margin-right:4px; margin-bottom:4px;"><img src="'.$siteurl.'/tema/evcilhayvan.jpg" alt="" /></div>'; } ?>
									<? if($indexotellerveri[villa_luksev]=='1'){ echo '<div class="sol"><img src="'.$siteurl.'/tema/luks.jpg" alt="" /></div>'; } ?>
								</div>
								
								<div class="sol temizle detaylibilgi fontkalin" style="margin-top:-15px"><a href="<? echo $siteurl; ?>/villalar/<? echo $villabolgeveri[ilce_sef]."/".$indexotellerveri[villa_sef]; ?>">Detaylı Bilgi</a></div>
								<div class="sol rezervasyon fontkalin" style="margin-top:-15px"><a href="<? echo $siteurl; ?>/villalar/<? echo $villabolgeveri[ilce_sef]."/".$indexotellerveri[villa_sef]; ?>#rezervasyon-tab">Online Rezervasyon</a></div>
							</div>
						</div>
					</div>
<? $sayi++; } ?>



<?
$indexoteller=mysql_query("select * from oteller order by otel_id desc limit 10");
$sayi=1;
while($indexotellerveri = mysql_fetch_array($indexoteller)) {
if($sayi%2) {
$css = "otellistesi";
} else {
$css = "otellistesi2";
}
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
					<div class="sol <? echo $css; ?>">
						<div class="sol otellistesibaslik">
							<div class="sol listeotelbaslik"><a href="<? echo $indexbolgeveri[ilce_sef]."/".$indexotellerveri[otel_sef]; ?>"><? echo $indexotellerveri[oteladi_tr]; ?></a></div><div class="sol listeotelyildiz"><? if($indexotellerveri[otel_yildiz]==0){ echo "<span class='fontkalin' style='color:white'>Apart Otel</span>"; } else { $yildiz=1; while($yildiz<=$indexotellerveri[otel_yildiz]) { ?><img src="<? echo $siteurl; ?>/tema/sari_yildiz.png" alt="" /><? $yildiz++; } } ?></div>
						</div>
						<div class="sol otellisteaciklama">
							<div class="sol resim"><img src="<? echo $siteurl; ?>/<? echo $resimotel; ?>" alt="" title="" /></div>
							<div class="sol baslik fontkalin"><? echo $indexilveri[il_adi]; ?> / <? echo $indexbolgeveri[ilce_adi_tr]; ?></div>
							<div class="sol konaklama fontkalin"><? echo $indexkonaklamaveri[konaklama_adi_tr]; ?></div>
							<div class="sol erken fontkalin"><? if(!empty($indexerkenveri[erken_id]))  { ?>ERKEN REZERVASYON<? } if(empty($indexerkenveri[erken_id]) and !empty($indexfirsatveri[firsat_id]))  { ?>FIRSAT OTELİ<? } ?></div>
							<div class="sol fiyat"><? if(!empty($indexfiyatveri[fiyat_id])){ if(empty($indexotellerveri[otel_indirim]) or ($indexotellerveri[otel_indirim]==0)) { echo $indexfiyatveri[ucret].".00 TL"; } else { $yuzde3="1.".$indexotellerveri[otel_indirim]; $indirim3=$indexfiyatveri[ucret]/$yuzde3; echo ceil($indirim3).".00 TL <span style='text-decoration:line-through; color:#666; font-size:14px'>".$indexfiyatveri[ucret].".00 TL</span>"; } } ?></div>
							<div class="sol detaylibilgi fontkalin"><a href="<? echo $indexbolgeveri[ilce_sef]."/".$indexotellerveri[otel_sef]; ?>">Detaylı Bilgi</a></div>
							<div class="sol rezervasyon fontkalin"><a href="<? echo $indexbolgeveri[ilce_sef]."/".$indexotellerveri[otel_sef]; ?>#rezervasyon-tab">Online Rezervasyon</a></div>
						</div>
					</div>
<? $sayi++; } ?>


				</div>
            </div>
        </div>
		<div class="temizle sol" id="foother"><? include('inc/foother.php'); ?></div>
    </div>
</div>
</body>
</html>
