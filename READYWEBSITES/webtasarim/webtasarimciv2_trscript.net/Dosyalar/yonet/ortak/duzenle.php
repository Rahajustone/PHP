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

	
	if(!empty($_FILES['myfile']['name']))
	{
		$baslik=mysql_real_escape_string($_POST['baslik']);
		$eresim->succes='Kayıt Başarıyla Yapılmıştır';
		$eresim -> ayarlar('../uploads/','../uploads/thumbs/','300','2000',1);
		$islem2 = $eresim->yukle($_FILES['myfile']);
		$sonuc = $eresim->mesaj($islem2);
		$resim_guncelle=mysql_query("UPDATE ortaks SET logo='".$sonuc[0][1]."' WHERE id=".$id." LIMIT 1");	
	}
	if(!empty($_FILES['myfile2']['name']))
	{
		$baslik=mysql_real_escape_string($_POST['baslik']);
		$eresim->succes='Kayıt Başarıyla Yapılmıştır';
		$eresim -> ayarlar('../uploads/','../uploads/thumbs/','300','2000',1);
		$islem2 = $eresim->yukle($_FILES['myfile2']);
		$sonuc = $eresim->mesaj($islem2);
		$resim_guncelle=mysql_query("UPDATE ortaks SET resim='".$sonuc[0][1]."' WHERE id=".$id." LIMIT 1");	
	}
	
	$kayit=mysql_query("UPDATE ortaks SET baslik_tr='".$baslik."',baslik_eng='".$baslik2."',metin_tr='".$metin."',metin_eng='".$metin2."' WHERE id=".$id." LIMIT 1");	
	if($kayit) { echo $islem->islem_sonucu(1,'İçerik Başarıyla Güncellenmiştir.'); }
}
$urun_sorgu=mysql_query("SELECT * FROM ortaks WHERE id=".$id." LIMIT 1");
$yaz=mysql_fetch_assoc($urun_sorgu);
?>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Bilgileri Düzenle</h2>
	</div>
    	<div class="box-body clear">
	  		<div id="table">
 				<form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="rec" value="1" />
                <table>
  <tr>
    <td><strong>Vitrin Resmi</strong></td>
    <td><strong>:</strong></td>
    <td valign="top">
    <a href="../uploads/thumbs/<?php echo $yaz['resim']; ?>"><img src="../uploads/thumbs/<?php echo $yaz['resim']; ?>" width="100" align="absmiddle"/></a>
    <span class="iptal">Logo :</span> <a href="../uploads/thumbs/<?php echo $yaz['logo']; ?>"><img align="absmiddle" src="../uploads/thumbs/<?php echo $yaz['logo']; ?>" width="100" /></a>
    </td>
  </tr>
  <tr>
    <td><strong>Türkçe Başlık</strong></td>
    <td>:</td>
    <td><input name="baslik" type="text" id="baslik" size="75" value="<?php echo stripslashes($yaz['baslik_tr']); ?>" /></td>
  </tr>
  <tr>
    <td><strong>İngilizce Başlık</strong></td>
    <td>:</td>
    <td><input name="baslik2" type="text" id="baslik2" size="75" value="<?php echo stripslashes($yaz['baslik_eng']); ?>" /></td>
  </tr>
  <tr>
    <td><strong>Türkçe İçerik Metni</strong></td>
    <td><strong>:</strong></td>
    <td><?php $ckeditor->editor('metin',stripslashes($yaz['metin_tr']),$config); ?></td>
  </tr>
  <tr>
    <td><strong>İngilizce İçerik Metni</strong></td>
    <td><strong>:</strong></td>
    <td><?php $ckeditor->editor('metin2',stripslashes($yaz['metin_eng']),$config); ?></td>
  </tr>
  <tr>
    <td><strong>Logo</strong></td>
    <td><strong>:</strong></td>
    <td><label for="myfile"></label>
      <input type="file" name="myfile" id="myfile" />
      <strong class="iptal">Logo Ebatı :</strong> <strong>89 px × 67 px</strong></td>
  </tr>
  <tr>
    <td><strong>Resim</strong></td>
    <td><strong>:</strong></td>
    <td><label for="myfile2"></label>
      <input type="file" name="myfile2" id="myfile2" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Güncelle" class="submit" /></td>
  </tr>
                </table>

                </form>
			  <div class="tab-footer clear"><div class="pager fr">

</div></div>
						
</div><!-- /#table -->
				</div> <!-- end of box-body -->
			</div>
</div>
