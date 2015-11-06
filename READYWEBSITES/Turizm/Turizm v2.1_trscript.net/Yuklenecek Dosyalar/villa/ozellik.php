			<div class="sol temizle fiyatlandirma ubuntu" style="margin-bottom:5px">Genel Bilgi</div>
			<table style="border:0px;" width="100%"><tr><td><? echo $indexotellerveri[villa_aciklama_tr]; ?></td></tr></table>
			<div class="sol temizle" style="height:1px; background:#ccc; width:770px; margin:5px 0"></div>
			<div class="sol temizle fiyatlandirma ubuntu" style="margin-bottom:5px">Fiyatlara Dahil Hizmetler</div>
			<table style="border:0px;" width="100%"><tr><td><? echo $indexotellerveri[villa_fiyatdahil_tr]; ?></td></tr></table>
			<div class="sol temizle" style="height:1px; background:#ccc; width:770px; margin:5px 0"></div>
			<div class="sol temizle fiyatlandirma ubuntu" style="margin-bottom:5px">Fiyatlara Dahil Olmayan Hizmetler</div>
			<table style="border:0px;" width="100%"><tr><td><? echo $indexotellerveri[villa_fiyatdahildegil_tr]; ?></td></tr></table>
			<div class="sol temizle" style="height:1px; background:#ccc; width:770px; margin:5px 0"></div>
			<div class="sol temizle fiyatlandirma ubuntu">Tesis Özellikleri</div>
			<div class="sol temizle fontkalin">
<div class="sol iconlar">
<ul class="ul"><?
$otel1=$indexotellerveri['villa_ozellikleri'];

function etiketsistemi($icerik){
foreach (str_word_count($icerik,1,'ýÝüÜöÖðÐþÞçÇ1234567890/ ') as $etiketler ){
?>
<li class="li"><? $ozellikler=mysql_query("select * from villa_ozellik where ozellik_id='$etiketler'");
$ozelliklerveri = mysql_fetch_array($ozellikler); echo $ozelliklerveri[ozellik_adi_tr]; ?></li>
<?
}
}
$icerik = $otel1;
etiketsistemi($icerik);
?>
</ul>
</div>
			</div>