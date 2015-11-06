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

	
	if(!empty($_FILES['myfile']['name']))
	{
		$baslik=mysql_real_escape_string($_POST['baslik']);
		$eresim->succes='Kayıt Başarıyla Yapılmıştır';
		$eresim -> ayarlar('../uploads/','../uploads/thumbs/','300','2000',1);
		$islem2 = $eresim->yukle($_FILES['myfile']);
		$sonuc = $eresim->mesaj($islem2);
		$resim_guncelle=mysql_query("UPDATE haberler SET resim='".$sonuc[0][1]."' WHERE id=".$id." LIMIT 1");	
	}
	
	$kayit=mysql_query("UPDATE haberler SET baslik_tr='".$baslik."',baslik_eng='".$baslik2."',metin_tr='".$metin."',metin_eng='".$metin2."',video='".$video."' WHERE id=".$id." LIMIT 1");	
	if($kayit) { echo $islem->islem_sonucu(1,'Haber Başarıyla Güncellenmiştir.'); }
}
#####################################################################################################################
if($_POST['rec']==2)
{
		if(!empty($_FILES['myfile']['name']))
		{
			$eresim->succes='Kayıt Başarıyla Yapılmıştır';
			$eresim -> ayarlar('../uploads/','../uploads/thumbs/','250','2000',1);
			$islem2 = $eresim->yukle($_FILES['myfile']);
			$sonuc = $eresim->mesaj($islem2);
			if($sonuc[0][2]==1) { 
				$resim_sorgu=",'".$sonuc[0][1]."'";
			}
			else
			{
				echo $islem->islem_sonucu(0,$sonuc[0][0]);	
			}
		}
		$urun_ekle=mysql_query("INSERT INTO galeri VALUES(NULL,'1','".$id."','".$sonuc[0][1]."')");	
		echo $islem->islem_sonucu(1,'Resim Başarıyla Kaydedilmiştir.');
		header("Location: index.php?page=haber_duzenle&id=".$id."#galeri");	
	
}
#####################################################################################################################
if(!empty($_GET['sil']) && isset($_GET['sil']))
{
	$islem->host_resim('galeri',intval($_GET['sil']),'../uploads/','../uploads/thumbs/');
	$resim_sil=mysql_query("DELETE FROM galeri WHERE id=".intval($_GET['sil'])." LIMIT 1");
	header("Location: index.php?page=haber_duzenle&id=".$id."#galeri");	
}
$urun_sorgu=mysql_query("SELECT * FROM haberler WHERE id=".$id." LIMIT 1");
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
    <td><a href="../uploads/thumbs/<?php echo $yaz['resim']; ?>"><img src="../uploads/thumbs/<?php echo $yaz['resim']; ?>" width="100" /></a></td>
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
    <td><strong>Video</strong></td>
    <td><strong>:</strong></td>
    <td><textarea name="video" id="video" cols="75" rows="7"><?php echo stripslashes($yaz['video']); ?></textarea></td>
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
<div class="page clear">
  <div class="content-box">
    <div class="box-header clear">
      <h2>Haber Galerisi</h2>
    </div>
    <div class="box-body clear">
      <div id="table2">
        <form action="" method="post" enctype="multipart/form-data"  name="urun_ekle" id="urun_ekle">
          <input name="rec" type="hidden" id="rec" value="2" />
          <table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><strong>Resim Ekle</strong></td>
              <td><strong>:</strong></td>
              <td width="451"><input type="file" name="myfile" id="myfile" /></td>
            </tr>
            <tr>
              <td width="120"></td>
              <td width="5"></td>
              <td><input type="submit" name="button2" id="button2" value="Ekle" class="submit" /></td>
            </tr>
          </table>
        </form>
       
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><span class="aktif">Haber Galeri</span><br />
              <?php
	$galeri_sorgu=mysql_query("SELECT * FROM galeri WHERE icerik=".$id." AND kat=1 ORDER BY id DESC");
	if(mysql_num_rows($galeri_sorgu)<1) { echo '<div class="iptal" align="center" style="font-size:12px; padding:10px;">Henüz Resim Eklenmemiştir.</div>'; }
	while($galeri=mysql_fetch_assoc($galeri_sorgu)){
	?>
              <div style="margin:5px; float:left; border:#CCC 1px solid; padding:5px;" align="center"> <a href="../uploads/<?php echo $galeri['resim']; ?>"><img src="../uploads/thumbs/<?php echo $galeri['resim']; ?>" class="thumb size64" /></a> 
              <a href="index.php?page=haber_duzenle&id=<?php echo $id;?>&sil=<?php echo $galeri['id']; ?>" onclick="return sil_kontrol();"> <img src="images/ico_delete_16.png" style="margin:5px;"  align="absmiddle"/> </a> </div>
              <?php } ?></td>
          </tr>
          <tr></tr>
        </table>
      </div>
      <!-- /#table -->
    </div>
    <!-- end of box-body -->
  </div>
</div>
 <a name="galeri" id="galeri"></a>
