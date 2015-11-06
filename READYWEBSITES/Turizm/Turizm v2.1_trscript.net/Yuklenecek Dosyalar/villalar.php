<? include('inc/ayar.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<? include('inc/jsvecss.php'); ?>
<? include('inc/title.php'); ?>
</head>

<body>
<div id="pixel">
	<div id="genel">
    	<div class="sol" id="ustcizgi"></div>
<? include('inc/ustmenuler.php'); ?>

        <div class="sol ortakdiv">
        	<div class="sol" id="solalan">
<? include('inc/solmenu.php'); ?>
            </div>
        	<div class="sol" id="ortaalan">

				<div class="sol temizle">
<?
$indexoteller=mysql_query("select * from villalar order by villa_id desc");
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
				</div>
            </div>
        </div>
		<div class="temizle sol" id="foother"><? include('inc/foother.php'); ?></div>
    </div>
</div>
</body>
</html>
