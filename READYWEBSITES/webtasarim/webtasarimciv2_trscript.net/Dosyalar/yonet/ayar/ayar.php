<?php
include('library/kontrol.php');
if($_POST['iletisim']==1)
{
	$telefon=$eretna->escape($_POST['telefon']);	
	$fax=$eretna->escape($_POST['fax']);	
	$posta=$eretna->escape($_POST['posta']);
	$adres=$eretna->escape($_POST['adres']);
	$gsm=$eretna->escape($_POST['gsm']);
	$map=$eretna->escape($_POST['map']);
	$imail=$eretna->escape($_POST['imail']);
	$bmail=$eretna->escape($_POST['bmail']);
	$smail=$eretna->escape($_POST['smail']);			
	
	if(empty($telefon) || empty($fax) || empty($posta)) { $durum=2; } else {
	$guncelle=mysql_query("UPDATE ayarlar SET tel='$telefon',fax='$fax',eposta='$posta',adres='$adres',gsm='$gsm',iletisim_mail='$imail',basvuru_mail='$bmail',siparis_mail='$smail' LIMIT 1"); 
	if($guncelle)  $durum=1;
	if(!$guncelle) $durum=2;
	}
	
}
if($_POST['site']==1)
{
	$title=$eretna->escape($_POST['title']);	
	$keyword=$eretna->escape($_POST['keyword']);	
	$descp=$eretna->escape($_POST['descp']);
	$video=$eretna->escape($_POST['video']);
	$sanal=$eretna->escape($_POST['sanal']);
	
	if(empty($title) || empty($keyword) || empty($descp)) { $durum=4; } else {
	$guncelle=mysql_query("UPDATE ayarlar SET title='$title',keyw='$keyword',sitedesc='$descp',video='$video',sanal='$sanal' LIMIT 1 "); 
	if($guncelle)  $durum=3;
	if(!$guncelle) $durum=4;
	}
	
}
if($_POST['sifrec']==1)
{
	$eski_sifre=$_POST['eski_sifre'];
	$yeni_sifre=$_POST['yeni_sifre'];
	$sifre_tekrar=$_POST['sifre_tekrar'];
	
	$eski_sifre_sorgu=mysql_query("SELECT password FROM admin_kontrol WHERE password='".md5(sha1($eski_sifre))."' LIMIT 1");
	$sifre_kontrol=mysql_num_rows($eski_sifre_sorgu);	
	if($sifre_kontrol<1) { $sifre_durum=2; $shata='Mevcut Şifrenizi Yanlış Girdiniz. Lütfen Tekrar Deneyiniz'; } else {
		if($yeni_sifre!=$sifre_tekrar) { $sifre_durum=2; $shata='Girmiş Olduğunuz Şifreler Aynı Değil Lütfen Tekrar Deneyiniz'; } else {	
		
				$sifre_onay=mysql_query("UPDATE admin_kontrol SET password='".md5(sha1($sifre_tekrar))."' WHERE id=1 LIMIT 1");
				$sifre_durum=1;
			}	
		}
}
if($_POST['opt']==1)
{

	$sorgu = mysql_query("SHOW TABLES FROM ".DATA_BASE.""); 
	
	if (!$sorgu) { 
		echo "Veritabanı Hatası, tablolar listelenemiyor!\n"; 
		echo 'MySQL Hatası: ' . mysql_error(); 
		exit; 
	} 
	
	while ($satir = mysql_fetch_row($sorgu)) { 
	
	   mysql_query("OPTIMIZE TABLE ".$satir[0]); 
	   mysql_query("CHECK TABLE ".$satir[0]);    
	   mysql_query("REPAIR TABLE ".$satir[0]);    
	   mysql_query("ANALYZE TABLE ".$satir[0]);    
	}
	 echo $islem->islem_sonucu(1,'Veri Tabanı Başarıyla Optimize Edilmiştir.');

}

if($_POST['orans']==1)
{
	$oran=$eretna->escape($_POST['oran']);	

	if(!isset($oran)) { $durum=6; } else {
		$guncelle=mysql_query("UPDATE ayarlar SET oran='".$oran."' LIMIT 1"); 
		if($guncelle)  $durum=5;
		if(!$guncelle) $durum=6;
	}
	
}

