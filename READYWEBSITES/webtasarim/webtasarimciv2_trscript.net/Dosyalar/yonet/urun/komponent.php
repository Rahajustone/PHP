<?php
include('library/kontrol.php');

$metin=addslashes($_POST['metin']);
$metin2=addslashes($_POST['metin2']);

########################################################################################
if($_POST['rec']==1)
{
	$guncelle=mysql_query("UPDATE ayarlar SET kmetin_tr='".$metin."',kmetin_eng='".$metin2."' LIMIT 1");
	header("Location: index.php?page=komponent");
}
if($_POST['foto_gun']==1)
{
	if(!empty($_FILES['myfile']['name']))
	{	
		$baslik=mysql_real_escape_string($_POST['baslik']);
		$eresim->succes='Kayıt Başarıyla Yapılmıştır';
		$eresim -> ayarlar('../uploads/','../uploads/thumbs/','250','2000',1);
		$islem2 = $eresim->yukle($_FILES['myfile']);
		$sonuc = $eresim->mesaj($islem2);
		$resim_guncelle=mysql_query("UPDATE ayarlar SET kresim='".$sonuc[0][1]."' LIMIT 1");
	}

}
########################################################################################	
$icerik_sorgu=mysql_query("SELECT * FROM ayarlar  LIMIT 1");
$yaz=mysql_fetch_assoc($icerik_sorgu);

?>
<script type="text/javascript" src="js/firmalar.js"></script><div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>İçerik Bilgilerini Güncelle</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
            <form action="" method="post" enctype="multipart/form-data" name="form1">
            <input type="hidden" name="rec" value="1" />
            <table>
              <tr>
                <td width="20%"><strong>Türkçe İçerik Metni</strong></td>
                <td width="2%"><strong>:</strong></td>
                <td><?php $ckeditor->editor('metin',stripslashes($yaz['kmetin_tr']),$config); ?></td>
              </tr>
              <tr>
                <td><strong>İngilizce İçerik Metni</strong></td>
                <td><strong>:</strong></td>
                <td><?php $ckeditor->editor('metin2',stripslashes($yaz['kmetin_eng']),$config); ?></td>
              </tr>
              <tr>
                <td><strong>Resim</strong></td>
                <td><strong>:</strong></td>
                <td><a href="../uploads/<?php echo $yaz['kresim']; ?>"><img src="../uploads/thumbs/<?php echo $yaz['kresim']; ?>" width="80" height="72" /></a></td>
              </tr>
              <tr>
                <td><strong>Resmi Güncelle</strong></td>
                <td><strong>:</strong></td>
                <td><label for="myfile"></label>
                  <input type="file" name="myfile" id="myfile" />
                  <input name="foto_gun" type="checkbox" id="foto_gun" value="1" />
                  <label for="foto_gun"><strong>Resimi Güncelle</strong></label></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="button" id="button" value="Güncelle" class="submit" /></td>
              </tr>
            </table>
            </form>
  		  </div><!-- /#table --></div> <!-- end of box-body -->
  </div>
</div>
