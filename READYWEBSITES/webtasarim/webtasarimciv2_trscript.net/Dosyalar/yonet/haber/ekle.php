<?php
include('library/kontrol.php');
$kat=intval($_GET['kat']);
$id=intval($_GET['id']);
$durum=intval($_GET['durum']);

if($_POST['rec']==1)
{
	$baslik=mysql_real_escape_string($_POST['baslik']);
	$baslik2=mysql_real_escape_string($_POST['baslik2']);
	$metin=addslashes($_POST['metin']);
	$metin2=addslashes($_POST['metin2']);
	$video=addslashes($_POST['video']);
	$tarih=date("Y-m-d");
	
	if(!empty($_POST['baslik']))
	{
		$baslik=mysql_real_escape_string($_POST['baslik']);
		$eresim->succes='Kayıt Başarıyla Yapılmıştır';
		$eresim -> ayarlar('../uploads/','../uploads/thumbs/','300','2000',1);
		$islem2 = $eresim->yukle($_FILES['myfile']);
		$sonuc = $eresim->mesaj($islem2);
	}
	
	$kayit=mysql_query("INSERT INTO haberler VALUES(NULL,'".$tarih."','".$baslik."','".$baslik2."','".$metin."','".$metin2."','".$video."','".$sonuc[0][1]."')");	
	if($kayit) 
	{ 
		echo $islem->islem_sonucu(1,'Haber Başarıyla Eklenmiştir. Detay Sayfasına Yönlendiriliyorsunuz.');  
		$islem->yonlendir(2,1,'index.php?page=haber_duzenle&id='.mysql_insert_id().'');
	}
}

if(!empty($_GET['sil']) && isset($_GET['sil']))
{
	$duyuru_sil=mysql_query("DELETE FROM urunler WHERE id=".intval($_GET['sil'])." LIMIT 1");	
	$islem->yonlendir(1,0,'index.php?page=ekle');
}
?>

<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Yeni Kayıt</h2>
	</div>
    	<div class="box-body clear">
	  		<div id="table">
 				<form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="rec" value="1" />
                <table>
  <tr>
    <td><strong>Türkçe Başlık</strong></td>
    <td>:</td>
    <td><input name="baslik" type="text" id="baslik" size="75" value="<?php echo stripslashes($_POST['baslik']); ?>" /></td>
  </tr>
  <tr>
    <td><strong>İngilizce Başlık</strong></td>
    <td>:</td>
    <td><input name="baslik2" type="text" id="baslik2" size="75" value="<?php echo stripslashes($_POST['baslik2']); ?>" /></td>
  </tr>
  <tr>
    <td><strong>Türkçe İçerik Metni</strong></td>
    <td><strong>:</strong></td>
    <td><?php $ckeditor->editor('metin',stripslashes($_POST['metin']),$config); ?></td>
  </tr>
  <tr>
    <td><strong>İngilizce İçerik Metni</strong></td>
    <td><strong>:</strong></td>
    <td><?php $ckeditor->editor('metin2',stripslashes($_POST['metin2']),$config); ?></td>
  </tr>
  <tr>
    <td><strong>Video</strong></td>
    <td><strong>:</strong></td>
    <td><textarea name="video" id="video" cols="75" rows="7"></textarea></td>
  </tr>
  <tr>
    <td><strong>Resim</strong></td>
    <td><strong>:</strong></td>
    <td><label for="myfile"></label>
      <input type="file" name="myfile" id="myfile" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Ekle" class="submit" /></td>
  </tr>
                </table>

                </form>
			  <div class="tab-footer clear"><div class="pager fr">

</div></div>
						
</div><!-- /#table -->
				</div> <!-- end of box-body -->
			</div>
</div>
