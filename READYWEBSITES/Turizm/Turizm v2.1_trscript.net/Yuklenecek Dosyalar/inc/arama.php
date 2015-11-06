<script type="text/javascript" src="<? echo $siteurl; ?>/js/jquery.tabify.source.js"></script>
                <div class="sol" id="bg_arama">
		<ul id="arama" class="arama">
			<li class="active aramabaslik ubuntu"><a href="#otel">Otel Ara</a></li>
			<li class="aramabaslik ubuntu"><a href="#villa">Villa Ara</a></li>
		</ul>
		<div id="otel" class="temizle aramaalani">
<form method="post" action="otel-ara.html">
					<div class="temizle sol" style="margin:10px 13px 5px 13px">
						<select style="width:225px" name="bolge">
<?
$bolgeara=mysql_query("select * from ilceler order by ilce_adi_tr asc");
while($bolgearaveri = mysql_fetch_array($bolgeara)) {
?>
							<option value="<? echo $bolgearaveri[ilce_id]; ?>"><? echo $bolgearaveri[ilce_adi_tr]; ?></option>
<? } ?>
						</select>
					</div>
					<div class="temizle sol" style="margin:10px 13px 5px 13px">
						<select style="width:225px" name="otel_tipi">
<?
$konaklamaara=mysql_query("select * from konaklama order by konaklama_adi_tr asc");
while($konaklamaaraveri = mysql_fetch_array($konaklamaara)) {
?>
							<option value="<? echo $konaklamaaraveri[konaklama_id]; ?>"><? echo $konaklamaaraveri[konaklama_adi_tr]; ?></option>
<? } ?>
						</select>
					</div>
					<div class="temizle sol" style="margin:10px 13px 5px 13px">
						<select style="width:225px" name="yildiz">
							<option value="0">Apart Otel</option>
							<option value="2">2 Yýldýz</option>
							<option value="3">3 Yýldýz</option>
							<option value="4">4 Yýldýz</option>
							<option value="5">5 Yýldýz</option>
							<option value="6">6 Yýldýz</option>
							<option value="7">7 Yýldýz</option>
						</select>
					</div>
					<div class="temizle sol" style="margin:10px 13px 5px 13px">
						<select style="width:225px" name="otel_kampanya">	
							<option value="0">Tüm Oteller</option>
							<option value="1">Erken Rezervasyon Otelleri</option>
							<option value="2">Kaplýca &amp; Termal Otelleri</option>
							<option value="3">Fýrsat Otelleri</option>
							<option value="4">Bayram Otelleri</option>
						</select>
					</div>
					<div class="temizle sol" style="margin:10px 13px 5px 13px">
						<input type="submit" style="background:url(tema/buton_ara.jpg); width:252px; height:34px; border:0px;" value=" " />
					</div>
</form>
		</div>
		<div id="villa" class="temizle aramaalani">
<form method="post" action="villa-ara.html">
					<div class="temizle sol" style="margin:10px 13px 5px 13px">
						<select style="width:225px" name="bolge">
<?
$bolgeara=mysql_query("select * from villailceler order by ilce_adi_tr asc");
while($bolgearaveri = mysql_fetch_array($bolgeara)) {
?>
							<option value="<? echo $bolgearaveri[ilce_id]; ?>"><? echo $bolgearaveri[ilce_adi_tr]; ?></option>
<? } ?>
						</select>
					</div>
					<div class="temizle sol" style="margin:10px 13px 5px 13px">
						<select style="width:225px" name="otel_tipi">
<?
$konaklamaara=mysql_query("select * from konaklama order by konaklama_adi_tr asc");
while($konaklamaaraveri = mysql_fetch_array($konaklamaara)) {
?>
							<option value="<? echo $konaklamaaraveri[konaklama_id]; ?>"><? echo $konaklamaaraveri[konaklama_adi_tr]; ?></option>
<? } ?>
						</select>
					</div>
					<div class="temizle sol" style="margin:10px 13px 5px 13px">
						<select style="width:225px" name="yildiz">
							<option value="0">Apart Otel</option>
							<option value="2">2 Yýldýz</option>
							<option value="3">3 Yýldýz</option>
							<option value="4">4 Yýldýz</option>
							<option value="5">5 Yýldýz</option>
							<option value="6">6 Yýldýz</option>
							<option value="7">7 Yýldýz</option>
						</select>
					</div>
					<div class="temizle sol" style="margin:10px 13px 5px 13px">
						<select style="width:225px" name="otel_kampanya">	
							<option value="0">Tüm Oteller</option>
							<option value="1">Erken Rezervasyon Otelleri</option>
							<option value="2">Kaplýca &amp; Termal Otelleri</option>
							<option value="3">Fýrsat Otelleri</option>
							<option value="4">Bayram Otelleri</option>
						</select>
					</div>
					<div class="temizle sol" style="margin:10px 13px 5px 13px">
						<input type="submit" style="background:url(tema/buton_ara.jpg); width:252px; height:34px; border:0px;" value=" " />
					</div>
</form>
		</div>
				</div>