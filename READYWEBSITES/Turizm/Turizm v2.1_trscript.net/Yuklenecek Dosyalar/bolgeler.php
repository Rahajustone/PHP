<? include('inc/ayar.php'); ?>
<?
include('inc/database.php');
$ay=date(m);
if($ay==01) { $tay='1';}
elseif($ay==02) { $tay='2';}
elseif($ay==03) { $tay='3';}
elseif($ay==04) { $tay='4';}
elseif($ay==05) { $tay='5';}
elseif($ay==06) { $tay='6';}
elseif($ay==07) { $tay='7';}
elseif($ay==08) { $tay='8';}
elseif($ay==09) { $tay='9';}
else { $tay=$ay; }
?>
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
$bolge_sef=$_GET[bolge_sef];
$ilce_sef=str_replace('/','',$bolge_sef);
$bolge=mysql_query("select * from ilceler where ilce_sef='$ilce_sef'");
$bolgeveri = mysql_fetch_array($bolge);

$indexoteller=mysql_query("select * from oteller where otel_bolge_id='$bolgeveri[ilce_id]'");
$sayi=1;
while($indexotellerveri = mysql_fetch_array($indexoteller)) {
if($sayi%2) {
$css = "otellistesi";
} else {
$css = "otellistesi2";
}
$resimotel="oteller/".$indexotellerveri[otel_resim];
$indexbolge=mysql_query("select * from ilceler where ilce_id='$indexotellerveri[otel_bolge_id]'");
$indexbolgeveri = mysql_fetch_array($indexbolge);
$indexil=mysql_query("select * from iller where il_id='$indexbolgeveri[il_id]'");
$indexilveri = mysql_fetch_array($indexil);
$indexkonaklama=mysql_query("select * from konaklama where konaklama_id='$indexotellerveri[konaklama_id]'");
$indexkonaklamaveri = mysql_fetch_array($indexkonaklama);
$indexerken=mysql_query("select * from erkenrezervasyon where otel_id='$indexotellerveri[otel_id]'");
$indexerkenveri = mysql_fetch_array($indexerken);
$indexfirsat=mysql_query("select * from firsatotelleri where otel_id='$indexotellerveri[otel_id]'");
$indexfirsatveri = mysql_fetch_array($indexfirsat);
$indexfiyat=mysql_query("select * from otel_fiyat where tay>='$tay' and otel_id='$indexotellerveri[otel_id]'");
$indexfiyatveri = mysql_fetch_array($indexfiyat);
?>
					<div class="sol <? echo $css; ?>">
						<div class="sol otellistesibaslik">
							<div class="sol listeotelbaslik"><a href="<? echo $siteurl; ?>/<? echo $indexbolgeveri[ilce_sef]."/".$indexotellerveri[otel_sef]; ?>"><? echo $indexotellerveri[oteladi_tr]; ?></a></div><div class="sol listeotelyildiz"><? if($indexotellerveri[otel_yildiz]==0){ echo "<span class='fontkalin' style='color:white'>Apart Otel</span>"; } else { $yildiz=1; while($yildiz<=$indexotellerveri[otel_yildiz]) { ?><img src="<? echo $siteurl; ?>/tema/sari_yildiz.png" alt="" /><? $yildiz++; } } ?></div>
						</div>
						<div class="sol otellisteaciklama">
							<div class="sol resim"><img src="<? echo $siteurl; ?>/<? echo $resimotel; ?>" alt="" title="" /></div>
							<div class="sol baslik fontkalin"><? echo $indexilveri[il_adi]; ?> / <? echo $indexbolgeveri[ilce_adi_tr]; ?></div>
							<div class="sol konaklama fontkalin"><? echo $indexkonaklamaveri[konaklama_adi_tr]; ?></div>
							<div class="sol erken fontkalin"><? if(!empty($indexerkenveri[erken_id]))  { ?>ERKEN REZERVASYON<? } if(empty($indexerkenveri[erken_id]) and !empty($indexfirsatveri[firsat_id]))  { ?>FIRSAT OTELİ<? } ?></div>
							<div class="sol fiyat"><? if(!empty($indexfiyatveri[fiyat_id])){ if(empty($indexotellerveri[otel_indirim]) or ($indexotellerveri[otel_indirim]==0)) { echo $indexfiyatveri[ucret].".00 TL"; } else { $yuzde3="1.".$indexotellerveri[otel_indirim]; $indirim3=$indexfiyatveri[ucret]/$yuzde3; echo ceil($indirim3).".00 TL <span style='text-decoration:line-through; color:#666; font-size:14px'>".$indexfiyatveri[ucret].".00 TL</span>"; } } ?></div>
							<div class="sol detaylibilgi fontkalin"><a href="<? echo $siteurl; ?>/<? echo $indexbolgeveri[ilce_sef]."/".$indexotellerveri[otel_sef]; ?>">Detaylı Bilgi</a></div>
							<div class="sol rezervasyon fontkalin"><a href="<? echo $siteurl; ?>/<? echo $indexbolgeveri[ilce_sef]."/".$indexotellerveri[otel_sef]; ?>#rezervasyon-tab">Online Rezervasyon</a></div>
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
