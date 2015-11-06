<?php
include('library/kontrol.php');
$kat=intval($_GET['kat']);

if($_POST['rec']==1)
{
	$kat2=mysql_real_escape_string($_POST['kat2']);
	$baslik=mysql_real_escape_string($_POST['baslik']);
	$baslik2=mysql_real_escape_string($_POST['baslik2']);
	$stok=mysql_real_escape_string($_POST['stok']);
	$fiyat=mysql_real_escape_string($_POST['fiyat']);
	$birim=mysql_real_escape_string($_POST['birim']);
	$indirim=mysql_real_escape_string($_POST['indirim']);
	
	$metin=addslashes($_POST['metin']);
	$metin2=addslashes($_POST['metin2']);
	$video=addslashes($_POST['video']);

	
	if(!empty($_POST['baslik']))
	{
		$baslik=mysql_real_escape_string($_POST['baslik']);
		$eresim->succes='Kayıt Başarıyla Yapılmıştır';
		$eresim -> ayarlar('../uploads/','../uploads/thumbs/','300','10000',1);
		$islem2 = $eresim->yukle($_FILES['myfile']);
		$sonuc = $eresim->mesaj($islem2);
	}
	
	$kayit=mysql_query("INSERT INTO urunler VALUE(NULL,'".$kat."','".$kat2."','".$stok."','".$fiyat."','".$indirim."','".$birim."','".$video."','".$baslik."','".$baslik2."','".$metin."','".$metin2."','".$sonuc[0][1]."')");	
	if($kayit) 
	{ 
		echo $islem->islem_sonucu(1,'Ürün Başarıyla Eklenmiştir. Detay Sayfasına Yönlendiriliyorsunuz.');  
		$islem->yonlendir(2,1,'index.php?page=urun_detay&urun='.mysql_insert_id().'');
	}
}

if(!empty($_GET['sil']) && isset($_GET['sil']))
{
	$duyuru_sil=mysql_query("DELETE FROM urunler WHERE id=".intval($_GET['sil'])." LIMIT 1");	
	$islem->yonlendir(1,0,'index.php?page=ekle');
}
?>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />


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
    <td><strong>Kategori</strong></td>
    <td><strong>:</strong></td>
    <td>
      <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('self',this,0)">
        <option value="index.php?page=urun_ekle">Kategori Seçiniz</option>
        <?php 
	  	$kategori_sorgu=mysql_query("SELECT id,baslik_tr FROM kategori ORDER BY sira ASC");
		while($kyaz=mysql_fetch_assoc($kategori_sorgu)) {
	  ?>
        <option value="index.php?page=urun_ekle&kat=<?php echo $kyaz['id']; ?>"<?php if($kat==$kyaz['id']) { echo ' selected="selected"'; }?>><?php echo $kyaz['baslik_tr']; ?></option>
        <?php } ?>
        </select>
      </td>
  </tr>
  <tr>
    <td><strong>Alt Kategori</strong></td>
    <td><strong>:</strong></td>
    <td>
    <select name="kat2" id="kat2">
    <option value="0">Alt Kategori Seçme</option>
      <?php
	  	$kategori_sorgu=mysql_query("SELECT * FROM akat WHERE ana=".$kat." ORDER BY sira ASC");
		while($kyaz=mysql_fetch_assoc($kategori_sorgu))
		{
			echo '<option value="'.$kyaz['id'].'">'.$kyaz['baslik_tr'].'</option>';
		}
	  ?>
    </select></td>
  </tr>
  <tr>
    <td><strong>Türkçe Başlık</strong></td>
    <td><strong>:</strong></td>
    <td><span id="sprytextfield1">
      <input name="baslik" type="text" id="baslik" size="75" />
      </span></td>
  </tr>
  <tr>
    <td><strong>İngilizce Başlık</strong></td>
    <td><strong>:</strong></td>
    <td><span id="sprytextfield2">
      <input name="baslik2" type="text" id="baslik2" size="75" />
    </span></td>
  </tr>
  <tr>
    <td><strong>Stok Kodu</strong></td>
    <td>:</td>
    <td><input type="text" name="stok" id="stok" /></td>
  </tr>
  <tr>
    <td><strong>Fiyat</strong></td>
    <td><strong>:</strong></td>
    <td><input name="fiyat" type="text" id="fiyat" size="6" /> 
      <select name="birim" id="birim">
        <option value="1">TL</option>
        <option value="2">Dolar</option>
        <option value="3">Euro</option>
        <option value="4">Sterlin</option>
        </select>
      <strong> Not: </strong>Fiyat Girerken Nokta veya Virgül Kullanmayınız. Örn:( üç bin tl İçin )  3000 </td>
  </tr>
  <tr>
    <td><strong>İndirimli Fiyat</strong></td>
    <td>:</td>
    <td><input name="indirim" type="text" id="indirim" size="6" /></td>
  </tr>
  <tr>
    <td><strong>Türkçe Ürün Açıklaması</strong></td>
    <td><strong>:</strong></td>
    <td><?php $ckeditor->editor('metin','',$config); ?></td>
  </tr>
  <tr>
    <td><strong>İngilizce Ürün Açıklaması</strong></td>
    <td><strong>:</strong></td>
    <td><?php $ckeditor->editor('metin2','',$config); ?></td>
  </tr>
  <tr>
    <td><strong>Video Embed Kodu</strong></td>
    <td>:</td>
    <td><textarea name="video" id="video" cols="90" rows="6"></textarea></td>
  </tr>
  <tr>
    <td><strong>Temsili Resim</strong></td>
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
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
