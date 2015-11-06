<?php
include('library/kontrol.php');
$id=intval($_GET['id']);
$kat=$eretna->escape($_POST['kat']);
$baslik=$eretna->escape($_POST['baslik']);
$alan=$eretna->escape($_POST['alan']);
$oda=$eretna->escape($_POST['oda']);
$aciklama=$eretna->escape($_POST['aciklama']);
$akat=$eretna->escape($_POST['kat2']);

if($_POST['rec']==1)
{
	
		if(!empty($_FILES['myfile']['name']) && $_POST['foto_gun']==1)
		{
			$eresim->succes='Kayıt Başarıyla Yapılmıştır';
			$eresim -> ayarlar('../upload/','../upload/thumbs/','400','5000',1);
			$islem2 = $eresim->yukle($_FILES['myfile']);
			$sonuc = $eresim->mesaj($islem2);
			if($sonuc[0][2]==1) { 
				$resim_sorgu=",resim='".$sonuc[0][1]."'";
			}
			else
			{
				echo $islem->islem_sonucu(0,$sonuc[0][0]);	
			}
		}

		### RESİM EKLENİYOR ###
		$urun_ekle=mysql_query("UPDATE urunler SET kat='".$kat."',akat='".$akat."',baslik='".$baslik."',icerik='".$aciklama."',kalani='".$alan."',osayisi='".$oda."'".$resim_sorgu." WHERE id=".$id." LIMIT 1");	
		
		echo $islem->islem_sonucu(1,'Ürün Bilgileri Başarıyla Güncellenmiştir');
	
}
#######################################################################################################
if(!empty($_FILES['myfile2']['name']) && $_POST['galeri']==1)
{
	$eresim->succes='Kayıt Başarıyla Yapılmıştır';
	$eresim -> ayarlar('../upload/','../upload/thumbs/','400','5000',1);
	$islem2 = $eresim->yukle($_FILES['myfile2']);
	$sonuc = $eresim->mesaj($islem2);
	if($sonuc[0][2]==1) { 
		$resim_ekle=mysql_query("INSERT INTO galeri VALUES(NULL,1,'".$id."','".$sonuc[0][1]."')");
	}
	else
	{
		echo $islem->islem_sonucu(0,$sonuc[0][0]);	
	}
}
#######################################################################################################
if(isset($_GET['sil']) && !empty($_GET['sil']))
{
	$islem->host_resim('galeri',intval($_GET['sil']),'../upload/','../upload/thumbs/');
	$resim_sil=mysql_query("DELETE FROM galeri WHERE id=".intval($_GET['sil'])." LIMIT 1");
	header("Location: index.php?page=urun_duzenle&id=".$id."");
}
#######################################################################################################
$urun_sorgu=mysql_query("SELECT * FROM urunler WHERE id=".$id." LIMIT 1");
$yaz=mysql_fetch_assoc($urun_sorgu);
?>

