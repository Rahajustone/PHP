<?php
include('library/kontrol.php');
$kat=intval($_GET['id']);
$baslik=$eretna->escape($_POST['baslik']);
$alan=$eretna->escape($_POST['alan']);
$oda=$eretna->escape($_POST['oda']);
$aciklama=$eretna->escape($_POST['aciklama']);
$akat=$eretna->escape($_POST['kat2']);
if($_POST['rec']==1)
{
	
		if(!empty($_FILES['myfile']['name']))
		{
			$eresim->succes='Kayıt Başarıyla Yapılmıştır';
			$eresim -> ayarlar('../upload/','../upload/thumbs/','400','5000',1);
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

		### RESİM EKLENİYOR ###
		$urun_ekle=mysql_query("INSERT INTO urunler VALUES(NULL,'".$kat."','".$akat."','".$baslik."','".$aciklama."','".$alan."','".$oda."','".$sonuc[0][1]."')");	
		
		echo $islem->islem_sonucu(1,'Ürün Başarıyla Kaydedilmiştir. Detay Sayfasına Yönlendiriliyorsunuz');
		$islem->yonlendir(2,2,'index.php?page=urun_duzenle&id='.mysql_insert_id());
	
}

?>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>

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
    <th width="120">Ürün Bilgileri</th>
    <th width="5"></th>
    <th width="451">&nbsp;</th>
    </tr>
  <tr>
    <td width="120"><strong>Kategori</strong></td>
    <td><strong>:</strong></td>
    <td>
    <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('self',this,0)">
    <option value="index.php?page=urun_ekle">Kategori Seçiniz</option>
          <?php
	  	$kategori_sorgu=mysql_query("SELECT * FROM kategori ORDER BY siralama ASC");
		while($kyaz=mysql_fetch_assoc($kategori_sorgu))
		{
			if($kat==$kyaz['id']) { $s='selected="selected"'; } else { $s=''; }
			echo '<option value="index.php?page=urun_ekle&id='.$kyaz['id'].'" '.$s.'>'.$kyaz['baslik'].'</option>';
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
	  	$kategori_sorgu=mysql_query("SELECT * FROM akat WHERE ana=".$kat." ORDER BY sira ASC");
		while($kyaz=mysql_fetch_assoc($kategori_sorgu))
		{
			echo '<option value="'.$kyaz['id'].'">'.$kyaz['baslik'].'</option>';
		}
	  ?>
    </select></td>
  </tr>
  <tr>
    <td><strong>Başlık</strong></td>
    <td><strong>:</strong></td>
    <td><input name="baslik" type="text" id="baslik" size="75" /></td>
  </tr>
  <tr>
    <td><strong>Kullanım Alanı</strong></td>
    <td><strong>:</strong></td>
    <td><input name="alan" type="text" id="alan" size="4" maxlength="4" />
      <sub>m</sub>2</td>
  </tr>
  <tr>
    <td><strong>Oda Sayısı</strong></td>
    <td><strong>:</strong></td>
    <td><input name="oda" type="text" id="oda" size="2" maxlength="2" /></td>
  </tr>
  <tr>
    <td><strong>Açıklama</strong></td>
    <td><strong>:</strong></td>
    <td><?php $ckeditor->editor('aciklama','',$config); ?></td>
  </tr>
  <tr>
    <td><strong>Resim Ekle</strong></td>
    <td><strong>:</strong></td>
    <td><input type="file" name="myfile" id="myfile" /></td>
  </tr>
  <tr>
    <td width="120"></td>
    <td width="5"></td>
    <td><input type="submit" name="button2" id="button2" value="Bilgileri Kaydet" class="submit" /></td>
  </tr>
  <?php } ?>
  </table>
    </form>
  		  </div><!-- /#table -->
				</div> <!-- end of box-body -->
			</div>
</div>
