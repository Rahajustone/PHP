<?php
include('library/kontrol.php');
if($_POST['iletisim']==1)
{
	$mag_url=$eretna->escape($_POST['mag_url']);	
	$mag_tr=$eretna->escape($_POST['mag_tr']);	
	$mag_eng=$eretna->escape($_POST['mag_eng']);
	$kat_url=$eretna->escape($_POST['kat_url']);
	$kat_tr=$eretna->escape($_POST['kat_tr']);
	$kat_eng=$eretna->escape($_POST['kat_eng']);
	$talep_tr=$eretna->escape($_POST['talep_tr']);
	$talep_eng=$eretna->escape($_POST['talep_eng']);
			
	$guncelle=mysql_query("UPDATE sabits SET magazin_tr='$mag_tr',magazin_eng='$mag_eng',magazin_url='$mag_url',katalog_tr='$kat_tr',katalog_eng='$kat_eng',katalog_url='$kat_url',talep_tr='$talep_tr',talep_eng='$talep_eng' LIMIT 1"); 
	if($guncelle)  $durum=1;
	if(!$guncelle) $durum=2;

	
}

$sorgu=mysql_query("SELECT * FROM sabits");
$yaz=mysql_fetch_assoc($sorgu);
?>
<script type="text/javascript" src="js/ilce.js"></script>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
<h2>Medya Linkleri</h2></div>
	<div class="box-body clear">
	<div id="table">
	  <form name="form1" method="post" action="">
              <input name="iletisim" type="hidden" id="iletisim" value="1">
		  <?php if($durum==1) { echo $islem->islem_sonucu(1,'Genel Ayarlar Başarıyla Güncellendi.'); } ?>
          <?php if($durum==2) { echo $islem->islem_sonucu(0,'Lütfen Bilgileri Kontrol Ederek Tekrar Giriniz.'); }?>
	      <table width="700" border="0" cellspacing="0" cellpadding="0">
	        <tr>
	          <td colspan="3"><strong>Medya Bilgileri</strong></td>
            </tr>
	        <tr>
	          <td width="151"><strong>Magazin URL</strong></td>
	          <td width="8"><strong>:</strong></td>
	          <td width="511"><strong>
  		          <input name="mag_url" type="text" id="mag_url" size="75" value="<?php echo $yaz['magazin_url']; ?>" />
	          </strong></td>
            </tr>
	        <tr>
	          <td width="151"><strong>Magazin Türkçe Metin</strong></td>
	          <td><strong>:</strong></td>
	          <td><textarea name="mag_tr" cols="85" rows="2" id="mag_tr"><?php echo stripslashes($yaz['magazin_tr']); ?></textarea></td>
            </tr>
	        <tr>
	          <td><strong>Magazin İngilizce Metin</strong></td>
	          <td><strong>:</strong></td>
	          <td><textarea name="mag_eng" cols="85" rows="2" id="mag_eng"><?php echo stripslashes($yaz['magazin_eng']); ?></textarea></td>
            </tr>
	        <tr>
	          <td><strong>Katalog URL</strong></td>
	          <td><strong>:</strong></td>
	          <td><strong>
	            <input name="kat_url" type="text" id="kat_url" size="75" value="<?php echo $yaz['katalog_url']; ?>" />
	          </strong></td>
            </tr>
	        <tr>
	          <td><strong>Katalog Türkçe Metin</strong></td>
	          <td><strong>:</strong></td>
	          <td><textarea name="kat_tr" cols="85" rows="2" id="adres5"><?php echo stripslashes($yaz['katalog_tr']); ?></textarea></td>
            </tr>
	        <tr>
	          <td><strong>Katalog İngilizce Metin</strong></td>
	          <td><strong>:</strong></td>
	          <td><textarea name="kat_eng" cols="85" rows="2" id="adres4"><?php echo stripslashes($yaz['katalog_eng']); ?></textarea></td>
            </tr>
	        <tr>
	          <td><strong>Katalog Talep Türkçe Metin</strong></td>
	          <td><strong>:</strong></td>
	          <td><textarea name="talep_tr" cols="85" rows="2" id="adres7"><?php echo stripslashes($yaz['talep_tr']); ?></textarea></td>
            </tr>
	        <tr>
	          <td><strong>Katalog Talep İngilizce Metin</strong></td>
	          <td><strong>:</strong></td>
	          <td><textarea name="talep_eng" cols="85" rows="2" id="adres6"><?php echo stripslashes($yaz['talep_eng']); ?></textarea></td>
            </tr>
	        <tr>
	          <td>&nbsp;</td>
	          <td>&nbsp;</td>
	          <td><input type="submit" name="button" id="button" class="submit" value="Bilgileri Güncelle"></td>
            </tr>
          </table>
	      </form>
	  <br /><br />       
	  </div><!-- /#table -->
	 </div> <!-- end of box-body -->
  </div>
</div>
