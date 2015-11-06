			<div class="sol fiyatlandirma">
				<div class="sol odatipi ubuntu" style="width:650px">Tarih Aralýðý</div><div class="sol kisi ubuntu">Günlük<br />Sezon Ücreti</div>
			</div>
<?
$bugun=date("d");
$tarih=mysql_query("select * from villa_fiyat where villa_id='$indexotellerveri[villa_id]' order by gtarih asc");
while($tarihveri = mysql_fetch_array($tarih)) {
?>
			<div class="sol fiyat" style="margin:0; padding-top:5px; padding-bottom:0px;">
				<div class="sol odatipi" style="width:650px; margin:0; padding-top:5px; padding-bottom:0px;"><? echo $tarihveri[tarih1]; ?> - <? echo $tarihveri[tarih2]; ?></div>
				<div class="sol kisi" style="margin:0; padding-top:5px; padding-bottom:0px;"><? echo $tarihveri[ucret]; ?>.00 TL</div>
			</div>
<? } ?>
