<? 
include('inc/gunler.php');
$say=0;
while($say<=11){

$gun = "01";
$ay = date(m);
$yil = date(Y);

$yeni_tarih = mktime(0,0,0,$ay+$say,$gun,$yil);
$baslangic=date("d.m.Y", $yeni_tarih);

list($g1,$a1,$y1) = explode(".",$baslangic);  


if($a1==01){ $gunson=31; }
elseif($a1==02){ $gunson=28; }
elseif($a1==03){ $gunson=31; }
elseif($a1==04){ $gunson=30; }
elseif($a1==05){ $gunson=31; }
elseif($a1==06){ $gunson=30; }
elseif($a1==07){ $gunson=31; }
elseif($a1==08){ $gunson=31; }
elseif($a1==09){ $gunson=30; }
elseif($a1==10){ $gunson=31; }
elseif($a1==11){ $gunson=30; }
elseif($a1==12){ $gunson=31; }


$bitis=date($gunson.".".$a1.".".$y1);

list($g2,$a2,$y2) = explode(".",$bitis);  

?>
<div class="sol temizle fiyatlandirma ubuntu" style="margin-bottom:10px;"><? echo $baslangic." - ".$bitis; ?></div>

<table border="0px" width="770px" style="margin-bottom:10px;">
<tr>
<? 
$ayilk = date(strtotime($baslangic));
$ayson = date(strtotime($bitis));


while($ayilk<=$ayson){ 


echo "<td class='stil1' style='";
	if((strtr(date('l',$ayilk),$tarih)==Ct) or (strtr(date('l',$ayilk),$tarih)==Pz)) {
		echo "background:#ddd; color:#cc0000"; 
	} else {
		echo "background:#F5F5F5"; 
	} echo "'>"; 
echo strtr(date("l",$ayilk),$tarih);
echo "</td>";

$ayilk=$ayilk + 86400;
 } 
?>
</tr>
<tr>
<? $gun1=$g1;
while($gun1<=$g2){ 
if($gun1==1){ $gun1yazdir='01'; }
elseif($gun1==2){ $gun1yazdir='02'; }
elseif($gun1==3){ $gun1yazdir='03'; }
elseif($gun1==4){ $gun1yazdir='04'; }
elseif($gun1==5){ $gun1yazdir='05'; }
elseif($gun1==6){ $gun1yazdir='06'; }
elseif($gun1==7){ $gun1yazdir='07'; }
elseif($gun1==8){ $gun1yazdir='08'; }
elseif($gun1==9){ $gun1yazdir='09'; }
else { $gun1yazdir=$gun1; }
?>
<td class="stil1"><? echo $gun1yazdir; ?>
</td>
<? 
 $gun1++;
 } 
?>
</tr>




<tr>
<? 
$tarih_baslangic=date(strtotime($baslangic));
while($tarih_baslangic<=$ayson){ ?>
<td class="stil2">
<?

$tarihcek=mysql_query("select * from tarih_araligi where otel_id='$indexotellerveri[otel_id]' and tarih_alis_ay='$a1'");
while($tarihcekveri = mysql_fetch_array($tarihcek)){

	$giris_alis=date($tarihcekveri[tarih_alis_gun].".".$tarihcekveri[tarih_alis_ay].".".$tarihcekveri[tarih_yil]);
	$cikis_alis=date($tarihcekveri[tarih_donus_gun].".".$tarihcekveri[tarih_donus_ay].".".$tarihcekveri[tarih_yil]);
	$giris = date(strtotime($giris_alis));
	$cikis = date(strtotime($cikis_alis));

	if(($tarih_baslangic>=$giris) && ($tarih_baslangic<=$cikis)){ echo "<span class='stil5'></span>";} 

	}
?>
</td>
<? 
 $tarih_baslangic=$tarih_baslangic+86400;
 } 
?>
</tr>
</table>
<?
$say++;
}
?>