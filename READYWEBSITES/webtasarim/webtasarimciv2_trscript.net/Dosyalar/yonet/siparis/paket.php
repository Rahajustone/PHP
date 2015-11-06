<?php
include('library/kontrol.php');
$sayfa=intval($_GET['sayfa']);
$baslik=addslashes($_POST['baslik']);
$ucret=addslashes($_POST['ucret']);
$sure=addslashes($_POST['sure']);

########################################################################################
if($_POST['rec']==1)
{
	$kaydet=mysql_query("INSERT INTO vips VALUES(NULL,'".$sure."','".$baslik."','".$ucret."')");
	echo $islem->islem_sonucu(1,'Sayfa Başarıyla Kaydedilmiştir.'); 
}
########################################################################################	
if($_POST['rec']==2)
{
	$guncelle=mysql_query("UPDATE vips SET baslik='".$baslik."',sure='".$sure."',ucret='".$ucret."' WHERE id=".intval($_GET['duzenle'])."");
	echo $islem->islem_sonucu(1,'Bilgiler Başarıyla Günclennmiştir.'); 
	$islem->yonlendir(2,1,'index.php?page=paket');
}
########################################################################################	
if(isset($_GET['sil']) && !empty($_GET['sil']))
{
	$sayfa_sil=mysql_query("DELETE FROM vips WHERE id=".intval($_GET['sil'])." LIMIT 1");
	header("Location: index.php?page=paket");
}

?>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Paket Ekle</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
            <form action="" method="post" enctype="multipart/form-data" name="form1">
            <input type="hidden" name="rec" value="1" />
		  <table>

          <tr>
            <td width="20%"><strong>Paket Adı</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td><input name="baslik" type="text" id="baslik" size="50" /></td>
          </tr>
          <tr>
            <td><strong>Ücreti</strong></td>
            <td><strong>:</strong></td>
            <td><strong>
              <input name="ucret" type="text" id="ucret" size="5" /> 
              TL</strong></td>
          </tr>
          <tr>
            <td><strong>Süresi</strong></td>
            <td><strong>:</strong></td>
            <td><strong>
              <input name="sure" type="text" id="sure" size="3" maxlength="3" />
            Gün</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="Paket Ekle" class="submit" /></td>
          </tr>

		  </table>
			</form>
<?php if($_GET['duzenle']) { 
$dsorgu=mysql_query("SELECT * FROM vips WHERE id=".intval($_GET['duzenle'])."");
$dyaz=mysql_fetch_assoc($dsorgu);
?>
            <form action="" method="post" enctype="multipart/form-data" name="form1">
            <input type="hidden" name="rec" value="2" />
		  <table>

          <tr>
            <td colspan="3" style="background-color:#C30;"><strong>Paket İçeriğini Güncelle</strong></td>
            </tr>
          <tr>
            <td width="20%"><strong>Paket Adı</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td><input name="baslik" type="text" id="baslik" size="50" value="<?php echo $dyaz['baslik']; ?>" /></td>
          </tr>
          <tr>
            <td><strong>Ücreti</strong></td>
            <td><strong>:</strong></td>
            <td><strong>
              <input name="ucret" type="text" id="ucret" size="5"  value="<?php echo $dyaz['ucret']; ?>"/> 
              TL</strong></td>
          </tr>
          <tr>
            <td><strong>Süresi</strong></td>
            <td><strong>:</strong></td>
            <td><strong>
              <input name="sure" type="text" id="sure" size="3" maxlength="3"  value="<?php echo $dyaz['sure']; ?>"/>
            Gün</strong></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="Güncelle" class="submit" /></td>
          </tr>

		  </table>
			</form>

<?php } ?>            
  		  </div><!-- /#table --></div> <!-- end of box-body -->
  </div>
</div>

<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Sisteme Kayıtlı Paketler</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 		  <table>
 		    <thead><tr>
		  <th>Paket Adı</th>
		  <th>Ücreti</th>
		  <th>Süresi</th>
		  <th>İşlemler</th></tr></thead><tbody>
	<?php $sorgu=mysql_query("SELECT * FROM vips ORDER BY sure ASC");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
          					
          <tr>
          <td valign="middle"><strong><?php echo $yaz['baslik']; ?></strong></td>
          <td><span class="iptal"><?php echo $yaz['ucret']; ?></span> <strong>TL</strong></td>
          <td><span class="iptal"><?php echo $yaz['sure']; ?></span> <strong>Gün</strong></td>
          <td><a href="index.php?page=paket&duzenle=<?php echo $yaz['id']; ?>">
            <img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="Düzenle" /></a>
            <a href="index.php?page=paket&sayfa=<?php echo $sayfa; ?>&sil=<?php echo $yaz['id']; ?>" onClick="return sil_kontrol('Silmek istediğinizden eminmisiniz')">
              <img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" /></a> 
          </td></tr>
          <?php } ?>
         
                  
		  </tbody></table>			
			  
		  </div><!-- /#table -->
				</div> <!-- end of box-body -->
			</div>
</div>