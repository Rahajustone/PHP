			<style type="text/css">
			
				.yok{text-decoration:line-through;background:url("../tema/bullet.png") no-repeat scroll left 4px transparent!important;padding:4px 5px 4px 20px;float:left;width:167px}
			
			</style>
			<div class="sol temizle fiyatlandirma ubuntu" style="margin-bottom:5px">Otel Hakkýnda Genel Bilgi</div>
			<table style="border:0px;" width="100%"><tr><td><? echo $indexotellerveri[otel_aciklama_tr]; ?></td></tr></table>
			<div class="sol temizle" style="height:1px; background:#ccc; width:770px; margin:5px 0"></div>
			<div class="sol temizle fiyatlandirma ubuntu" style="margin-bottom:5px">Yemek Konsepti</div>
			<table style="border:0px;" width="100%"><tr><td><? echo $indexotellerveri[otel_yemek_tr]; ?></td></tr></table>
			<div class="sol temizle" style="height:1px; background:#ccc; width:770px; margin:5px 0"></div>
			<div class="sol temizle fiyatlandirma ubuntu">Tesis Özellikleri</div>
			<div class="sol temizle fontkalin">
<div class="sol iconlar">
<ul class="ul"><?
	function etiketsistemi2($icerik2){
		$query = mysql_query("SELECT * FROM otel_ozellik");
		while($row = mysql_fetch_array($query)){
			$class  = "";
			$degisti= 0;
			foreach (str_word_count($icerik2,1,'ýÝüÜöÖðÐþÞçÇ1234567890/ ') as $etiketler2 ){
				
				if($row["ozellik_id"] == (int)$etiketler2 && $degisti == 0){
					$class = "li";
					$degisti = 1;
				}
				
				
			}
			?>
				<li class="<?= $class == "li" ? $class : "yok";?>"><?= $row["ozellik_adi_tr"]?></li>
			<?php
		}
	}
$otel1=$indexotellerveri['otel_ozellikleri'];

function etiketsistemi($icerik){
foreach (str_word_count($icerik,1,'ýÝüÜöÖðÐþÞçÇ1234567890/ ') as $etiketler ){
?>
<li class="li"><? $ozellikler=mysql_query("select * from otel_ozellik where ozellik_id='$etiketler'");
$ozelliklerveri = mysql_fetch_array($ozellikler); echo $ozelliklerveri[ozellik_adi_tr]; ?></li>
<?
}
}
$icerik = $otel1;
etiketsistemi2($icerik);
?>
</ul>
</div>
			</div>
			<div class="sol temizle" style="height:1px; background:#ccc; width:770px; margin:5px 0"></div>

			<div class="sol temizle fiyatlandirma ubuntu">Oda Özellikleri</div>
			<div class="sol temizle fontkalin">
<div class="sol iconlar">
<ul class="ul"><?
$otel2=$indexotellerveri['otel_oda_ozellikleri'];


$icerik2 = $otel2;
etiketsistemi2($icerik2);
?>
</ul>
			</div>
			</div>

			<div class="sol temizle" style="height:1px; background:#ccc; width:770px; margin:5px 0"></div>

			<div class="sol temizle fiyatlandirma ubuntu">Ücretsiz Aktiviteler</div>
			<div class="sol temizle fontkalin">
<div class="sol iconlar">
<ul class="ul"><?
$otel3=$indexotellerveri['otel_ucretsiz_aktiviteler'];


$icerik3 = $otel3;
etiketsistemi2($icerik3);
?>
</ul>
			</div>
			</div>



			<div class="sol temizle" style="height:1px; background:#ccc; width:770px; margin:5px 0"></div>

			<div class="sol temizle fiyatlandirma ubuntu">Ücretli Aktiviteler</div>
			<div class="sol temizle fontkalin">
<div class="sol iconlar">
<ul class="ul"><?
$otel4=$indexotellerveri['otel_ucretli_aktiviteler'];


$icerik4 = $otel4;
etiketsistemi2($icerik4);
?>
</ul>
			</div>
			</div>