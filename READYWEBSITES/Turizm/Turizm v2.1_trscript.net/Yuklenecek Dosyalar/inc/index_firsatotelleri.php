				<div class="sol" id="turuncu" style="margin-right:5px;">
            		<div class="sol turuncubaslik">Fýrsat Otelleri</div>
<? 
$firsat=mysql_query("select * from firsatotelleri order by firsat_id desc limit 3");
while($firsat_otelleri = mysql_fetch_array($firsat)) {
$otel_firsat=mysql_query("select * from oteller where otel_id='$firsat_otelleri[otel_id]'");
$otel_firsatveri = mysql_fetch_array($otel_firsat);
$resimfirsat="oteller/".$otel_firsatveri[otel_resim];
$firsat_bolge=mysql_query("select * from ilceler where ilce_id='$otel_firsatveri[otel_bolge_id]'");
$firsat_bolgeveri = mysql_fetch_array($firsat_bolge);
$firsat_otelturu=mysql_query("select * from konaklama where konaklama_id='$otel_firsatveri[konaklama_id]'");
$firsat_otelturuveri = mysql_fetch_array($firsat_otelturu);
$firsat_fiyat=mysql_query("select * from otel_fiyat where tay>='$tay' and otel_id='$otel_firsatveri[otel_id]'");
$firsat_fiyatveri = mysql_fetch_array($firsat_fiyat);
?>
                    <div class="sol otel">
                    	<div class="sol turuncuotelresim"><a href="<? echo $firsat_bolgeveri[ilce_sef]."/".$otel_firsatveri[otel_sef]; ?>"><img src="<? echo $siteurl; ?>/<? echo $resimfirsat; ?>" alt="" title="<? echo $otel_firsatveri[oteladi_tr]; ?>" /></a></div>
                        <div class="sol turuncuyazi">
                        	<p class="baslik"><a href="<? echo $firsat_bolgeveri[ilce_sef]."/".$otel_firsatveri[otel_sef]; ?>" style="color:#333;"><? echo $otel_firsatveri[oteladi_tr]; ?></a></p>
                            <p style="margin:0 0 2px 0; color:#666;"><? echo $firsat_bolgeveri[ilce_adi_tr]; ?></p>
                            <div class="sol temizle"><? if($otel_firsatveri[otel_yildiz]==0){ echo "Apart Otel"; } else { $yildiz=1; while($yildiz<=$otel_firsatveri[otel_yildiz]) { ?><img src="<? echo $siteurl; ?>/tema/turuncu_yildiz.png" alt="" /><? $yildiz++; } } ?></div>
                            <div class="sol temizle erken"><? echo $firsat_otelturuveri[konaklama_adi_tr]; ?><br /><? if(!empty($firsat_fiyatveri[fiyat_id])){ if(empty($otel_firsatveri[otel_indirim]) or ($otel_firsatveri[otel_indirim]==0)) { echo $firsat_fiyatveri[ucret].".00 TL"; } else { $yuzde="1.".$otel_firsatveri[otel_indirim]; $indirim=$firsat_fiyatveri[ucret]/$yuzde; echo ceil($indirim).".00 TL <span style='text-decoration:line-through; color:#333; font-size:10px'>".$firsat_fiyatveri[ucret].".00 TL</span>"; } } ?></div>
                            <div class="sol indirim fontkalin"><? if(!empty($otel_firsatveri[otel_indirim]) and ($otel_firsatveri[otel_indirim]!=0)){ echo "%".$otel_firsatveri[otel_indirim]." Ýndirim"; } ?></div>
                        </div>
                    </div>
<? } ?>
                </div>