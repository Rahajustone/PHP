<?php
include('library/kontrol.php');
$sayfa=intval($_GET['sayfa']);
$baslik=addslashes($_POST['baslik']);
$baslik2=addslashes($_POST['baslik2']);

########################################################################################
if($_POST['rec']==1)
{
	$guncelle=mysql_query("INSERT INTO icerik VALUES(NULL,'".$sayfa."','','".$baslik."','".$baslik2."','','')");
	echo $islem->islem_sonucu(1,'Sayfa Başarıyla Kaydedilmiştir.'); 
}
########################################################################################	
if(isset($_GET['sil']) && !empty($_GET['sil']))
{
	$sayfa_sil=mysql_query("DELETE FROM icerik WHERE id=".intval($_GET['sil'])." LIMIT 1");
	header("Location: index.php?page=sayfa_ekle&sayfa=".$sayfa."");
}

?>
<script type="text/javascript" src="js/firmalar.js"></script>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script><div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Sayfa Ekle</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
            <form action="" method="post" enctype="multipart/form-data" name="form1">
            <input type="hidden" name="rec" value="1" />
		  <table>
          <tr>
            <td width="20%"><strong>Sayfa Kategori</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td>
            <select name="kat" id="kat"  onchange="MM_jumpMenu('self',this,0)">
              <option value="index.php?page=sayfa_ekle">Sayfa Seçiniz</option>
			  <option value="index.php?page=sayfa_ekle&sayfa=1" <?php if($sayfa==1) { echo 'selected="selected"'; } ?>>Kurumsal Sayfalar</option>
              <option value="index.php?page=sayfa_ekle&sayfa=2" <?php if($sayfa==2) { echo 'selected="selected"'; } ?>>Hizmetler</option>
              <option value="index.php?page=sayfa_ekle&sayfa=3" <?php if($sayfa==3) { echo 'selected="selected"'; } ?>>Teknik Servis</option>
              <option value="index.php?page=sayfa_ekle&sayfa=4" <?php if($sayfa==4) { echo 'selected="selected"'; } ?>>Kariyer</option>
            </select>
            </td>
          </tr>
   <?php if( isset($sayfa) && !empty($sayfa)) { ?>       
          <tr>
            <td><strong>Türkçe Başlık</strong></td>
            <td><strong>:</strong></td>
            <td><input name="baslik" type="text" id="baslik" size="50" /></td>
          </tr>
          <tr>
            <td><strong>İngilizce Başlık</strong></td>
            <td><strong>:</strong></td>
            <td><input name="baslik2" type="text" id="baslik2" size="50" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="Sayfa Ekle" class="submit" /></td>
          </tr>
   <?php } ?>     
		  </table>
			</form>
  		  </div><!-- /#table --></div> <!-- end of box-body -->
  </div>
</div>

<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Sisteme Kayıtlı Sayfalar</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 		  <table>
 		    <thead><tr>
 		      <th>Kategori</th>
 		      <th>Türkçe Başlık</th>
		  <th>İngilizce Başlık</th>
		  <th>İçerik Durumu</th>
		  <th>İşlemler</th></tr></thead><tbody>
	<?php 
		  $sorgu=mysql_query("SELECT * FROM icerik ORDER BY kat ASC");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
          					
          <tr>
            <td class="renk<?php echo $yaz['kat']; ?>"><?php echo $islem->kategori_baslik($yaz['kat']); ?></td>
            <td valign="middle"><?php echo $yaz['baslik_tr']; ?></td>
          <td><?php echo $yaz['baslik_eng']; ?></td>
          <td><?php if(!empty($yaz['metin_tr'])) { echo '<span class="onayli">İçerik Metni Girilmiş</span>'; } else { echo '<span class="iptal">İçerik Boş</span>'; } ?></td>
          <td><a href="index.php?page=iceriks&kat=<?php echo $yaz['kat']; ?>&sayfa=<?php echo $yaz['id']; ?>">
            <img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="Düzenle" /></a>
            <a href="index.php?page=sayfa_ekle&sayfa=<?php echo $sayfa; ?>&sil=<?php echo $yaz['id']; ?>" onClick="return sil_kontrol('Silmek istediğinizden eminmisiniz')">
              <img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" /></a> 
          </td></tr>
          <?php } ?>
         
                  
		  </tbody></table>			
			  
		  </div><!-- /#table -->
				</div> <!-- end of box-body -->
			</div>
</div>