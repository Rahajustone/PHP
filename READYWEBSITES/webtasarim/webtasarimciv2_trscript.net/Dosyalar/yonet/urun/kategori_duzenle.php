<?php
include('library/kontrol.php');

$id=intval($_GET['id']);


if($_POST['rec']==1)
{
	$baslik=addslashes($_POST['baslik']);

	$banner_gun=mysql_query("UPDATE kategori SET baslik='".$baslik."' WHERE id=".$id." LIMIT 1");
	echo $islem->islem_sonucu(1,'Kategori Başarıyla Güncellenmiştir.'); 
	$islem->yonlendir(2,1,'index.php?page=kategori_duzenle&id='.$id.'');
}
########################################################################################	
if($_POST['rec']==2)	
{
	if(!empty($_FILES['myfile']) || !empty($kat) || !empty($alt) )
	 {
			$dosya->Yukleme_Yeri='../upload/';
			$dosya->success='İşlem Başarılı';
			$calistir=$dosya->dosya_yukle($_FILES['myfile']);
			$sonuc=$dosya->sonuc($calistir);
			$anket_resim_kayit=mysql_query("UPDATE kategori SET resim='".$sonuc[0][0]."' WHERE id=".$id." LIMIT 1");
			echo $islem->islem_sonucu(1,'resim Başarıyla Güncellenmiştir.'); 
			$islem->yonlendir(2,1,'index.php?page=kategori_duzenle&id='.$id.'');
	 }
}	 
########################################################################################	
$duzenle_sorgu=mysql_query("SELECT * FROM kategori WHERE id=".$id."");
$duzenle=mysql_fetch_assoc($duzenle_sorgu);
?>

<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Kategori Düzenle</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
            <form action="" method="post"  name="form1" enctype="multipart/form-data">
            <input type="hidden" name="rec" value="1" />
		  <table>
			<?php if( $duzenle['tip']==2) { ?>
            <?php } else { ?>
            <?php } ?>
          <tr>
            <td width="20%"><strong>Başlık</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td><input name="baslik" type="text" id="baslik" value="<?php echo stripslashes($duzenle['baslik']); ?>" size="50" /></td>
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
    <td width="20%"><strong>Kategori Resmi</strong></td>
    <td width="2%"><strong>:</strong></td>
    <td><input type="file" name="myfile" id="myfile" />
      <input type="submit" name="button3" id="button3" value="Yükle" class="submit"/></td>
  </tr>
  <tr>
    <td><strong>Ekli Resim</strong></td>
    <td><strong>:</strong></td>
    <td><img src="../upload/<?php echo stripslashes($duzenle['resim']); ?>" /></td>
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


