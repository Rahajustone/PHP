<?php
include('library/kontrol.php');
$kat=intval($_GET['kat']);
$id=intval($_GET['id']);
$durum=intval($_GET['durum']);

if($_POST['rec']==1)
{
	$baslik=mysql_real_escape_string($_POST['baslik']);
	$baslik2=mysql_real_escape_string($_POST['baslik2']);
	$stok=mysql_real_escape_string($_POST['stok']);
	$fiyat=mysql_real_escape_string($_POST['fiyat']);
	$birim=mysql_real_escape_string($_POST['birim']);
	$indirim=mysql_real_escape_string($_POST['indirim']);
	
	$metin=addslashes($_POST['metin']);
	$metin2=addslashes($_POST['metin2']);
	$video=addslashes($_POST['video']);
	
	if(!empty($_FILES['myfile']['name']))
	{
		$baslik=mysql_real_escape_string($_POST['baslik']);
		$eresim->succes='Kayıt Başarıyla Yapılmıştır';
		$eresim -> ayarlar('../uploads/','../uploads/thumbs/','250','10000',1);
		$islem2 = $eresim->yukle($_FILES['myfile']);
		$sonuc = $eresim->mesaj($islem2);
		$resim_guncelle=mysql_query("UPDATE urunler SET resim='".$sonuc[0][1]."' WHERE id=".$id." LIMIT 1");	
	}
	
	$kayit=mysql_query("UPDATE urunler SET baslik_tr='".$baslik."',baslik_eng='".$baslik2."',stok='".$stok."',fiyat='".$fiyat."',indirim='".$indirim."',para_birim='".$birim."',video='".$video."',metin_tr='".$metin."',metin_eng='".$metin2."' WHERE id=".$id." LIMIT 1");	
	if($kayit) { echo $islem->islem_sonucu(1,'Ürün Başarıyla Güncellenmiştir.'); }
}

if(!empty($_GET['sil']) && isset($_GET['sil']))
{
	$duyuru_sil=mysql_query("DELETE FROM urunler WHERE id=".intval($_GET['sil'])." LIMIT 1");	
	$islem->yonlendir(1,0,'index.php?page=ekle');
}
$urun_sorgu=mysql_query("SELECT * FROM urunler WHERE id=".$id." LIMIT 1");
$yaz=mysql_fetch_assoc($urun_sorgu);
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
                    <td><strong>Ürün Resmi</strong></td>
                    <td><strong>:</strong></td>
                    <td>
                    <a href="../uploads/<?php echo $yaz['resim']; ?>">
                    <img src="../uploads/thumbs/<?php echo $yaz['resim']; ?>" width="100" />
                    </a>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Türkçe Başlık</strong></td>
                    <td><strong>:</strong></td>
                    <td><span id="sprytextfield1">
                      <input name="baslik" type="text" id="baslik" size="75" value="<?php echo stripslashes($yaz['baslik_tr']); ?>" />
                    </span></td>
                  </tr>
                  <tr>
                    <td><strong>İngilizce Başlık</strong></td>
                    <td><strong>:</strong></td>
                    <td><span id="sprytextfield2">
                      <input name="baslik2" type="text" id="baslik2" size="75" value="<?php echo stripslashes($yaz['baslik_eng']); ?>" />
                    </span></td>
                  </tr>
                  <tr>
                    <td><strong>Stok Kodu</strong></td>
                    <td>:</td>
                    <td><input type="text" name="stok" id="stok" value="<?php echo stripslashes($yaz['stok']); ?>"/></td>
                  </tr>
                  <tr>
                    <td><strong>Fiyat</strong></td>
                    <td><strong>:</strong></td>
                    <td><input name="fiyat" type="text" id="fiyat" size="6" value="<?php echo stripslashes($yaz['fiyat']); ?>" />
                      <select name="birim" id="birim">
                        <option value="1" <?php if($yaz['para_birim']==1) echo 'selected="selected"'; ?>>TL</option>
                        <option value="2" <?php if($yaz['para_birim']==2) echo 'selected="selected"'; ?>>Dolar</option>
                        <option value="3" <?php if($yaz['para_birim']==3) echo 'selected="selected"'; ?>>Euro</option>
                        <option value="4" <?php if($yaz['para_birim']==4) echo 'selected="selected"'; ?>>Sterlin</option>
                      </select>
                      <strong> Not: </strong>Fiyat Girerken Nokta veya Virgül Kullanmayınız. Örn:( üç bin tl İçin )  3000 </td>
                  </tr>
                  <tr>
                    <td><strong>İndirimli Fiyat</strong></td>
                    <td>:</td>
                    <td><input name="indirim" type="text" id="indirim" size="6" value="<?php echo stripslashes($yaz['indirim']); ?>" /></td>
                  </tr>
                  <tr>
                    <td><strong>Türkçe Ürün Açıklaması</strong></td>
                    <td><strong>:</strong></td>
                    <td><?php $ckeditor->editor('metin',stripslashes($yaz['metin_tr']),$config); ?></td>
                  </tr>
                  <tr>
                    <td><strong>İngilizce Ürün Açıklaması</strong></td>
                    <td><strong>:</strong></td>
                    <td><?php $ckeditor->editor('metin2',stripslashes($yaz['metin_eng']),$config); ?></td>
                  </tr>
                  <tr>
                    <td><strong>Video Embed Kodu</strong></td>
                    <td>:</td>
                    <td><textarea name="video" id="video" cols="90" rows="6"><?php echo stripslashes($yaz['video']); ?></textarea></td>
                  </tr>
                  <tr>
                    <td><strong>Temsili Resim</strong></td>
                    <td><strong>:</strong></td>
                    <td><label for="myfile"></label>
                      <input type="file" name="myfile" id="myfile" /></td>
                  </tr>
                  <tr>
                    <td><strong>Galeri / Doküman</strong></td>
                    <td><strong>:</strong></td>
                    <td align="right"><a class="iptal" href="index.php?page=urun_detay&urun=<?php echo $id; ?>">Bilgileri Düzenlemek İçin TIKLAYINIZ...</a></td>
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

