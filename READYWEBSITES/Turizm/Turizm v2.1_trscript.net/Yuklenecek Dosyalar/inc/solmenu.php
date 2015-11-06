            	<div class="sol solbaslik fontkalin">Otel Tatil Bölgeleri</div>
                <div class="sol solmenu">
<?
$solbolge=mysql_query("select * from ilceler order by ilce_adi_tr asc");
$sayi=1;
while($solbolgeveri = mysql_fetch_array($solbolge)) {
if($sayi%2) {
$renk = "solmenu1";
} else {
$renk = "solmenu2";
}
?>
                	<div class="sol <? echo $renk; ?> fontkalin"><a href="<? echo $siteurl; ?>/<? echo $solbolgeveri[ilce_sef]; ?>/"><? echo $solbolgeveri[ilce_adi_tr]; ?></a></div>
<? $sayi++; } ?>
                </div>
                <div class="sol solmenualt"></div>
            	<div class="sol solbaslik fontkalin">Villa Tatil Bölgeleri</div>
                <div class="sol solmenu">
<?
$villasolbolge=mysql_query("select * from villailceler order by ilce_adi_tr asc");
$sayi=1;
while($villasolbolgeveri = mysql_fetch_array($villasolbolge)) {
if($sayi%2) {
$renk = "solmenu1";
} else {
$renk = "solmenu2";
}
?>
                	<div class="sol <? echo $renk; ?> fontkalin"><a href="<? echo $siteurl; ?>/villalar/<? echo $villasolbolgeveri[ilce_sef]; ?>/"><? echo $villasolbolgeveri[ilce_adi_tr]; ?></a></div>
<? $sayi++; } ?>
                </div>
                <div class="sol solmenualt"></div>
            	<div class="sol solbaslik fontkalin">En Ucuz Oteller</div>
                <div class="sol solmenu" style="background:#f5f5f5; padding-top:5px;">
<?
$ucuz_fiyat=mysql_query("select * from otel_fiyat where tay>='$tay' group by otel_id limit 5");
while($ucuz_fiyatveri = mysql_fetch_array($ucuz_fiyat)){

$otel_ucuz=mysql_query("select * from oteller where otel_id='$ucuz_fiyatveri[otel_id]'");
$otel_ucuzveri = mysql_fetch_array($otel_ucuz);
$ucuz_bolge=mysql_query("select * from ilceler where ilce_id='$otel_ucuzveri[otel_bolge_id]'");
$ucuz_bolgeveri = mysql_fetch_array($ucuz_bolge);
$ozel_otelturu=mysql_query("select * from konaklama where konaklama_id='$otel_ucuzveri[konaklama_id]'");
$ozel_otelturuveri = mysql_fetch_array($ozel_otelturu);
$resimucuz="oteller/".$otel_ucuzveri[otel_resim];
?>
				<div class="sol ucuz">
					<div class="sol resim">
						<a href="<? echo $siteurl; ?>/<? echo $ucuz_bolgeveri[ilce_sef]."/".$otel_ucuzveri[otel_sef]; ?>"><img src="<? echo $siteurl; ?>/<? echo $resimucuz; ?>" alt="" title="<? echo $otel_ucuzveri[oteladi_tr]; ?>" /></a>
					</div>
					<div class="sol isim fontkalin"><a href="<? echo $siteurl; ?>/<? echo $ucuz_bolgeveri[ilce_sef]."/".$otel_ucuzveri[otel_sef]; ?>"><? echo $otel_ucuzveri[oteladi_tr]; ?></a></div>
					<div class="sol bolge"><? echo $ucuz_bolgeveri[ilce_adi_tr]; ?></div>
					<div class="sol konaklama"><? echo $ozel_otelturuveri[konaklama_adi_tr]; ?></div>
					<div class="sol fiyat fontkalin"><? if(!empty($ucuz_fiyatveri[fiyat_id])){ if(empty($otel_ucuzveri[otel_indirim]) and ($otel_ucuzveri[otel_indirim]==0)) { echo $ucuz_fiyatveri[ucret].".00 TL"; } else { $yuzde2="1.".$otel_ucuzveri[otel_indirim]; $indirim2=$ucuz_fiyatveri[ucret]/$yuzde2; echo  "<span style='text-decoration:line-through; color:#cc0000; font-weight:100;'>".$ucuz_fiyatveri[ucret].".00 TL</span> ".ceil($indirim2).".00 TL"; } } ?></div>
				</div>
<? } ?>
                </div>
                <div class="sol solmenualt"></div>
