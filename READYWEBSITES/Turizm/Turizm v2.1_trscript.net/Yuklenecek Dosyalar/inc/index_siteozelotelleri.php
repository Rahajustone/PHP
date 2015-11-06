				<div class="sol" id="yesil">
            		<div class="sol yesilbaslik">Size Özel Oteller</div>
<? 
$ozel=mysql_query("select * from ozeloteller order by ozel_id desc limit 3");
while($ozel_otelleri = mysql_fetch_array($ozel)) {
$otel_ozel=mysql_query("select * from oteller where otel_id='$ozel_otelleri[otel_id]'");
$otel_ozelveri = mysql_fetch_array($otel_ozel);
$resimozel="oteller/".$otel_ozelveri[otel_resim];
$ozel_bolge=mysql_query("select * from ilceler where ilce_id='$otel_ozelveri[otel_bolge_id]'");
$ozel_bolgeveri = mysql_fetch_array($ozel_bolge);
$ozel_otelturu=mysql_query("select * from konaklama where konaklama_id='$otel_ozelveri[konaklama_id]'");
$ozel_otelturuveri = mysql_fetch_array($ozel_otelturu);
$ozel_fiyat=mysql_query("select * from otel_fiyat where tay>='$tay' and otel_id='$otel_ozelveri[otel_id]'");
$ozel_fiyatveri = mysql_fetch_array($ozel_fiyat);
?>
                    <div class="sol otel">
                    	<div class="sol yesilotelresim"><a href="<? echo $ozel_bolgeveri[ilce_sef]."/".$otel_ozelveri[otel_sef]; ?>"><img src="<? echo $siteurl; ?>/<? echo $resimfirsat; ?>" alt="" title="<? echo $otel_ozelveri[oteladi_tr]; ?>" /></a></div>
                        <div class="sol yesilyazi">
                        	<p class="baslik"><a href="<? echo $ozel_bolgeveri[ilce_sef]."/".$otel_ozelveri[otel_sef]; ?>" style="color:#333"><? echo $otel_ozelveri[oteladi_tr]; ?></a></p>
                            <p style="margin:0 0 2px 0; color:#666;"><? echo $ozel_bolgeveri[ilce_adi_tr]; ?></p>
                            <div class="sol temizle"><? if($otel_ozelveri[otel_yildiz]==0){ echo "Apart Otel"; } else { $yildiz=1; while($yildiz<=$otel_ozelveri[otel_yildiz]) { ?><img src="<? echo $siteurl; ?>/tema/yesil_yildiz.png" alt="" /><? $yildiz++; } } ?></div>
                            <div class="sol temizle erken"><? echo $ozel_otelturuveri[konaklama_adi_tr]; ?><br /><? if(!empty($ozel_fiyatveri[fiyat_id])){ if(empty($otel_ozelveri[otel_indirim]) or ($otel_ozelveri[otel_indirim]==0)) { echo $ozel_fiyatveri[ucret].".00 TL"; } else { $yuzde4="1.".$otel_ozelveri[otel_indirim]; $indirim4=$ozel_fiyatveri[ucret]/$yuzde4; echo ceil($indirim4).".00 TL <span style='text-decoration:line-through; color:#333; font-size:10px'>".$ozel_fiyatveri[ucret].".00 TL</span>"; } } ?></div>
                            <div class="sol indirim fontkalin"><? if(!empty($otel_ozelveri[otel_indirim]) and ($otel_ozelveri[otel_indirim]!='0')){ echo "%".$otel_ozelveri[otel_indirim]." Ýndirim"; } ?></div>
                        </div>
                    </div>
<? } ?>
                </div>