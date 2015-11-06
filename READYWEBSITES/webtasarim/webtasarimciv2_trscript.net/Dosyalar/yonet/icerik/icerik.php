<?php
include('library/kontrol.php');
$sayfa=intval($_GET['sayfa']);
$baslik=addslashes($_POST['baslik']);
$baslik2=addslashes($_POST['baslik2']);
$metin=addslashes($_POST['metin']);
$metin2=addslashes($_POST['metin2']);

########################################################################################
if($_POST['rec']==1)
{
	$guncelle=mysql_query("UPDATE sabit SET baslik_tr='".$baslik."',baslik_eng='".$baslik2."',metin_tr='".$metin."',metin_eng='".$metin2."' WHERE id=".$sayfa." LIMIT 1");
	header("Location: index.php?page=icerik&sayfa=".$sayfa."");
}
if($_POST['foto_gun']==1)
{
	if(!empty($_FILES['myfile']['name']))
	{	
		$baslik=mysql_real_escape_string($_POST['baslik']);
		$eresim->succes='Kayıt Başarıyla Yapılmıştır';
		$eresim -> ayarlar('../uploads/content/','../uploads/thumbs/','400','2000',1);
		$islem2 = $eresim->yukle($_FILES['myfile']);
		$sonuc = $eresim->mesaj($islem2);
		$resim_guncelle=mysql_query("UPDATE sabit SET resim='".$sonuc[0][1]."' WHERE id=".$sayfa." LIMIT 1");
	}

}
########################################################################################	
$icerik_sorgu=mysql_query("SELECT * FROM sabit WHERE id=".$sayfa." LIMIT 1");
$yaz=mysql_fetch_assoc($icerik_sorgu);

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
	  <h2>İçerik Bilgilerini Güncelle</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
            <form action="" method="post" enctype="multipart/form-data" name="form1">
            <input type="hidden" name="rec" value="1" />
            <table>
              <tr>
                <td width="20%"><strong>İçerik Kategori</strong></td>
                <td width="2%"><strong>:</strong></td>
                <td><select name="kat" id="kat"  onchange="MM_jumpMenu('self',this,0)">
                  <option value="index.php?page=icerik">Sayfa Seçiniz</option>
                  <?php
			  $icerik_menu=mysql_query("SELECT * FROM sabit ORDER BY id ASC");
			  while($iyaz=mysql_fetch_assoc($icerik_menu))
			  {
				if($sayfa==$iyaz['id']) { $s=' selected="selected"'; } else { $s=''; }
				echo '<option value="index.php?page=icerik&sayfa='.$iyaz['id'].'"'.$s.'>'.$iyaz['baslik_tr'].'</option>'; 
			  }
			  ?>
                </select></td>
              </tr>
              <?php if( isset($sayfa) && !empty($sayfa)) { ?>
              <tr>
                <td><strong>Türkçe Başlık</strong></td>
                <td><strong>:</strong></td>
                <td><input name="baslik" type="text" id="baslik" size="50" value="<?php echo stripslashes($yaz['baslik_tr']); ?>" /></td>
              </tr>
              <tr>
                <td><strong>İngilizce Başlık</strong></td>
                <td><strong>:</strong></td>
                <td><input name="baslik2" type="text" id="baslik2" size="50" value="<?php echo stripslashes($yaz['baslik_eng']); ?>" /></td>
              </tr>
              <tr>
                <td width="20%"><strong>Türkçe İçerik Metni</strong></td>
                <td width="2%"><strong>:</strong></td>
                <td><?php $ckeditor->editor('metin',stripslashes($yaz['metin_tr']),$config); ?></td>
              </tr>
              <tr>
                <td><strong>İngilizce İçerik Metni</strong></td>
                <td><strong>:</strong></td>
                <td><?php $ckeditor->editor('metin2',stripslashes($yaz['metin_eng']),$config); ?></td>
              </tr>
              <tr>
                <td><strong>Resim</strong></td>
                <td><strong>:</strong></td>
                <td><a href="../uploads/content/<?php echo $yaz['resim']; ?>"><img src="../uploads/thumbs/<?php echo $yaz['resim']; ?>" width="80" height="72" /></a></td>
              </tr>
              <tr>
                <td><strong>Resmi Güncelle</strong></td>
                <td><strong>:</strong></td>
                <td><label for="myfile"></label>
                  <input type="file" name="myfile" id="myfile" />
                  <input name="foto_gun" type="checkbox" id="foto_gun" value="1" />
                  <label for="foto_gun"><strong>Resimi Güncelle</strong> <span class="iptal">Resim Ebatı : </span> <span class="aktif">664 px × 150 px</span></label></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="button" id="button" value="Güncelle" class="submit" /></td>
              </tr>
              <?php } ?>
            </table>
            </form>
  		  </div><!-- /#table --></div> <!-- end of box-body -->
  </div>
</div>
