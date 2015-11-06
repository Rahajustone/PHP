                <div class="sol" id="mavi" style="margin-right:5px;">
            		<div class="sol mavibaslik">Erken Rezervasyonlar</div>
<? 
$erken=mysql_query("select * from erkenrezervasyon order by erken_id desc limit 3");
while($erken_otelleri = mysql_fetch_array($erken)) {
$otel_erken=mysql_query("select * from oteller where otel_id='$erken_otelleri[otel_id]'");
$otel_erkenveri = mysql_fetch_array($otel_erken);
$resimerken="oteller/".$otel_erkenveri[otel_resim];
$erken_bolge=mysql_query("select * from ilceler where ilce_id='$otel_erkenveri[otel_bolge_id]'");
$erken_bolgeveri = mysql_fetch_array($erken_bolge);
$erken_otelturu=mysql_query("select * from konaklama where konaklama_id='$otel_erkenveri[konaklama_id]'");
$erken_otelturuveri = mysql_fetch_array($erken_otelturu);
$erken_fiyat=mysql_query("select * from otel_fiyat where tay>='$tay' and otel_id='$otel_erkenveri[otel_id]'");
$erken_fiyatveri = mysql_fetch_array($erken_fiyat);
?>
                    <div class="sol otel">
                    	<div class="sol maviotelresim"><a href="<? echo $erken_bolgeveri[ilce_sef]."/".$otel_erkenveri[otel_sef]; ?>"><img src="<? echo $siteurl; ?>/<? echo $resimerken; ?>" alt="" title="<? echo $otel_erkenveri[oteladi_tr]; ?>" /></a></div>
                        <div class="sol maviyazi">
                        	<p class="baslik"><a href="<? echo $erken_bolgeveri[ilce_sef]."/".$otel_erkenveri[otel_sef]; ?>" style="color:#333;"><? echo $otel_erkenveri[oteladi_tr]; ?></a></p>
                            <p style="margin:0 0 2px 0; color:#666;"><? echo $erken_bolgeveri[ilce_adi_tr]; ?></p>
                            <div class="sol temizle"><? if($otel_erkenveri[otel_yildiz]==0){ echo "Apart Otel"; } else { $yildiz=1; while($yildiz<=$otel_erkenveri[otel_yildiz]) { ?><img src="<? echo $siteurl; ?>/tema/mavi_yildiz.png" alt="" /><? $yildiz++; } } ?></div>
                            <div class="sol temizle erken"><? echo $erken_otelturuveri[konaklama_adi_tr]; ?><br /><? if(!empty($erken_fiyatveri[fiyat_id])){ if(empty($otel_erkenveri[otel_indirim]) or ($otel_erkenveri[otel_indirim]==0)) { echo $erken_fiyatveri[ucret].".00 TL"; } else { $yuzde="1.".$otel_erkenveri[otel_indirim]; $indirim=$erken_fiyatveri[ucret]/$yuzde; echo ceil($indirim).".00 TL <span style='text-decoration:line-through; color:#333; font-size:10px'>".$erken_fiyatveri[ucret].".00 TL</span>"; } } ?></div>
                            <div class="sol indirim fontkalin"><? if(!empty($otel_erkenveri[otel_indirim]) and ($otel_erkenveri[otel_indirim]!=0)){ echo "%".$otel_erkenveri[otel_indirim]." Ýndirim"; } ?></div>
                        </div>
                    </div>
<? } ?>
                </div>
