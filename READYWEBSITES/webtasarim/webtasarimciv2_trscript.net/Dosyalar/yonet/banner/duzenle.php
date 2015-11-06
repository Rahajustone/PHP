<?php
include('library/kontrol.php');

$id=intval($_GET['id']);


if($_POST['rec']==1)
{
	$adres=addslashes($_POST['adres']);
	$baslik=addslashes($_POST['baslik']);
	$baslik2=addslashes($_POST['baslik2']);
	$metin=addslashes($_POST['metin']);
	$metin2=addslashes($_POST['metin2']);
	$durum=intval($_POST['durum']);

	$banner_gun=mysql_query("UPDATE banner SET onay=".$durum.",url='".$adres."',baslik_tr='".$baslik."',baslik_eng='".$baslik2."',metin_tr='".$metin."',metin_eng='".$metin2."' WHERE id=".$id." LIMIT 1");
	echo $islem->islem_sonucu(1,'Banner Başarıyla Güncellenmiştir.'); 
	$islem->yonlendir(2,1,'index.php?page=banner_duzenle&id='.$id.'');
}
########################################################################################	
if($_POST['rec']==2)	
{
	if(!empty($_FILES['myfile']) || !empty($kat) || !empty($alt) )
	 {
			$dosya->Yukleme_Yeri='../uploads/banner/';
			$dosya->success='İşlem Başarılı';
			$calistir=$dosya->dosya_yukle($_FILES['myfile']);
			$sonuc=$dosya->sonuc($calistir);
			$anket_resim_kayit=mysql_query("UPDATE banner SET resim='".$sonuc[0][0]."' WHERE id=".$id." LIMIT 1");
			echo $islem->islem_sonucu(1,'Banner Başarıyla Güncellenmiştir.'); 
			$islem->yonlendir(2,1,'index.php?page=banner_duzenle&id='.$id.'');
	 }
}	 
########################################################################################	
$duzenle_sorgu=mysql_query("SELECT * FROM banner WHERE id=".$id."");
$duzenle=mysql_fetch_assoc($duzenle_sorgu);
?>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />


<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Banner Düzenle</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
            <form action="" method="post"  name="form1" enctype="multipart/form-data">
            <input type="hidden" name="rec" value="1" />
		  <table>
          <tr>
            <td width="20%"><strong>Durum</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td><select name="durum" id="durum">
              <option value="1" <?php if($duzenle['onay']==1) { echo 'selected="selected"'; } else { } ?>>Banner Yayınlansın</option>
              <option value="2" <?php if($duzenle['onay']==2) { echo 'selected="selected"'; } else { } ?>>Şimdilik Gösterme</option>
              </select></td>
          </tr>
			<?php if( $duzenle['tip']==2) { ?>
            <?php } else { ?>
            <?php } ?>
            
          <tr>
            <td><strong>Adres ( URL )</strong></td>
            <td><strong>:</strong></td>
            <td><input name="adres" type="text" id="adres" value="<?php echo $duzenle['url']; ?>" size="50" /></td>
          </tr>
          <tr>
            <td><strong>Türkçe Başlık</strong></td>
            <td><strong>:</strong></td>
            <td><span id="sprytextfield1">
              <input name="baslik" type="text" id="baslik" size="50" value="<?php echo $duzenle['baslik_tr']; ?>" />
              </span></td>
          </tr>
          <tr>
            <td><strong>İngilizce Başlık</strong></td>
            <td><strong>:</strong></td>
            <td><input name="baslik2" type="text" id="baslik2" size="50" value="<?php echo $duzenle['baslik_eng']; ?>" /></td>
          </tr>
          <tr>
            <td><strong>Türkçe Açıklama</strong></td>
            <td><strong>:</strong></td>
            <td><textarea name="metin" cols="55" rows="5" id="metin"><?php echo stripslashes($duzenle['metin_tr']); ?></textarea></td>
          </tr>
          <tr>
            <td><strong>İngilizce Açıklama</strong></td>
            <td><strong>:</strong></td>
            <td><textarea name="metin2" cols="55" rows="5" id="metin2"><?php echo stripslashes($duzenle['metin_eng']); ?></textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="Güncelle"  class="submit" /></td>
          </tr>
        
		  </table>
			</form>
  <form action="" method="post" enctype="multipart/form-data"  name="form1">
            <input type="hidden" name="rec" value="2" />
            <table>
  <tr>
    <td width="20%"><strong>Banner Seç</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td><input type="file" name="myfile" id="myfile" />
      <input type="submit" name="button3" id="button3" value="Yükle" class="submit"/>
      <span class="iptal">Dikkat: </span> <span class="aktif">Banner Ebatı 1000px * 315px Olmalıdır.</span></td>
  </tr>
  <tr>
    <td><strong>Ekli Banner</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $islem->banner($id); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>

            </form>          
     </div><!-- /#table --></div> <!-- end of box-body -->
  </div>
</div>


<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
