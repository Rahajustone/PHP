<?
$ayar=mysql_query("select * from otel_oda where otel_id='$indexotellerveri[otel_id]' order by otel_oda_id asc");
while($ayarveri = mysql_fetch_array($ayar)) {
$kontrol=$ayarveri[otel_oda_id];
if($ayarveri[otel_yildiz]=='0'){ }
else {
$otelismi=mysql_query("select * from odatipleri where oda_id='$ayarveri[oda_id]'");
$otelismiveri = mysql_fetch_array($otelismi);
?>   
			<div class="sol fiyatlandirma">
				<div class="sol odatipi ubuntu"><? echo $otelismiveri[oda_adi_tr]; ?></div><div class="sol konsept ubuntu">Konsept</div><div class="sol kisi ubuntu">2 Kiþi<br />Kiþi Baþý</div><div class="sol kisi ubuntu">1 Kiþi<br />Kiþi Baþý</div><div class="sol kisi ubuntu">3 Kiþi<br />Ýlave Yatak</div><div class="sol kisi ubuntu"><? echo $indexotellerveri[cocuk1]; ?><br />1.Çoçuk</div><div class="sol kisi ubuntu"><? echo $indexotellerveri[cocuk2]; ?><br />2.Çoçuk</div>
			</div>
<?
$bugun=date("d");
$tarih=mysql_query("select * from otel_fiyat where otel_oda_id='$ayarveri[otel_oda_id]' order by tarih1 desc");
while($tarihveri = mysql_fetch_array($tarih)) {
$carpan=mysql_query("select * from carpanlar where carpan_id='$ayarveri[carpan_id]'");
$carpanveri = mysql_fetch_array($carpan);
?>
			<div class="sol fiyat">
				<div class="sol odatipi"><? echo $tarihveri[tarih1]; ?> - <? echo $tarihveri[tarih2]; ?></div><div class="sol konsept"><? echo $indexkonaklamaveri[konaklama_adi_tr]; ?></div>
				<div class="sol kisi"><? if(!empty($indexfiyatveri[fiyat_id])){ 
											if(empty($indexotellerveri[otel_indirim]) or ($indexotellerveri[otel_indirim]==0)) { 
												$kisi2=$tarihveri[ucret] * $carpanveri[kisi2];
												echo "<span style='display:block; margin-top:6px'>".ceil($kisi2).".00 TL</span>";
											} else { 
												$yuzde3="1.".$indexotellerveri[otel_indirim]; 
												$indirim3=$tarihveri[ucret]/$yuzde3; 
												$kisi2=$indirim3 * $carpanveri[kisi2];
												$ucret2=$tarihveri[ucret] * $carpanveri[kisi2];
												echo "<span style='text-decoration:line-through; color:#cc0000;'>".ceil($ucret2).".00 TL</span><br/>".ceil($kisi2).".00 TL"; 
											} 
										} ?>
				</div>
				<div class="sol kisi"><? if(!empty($indexfiyatveri[fiyat_id])){ 
											if(empty($indexotellerveri[otel_indirim]) or ($indexotellerveri[otel_indirim]==0)) { 
												$kisi1=$tarihveri[ucret] * $carpanveri[kisi1];
												echo "<span style='display:block; margin-top:6px'>".ceil($kisi1).".00 TL</span>";
											} else { 
												$yuzde3="1.".$indexotellerveri[otel_indirim]; 
												$indirim3=$tarihveri[ucret]/$yuzde3; 
												$kisi1=$indirim3 * $carpanveri[kisi1];
												$ucret1=$tarihveri[ucret] * $carpanveri[kisi1];
												echo "<span style='text-decoration:line-through; color:#cc0000;'>".ceil($ucret1).".00 TL</span><br/>".ceil($kisi1).".00 TL"; 
											} 
										} ?>
				</div>
				<div class="sol kisi"><? if(!empty($indexfiyatveri[fiyat_id])){ 
											if(empty($indexotellerveri[otel_indirim]) or ($indexotellerveri[otel_indirim]==0)) { 
												$kisi3=$tarihveri[ucret] * $carpanveri[kisi3];
												echo "<span style='display:block; margin-top:6px'>".ceil($kisi3).".00 TL</span>";
											} else { 
												$yuzde3="1.".$indexotellerveri[otel_indirim]; 
												$indirim3=$tarihveri[ucret]/$yuzde3; 
												$kisi3=$indirim3 * $carpanveri[kisi3];
												$ucret3=$tarihveri[ucret] * $carpanveri[kisi3];
												echo "<span style='text-decoration:line-through; color:#cc0000;'>".ceil($ucret3).".00 TL</span><br/>".ceil($kisi3).".00 TL"; 
											} 
										} ?>
				</div>
				<div class="sol kisi"><? if((empty($carpanveri[kisi4])) or ($carpanveri[kisi4]=='-')){ echo "<span style='display:block; margin-top:5px'>Ücretsiz</span>"; } else {
											if(!empty($indexfiyatveri[fiyat_id])){ 
											if(empty($indexotellerveri[otel_indirim]) or ($indexotellerveri[otel_indirim]==0)) { 
												$kisi4=$tarihveri[ucret] * $carpanveri[kisi4];
												echo "<span style='display:block; margin-top:5px'>".ceil($kisi4).".00 TL</span>";
											} else { 
												$yuzde4="1.".$indexotellerveri[otel_indirim]; 
												$indirim4=$tarihveri[ucret]/$yuzde4; 
												$kisi4=$indirim4 * $carpanveri[kisi4];
												$ucret4=$tarihveri[ucret] * $carpanveri[kisi4];
												echo "<span style='text-decoration:line-through; color:#cc0000;'>".ceil($ucret4).".00 TL</span><br/>".ceil($kisi4).".00 TL"; 
											} 
										} 
										} ?>
				</div>
				<div class="sol kisi"><? if(empty($indexotellerveri[cocuk2]) or ($indexotellerveri[cocuk2]=='-')){ echo "-"; } else { if((empty($carpanveri[kisi5])) or ($carpanveri[kisi5]=='-')){ echo "Ücretsiz"; } else {
											if(!empty($indexfiyatveri[fiyat_id])){ 
											if(empty($indexotellerveri[otel_indirim]) or ($indexotellerveri[otel_indirim]==0)) { 
												$kisi5=$tarihveri[ucret] * $carpanveri[kisi5];
												echo "<span style='display:block; margin-top:5px;'>".ceil($kisi5).".00 TL</span>";
											} else { 
												$yuzde5="1.".$indexotellerveri[otel_indirim]; 
												$indirim5=$tarihveri[ucret]/$yuzde5; 
												$kisi5=$indirim5 * $carpanveri[kisi5];
												$ucret5=$tarihveri[ucret] * $carpanveri[kisi5];
												echo "<span style='text-decoration:line-through; color:#cc0000;'>".ceil($ucret5).".00 TL</span><br/>".ceil($kisi5).".00 TL"; 
											} 
										} 
										} } ?>

				</div>
			</div>
<? } ?>
<? } } ?>