$sorgu=mysql_query("SELECT * FROM ayarlar");
$yaz=mysql_fetch_assoc($sorgu);

function oranla($d)
{
	if(strlen($d)==1) { return $c='0.0'.$d; } else {  return $c='0.'.$d;  }
}
?>
<script type="text/javascript" src="js/ilce.js"></script>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
<h2>Genel Ayarlar</h2></div>
	<div class="box-body clear">
	<div id="table">
	  <form name="form1" method="post" action="">
              <input name="iletisim" type="hidden" id="iletisim" value="1">
		  <?php if($durum==1) { echo $islem->islem_sonucu(1,'Genel Ayarlar Başarıyla Güncellendi.'); } ?>
          <?php if($durum==2) { echo $islem->islem_sonucu(0,'Lütfen Bilgileri Kontrol Ederek Tekrar Giriniz.'); }?>
	      <table width="700" border="0" cellspacing="0" cellpadding="0">
	        <tr>
	          <td colspan="3"><strong>İletişim Bilgileri</strong></td>
            </tr>
	        <tr>
	          <td width="151"><strong>Telefon</strong></td>
	          <td width="8"><strong>:</strong></td>
	          <td width="511"><strong>
  		          <input name="telefon" type="text" id="telefon" size="25" value="<?php echo $yaz['tel']; ?>" />
	          </strong></td>
            </tr>
	        <tr>
	          <td><strong>Fax</strong></td>
	          <td><strong>:</strong></td>
	          <td><strong>
  		          <input name="fax" type="text" id="fax" size="25" value="<?php echo $yaz['fax']; ?>" />
	          </strong></td>
            </tr>
	        <tr>
	          <td><strong>Gsm</strong></td>
	          <td><strong>:</strong></td>
	          <td><strong>
	            <input name="gsm" type="text" id="gsm" size="25" value="<?php echo $yaz['gsm']; ?>" />
	          </strong></td>
            </tr>
	        <tr>
	          <td><strong>E-Posta</strong></td>
	          <td><strong>:</strong></td>
	          <td><strong>
  		          <input name="posta" type="text" id="posta" size="50" value="<?php echo $yaz['eposta']; ?>" />
	          </strong></td>
            </tr>
	        <tr>
	          <td><strong>Adres</strong></td>
	          <td><strong>:</strong></td>
	          <td><textarea name="adres" cols="75" rows="5" id="adres"><?php echo stripslashes($yaz['adres']); ?></textarea></td>
            </tr>
	        <tr>
	          <td><strong>İletişim Formu Mail Adresi</strong></td>
	          <td><strong>:</strong></td>
	          <td><strong>
	            <input name="imail" type="text" id="imail" size="50" value="<?php echo $yaz['iletisim_mail']; ?>" />
	            </strong></td>
            </tr>
	        <tr>
	          <td><strong>Başvuru Formu Mail Adresi</strong></td>
	          <td><strong>:</strong></td>
	          <td><strong>
	            <input name="bmail" type="text" id="bmail" size="50" value="<?php echo $yaz['basvuru_mail']; ?>" />
	            </strong></td>
            </tr>
	        <tr>
	          <td><strong>Sipariş Formu Mail Adresi</strong></td>
	          <td><strong>:</strong></td>
	          <td><strong>
	            <input name="smail" type="text" id="smail" size="50" value="<?php echo $yaz['siparis_mail']; ?>" />
	            </strong></td>
            </tr>
	        <tr>
	          <td>&nbsp;</td>
	          <td>&nbsp;</td>
	          <td><input type="submit" name="button" id="button" class="submit" value="Bilgileri Güncelle"></td>
            </tr>
          </table>
	      </form>
	    <form action="" method="post" name="form1" id="form1">
	      <input name="site" type="hidden" id="site" value="1" />
	      <?php if($durum==3) { echo $islem->islem_sonucu(1,'Genel Ayarlar Başarıyla Güncellendi.'); } ?>
	      <?php if($durum==4) { echo $islem->islem_sonucu(0,'Lütfen Bilgileri Kontrol Ederek Tekrar Giriniz.'); }?>
	      <table width="700" border="0" cellspacing="0" cellpadding="0">
	        <tr>
	          <td colspan="3"><strong>Site Bilgileri</strong></td>
            </tr>
	        <tr>
	          <td width="151"><strong>Site Başlığı ( Title )</strong></td>
	          <td width="8"><strong>:</strong></td>
	          <td width="511"><strong>
	            <input name="title" type="text" id="title" size="75" value="<?php echo $yaz['title']; ?>" />
	            </strong></td>
            </tr>
	        <tr>
	          <td><strong>Anahtar Kelimler ( Keywords)</strong></td>
	          <td><strong>:</strong></td>
	          <td valign="top"><textarea name="keyword" cols="75" rows="3" id="keyword"><?php echo $yaz['keyw']; ?></textarea> 
	            <strong>Kelimeler Virgül ( , ) İle Ayrılmalıdır.</strong></td>
            </tr>
	        <tr>
	          <td><strong>Açıklama ( Description )</strong></td>
	          <td><strong>:</strong></td>
	          <td><textarea name="descp" cols="75" rows="3" id="descp"><?php echo $yaz['sitedesc']; ?></textarea></td>
            </tr>
	        <tr>
	          <td><strong>Video Embed Kodu</strong></td>
	          <td><strong>:</strong></td>
	          <td><textarea name="video" cols="75" rows="5" id="map"><?php echo stripslashes($yaz['video']); ?></textarea></td>
            </tr>
	        <tr>
	          <td><strong>Sanal Tur URL</strong></td>
	          <td><strong>:</strong></td>
	          <td><strong>
	            <input name="sanal" type="text" id="sanal" size="75" value="<?php echo $yaz['sanal']; ?>" />
	          </strong></td>
            </tr>
	        <tr>
	          <td>&nbsp;</td>
	          <td>&nbsp;</td>
	          <td><input type="submit" name="button3" id="button3" class="submit" value="Bilgileri Güncelle" /></td>
            </tr>
          </table>
        </form>
	    <br />
              	  		  <form name="form1" method="post" action="">
              <input type="hidden" name="sifrec" value="1">
			<?php if($sifre_durum==1) { echo $islem->islem_sonucu(1,'Şifre Başarıyla Güncellendi.'); } ?>
            <?php if($sifre_durum==2) { echo $islem->islem_sonucu(0,''.$shata.''); }?>
	  		    <table width="700" border="0" cellspacing="0" cellpadding="0">
	  		      <tr>
	  		        <td colspan="3"><strong>Şifre Değiştir</strong></td>
  		          </tr>
	  		      <tr>
	  		        <td width="151">Eski Şifre</td>
	  		        <td width="8">:</td>
	  		        <td width="511"><input type="password" name="eski_sifre" id="eski_sifre" /></td>
  		          </tr>
	  		      <tr>
	  		        <td>Yeni Şifre</td>
	  		        <td>:</td>
	  		        <td><input type="password" name="yeni_sifre" id="yeni_sifre" /></td>
  		          </tr>
	  		      <tr>
	  		        <td>Yeni Şifre Tekrar</td>
	  		        <td>:</td>
	  		        <td><input type="password" name="sifre_tekrar" id="sifre_tekrar" /></td>
  		          </tr>
	  		      <tr>
	  		        <td>&nbsp;</td>
	  		        <td>&nbsp;</td>
	  		        <td><input type="submit" name="button" id="button" class="submit" value="Şifreyi Değiştir"></td>
  		          </tr>
  		        </table>
	      </form>
      
   	  		  <form name="form1" method="post" action="">
              <input type="hidden" name="opt" value="1">

            <table>
              <thead>
                <tr>
                  <th>Veri Tabanını Optimize Et</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="submit" name="button2" id="button2" value="Optimize Et" class="submit"/></td>
                </tr>

              </tbody>
            </table>
  		    </form><br />       
	  </div><!-- /#table -->
	 </div> <!-- end of box-body -->
  </div>
</div>