<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Ürün  Ekle</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 	<form action="" method="post" enctype="multipart/form-data"  name="urun_ekle" id="urun_ekle">	
<input type="hidden" name="rec" value="1" />
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>Ürün Vitrin Resmi</strong></td>
    <td><strong>:</strong></td>
    <td width="451"><a href="../upload/<?php echo $yaz['resim']; ?>"><img src="../upload/thumbs/<?php echo $yaz['resim']; ?>" width="150" style="border:#CCC 1px solid; padding:2px;" /></a></td>
  </tr>
  <tr>
    <td width="120"><strong>Kategori</strong></td>
    <td><strong>:</strong></td>
    <td>
    <select name="kat" id="kat">
          <?php
	  	$kategori_sorgu=mysql_query("SELECT * FROM kategori ORDER BY siralama ASC");
		while($kyaz=mysql_fetch_assoc($kategori_sorgu))
		{
			if($yaz['kat']==$kyaz['id']) { $s='selected="selected"'; } else { $s=''; }
			echo '<option value="'.$kyaz['id'].'" '.$s.'>'.$kyaz['baslik'].'</option>';
		}
	  ?>
    </select></td>
  </tr>
  <?php if(isset($_GET['id'])) { ?>
  <tr>
    <td><strong>Alt Kategori</strong></td>
    <td><strong>:</strong></td>
    <td><select name="kat2" id="kat2">
      <?php
	  	$kategori_sorgu=mysql_query("SELECT * FROM akat WHERE ana=".$yaz['kat']." ORDER BY sira ASC");
		while($kyaz=mysql_fetch_assoc($kategori_sorgu))
		{
			if($yaz['akat']==$kyaz['id']) { $s='selected="selected"'; } else { $s=''; }
			echo '<option value="'.$kyaz['id'].'" '.$s.'>'.$kyaz['baslik'].'</option>';
		}
	  ?>
    </select></td>
  </tr>
  <tr>
    <td><strong>Başlık</strong></td>
    <td><strong>:</strong></td>
    <td><input name="baslik" type="text" id="baslik" size="75" value="<?php echo $yaz['baslik']; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Kullanım Alanı</strong></td>
    <td><strong>:</strong></td>
    <td><input name="alan" type="text" id="alan" size="4" maxlength="4" value="<?php echo $yaz['kalani']; ?>" />
      <sub>m</sub>2</td>
  </tr>
  <tr>
    <td><strong>Oda Sayısı</strong></td>
    <td><strong>:</strong></td>
    <td><input name="oda" type="text" id="oda" size="2" maxlength="2" value="<?php echo $yaz['osayisi']; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Açıklama</strong></td>
    <td><strong>:</strong></td>
    <td><?php $ckeditor->editor('aciklama',stripslashes($yaz['icerik']),$config); ?></td>
  </tr>
  <tr>
    <td><strong>Resim Ekle</strong></td>
    <td><strong>:</strong></td>
    <td><input type="file" name="myfile" id="myfile" />
      <input name="foto_gun" type="checkbox" id="foto_gun" value="1" />
      <label for="foto_gun">Resimi Güncelle</label></td>
  </tr>
  <tr>
    <td width="120"></td>
    <td width="5"></td>
    <td><input type="submit" name="button2" id="button2" value="Bilgiler Güncelle" class="submit" /></td>
  </tr>
  <?php } ?>
  </table>
    </form>
  		  </div><!-- /#table -->
	 </div> <!-- end of box-body -->
  </div>
</div>
<div class="page clear">
  <div class="content-box">
    <div class="box-header clear">
      <h2>Ürüne Ait Fotoğraflar</h2>
    </div>
    <div class="box-body clear">
      <div id="table2">
      <form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
      <input type="hidden" name="galeri" value="1" />
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><strong>Resim Seç:</strong>
              
                <input type="file" name="myfile2" id="myfile2" />
              <input type="submit" name="button" id="button" value="Yükle" class="submit" /></td>
          </tr>
          <tr>
            <td>
			<?php
			$galeri_sorgu=mysql_query("SELECT * FROM galeri WHERE icerik=".$id." AND kat=1 ORDER BY id DESC");
			while($galeri=mysql_fetch_assoc($galeri_sorgu)){
			?>
           <div style="margin:5px; float:left; border:#CCC 1px solid; padding:5px;" align="center"> 
           <a href="../upload/<?php echo $galeri['resim']; ?>"><img src="../upload/thumbs/<?php echo $galeri['resim']; ?>" class="thumb size64" /></a> 
           <a href="index.php?page=urun_duzenle&id=<?php echo $id;?>&sil=<?php echo $galeri['id']; ?>" onclick="return sil_kontrol();"><img src="images/ico_delete_16.png" style="margin:5px;"  align="absmiddle"/></a>
           </div>
          <?php } ?>
          </td>
          </tr>
        </table>
         </form>
      </div>
      <!-- /#table -->
    </div>
    <!-- end of box-body -->
  </div>
</div>
