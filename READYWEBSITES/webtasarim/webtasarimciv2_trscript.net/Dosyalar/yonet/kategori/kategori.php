<?php
include('library/kontrol.php');
$sayfa=intval($_GET['sayfa']);
$id=intval($_GET['sil']);
$query = "SELECT * FROM kategori ORDER BY sira ASC"; // sql 

$sql = mysql_query($query); 
$total_records = mysql_num_rows($sql); // toplam veri sayisi 
$scroll_page = 5; // kaydirilacak sayfa sayisi 
$per_page = 20; // her sayafa gösterilecek sayfa sayisi 
$current_page =$_GET['sayfa']; // bulunulan sayfa 
$pager_url = "index.php?page=kategori&sayfa="; // sayfalamanin yapildigi adres 
$inactive_page_tag = 'class="active"'; // aktif olmayan sayfa linki için biçim 
$previous_page_text = 'Önceki Sayfa' ; // önceki sayfa metni (resim de olabilir <img src="... gibi) 
$next_page_text = 'Sonraki Sayfa' ; // sonraki sayfa metni (resim de olabilir <img src="... gibi) 
$first_page_text = 'İlk Sayfa' ; // ilk sayfa metni (resim de olabilir <img src="... gibi) 
$last_page_text = 'Son Sayfa' ; // son sayfa metni (resim de olabilir <img src="... gibi) 
$kgPagerOBJ = & new kgPager(); 
$kgPagerOBJ -> pager_set($pager_url, $total_records, $scroll_page, $per_page, $current_page, $inactive_page_tag, $previous_page_text, $next_page_text, $first_page_text, $last_page_text, $pager_url_last);

if(isset($_GET['sil']))
{
	$sil=mysql_query("DELETE FROM kategori WHERE id=".intval($_GET['sil'])." LIMIT 1");
	header("Location: index.php?page=kategori");
}

if($_POST['rec']==1)
{
	if(!empty($_POST['baslik']))
	{
		$sira=mysql_real_escape_string($_POST['sira']);
		$baslik=mysql_real_escape_string($_POST['baslik']);
		$baslik2=mysql_real_escape_string($_POST['baslik2']);
	
		$kayit=mysql_query("INSERT INTO kategori VALUES(NULL,'".$sira."','".$baslik."','".$baslik2."')");
	}
}


if($_POST['rec']==2)
{	
		
	$sira=mysql_real_escape_string($_POST['sira']);
	$baslik=mysql_real_escape_string($_POST['baslik']);
	$baslik2=mysql_real_escape_string($_POST['baslik2']);

	$guncelle=mysql_query("UPDATE kategori SET baslik_tr='".$baslik."',baslik_eng='".$baslik2."',sira='".$sira."' WHERE id=".intval($_GET['duzenle'])." LIMIT 1");
	header("Location: index.php?page=kategori");
}

if($_POST['sirala']==1)
{
	$say=count($_POST['sira']);
	for($i=0; $i<=($say-1); $i++)
	{
		
		$sira_guncelle=mysql_query("UPDATE kategori SET sira=".$_POST['sira'][$i]." WHERE id=".$_POST['ids'][$i]."");	
		
	}
}
if(isset($_GET['goster']))
{
	$vitrin_guncelle=mysql_query("UPDATE kategori SET vitrin=".intval($_GET['goster'])." WHERE id=".intval($_GET['id'])." LIMIT 1");	
	header("Location: index.php?page=kategori");
}	
$kat_duzenle=mysql_query("SELECT * FROM kategori WHERE id=".intval($_GET['duzenle'])."");
$cat=mysql_fetch_assoc($kat_duzenle);
?>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Kategori Bilgileri</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 	<form action="" method="post" enctype="multipart/form-data">	
<input type="hidden" name="rec" value="1" />
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>Sıra</strong></td>
    <td><strong>:</strong></td>
    <td><input name="sira" type="text" id="sira" size="3" /></td>
  </tr>
  <tr>
    <td width="150"><strong>Başlık Türkçe</strong></td>
    <td width="5"><strong>:</strong></td>
    <td><input name="baslik" type="text" id="baslik" size="100" /></td>
  </tr>
  <tr>
    <td><strong>Başlık İngilizce</strong></td>
    <td><strong>:</strong></td>
    <td><input name="baslik2" type="text" id="baslik2" size="100" /></td>
  </tr>
  <tr>
    <td width="150">&nbsp;</td>
    <td width="5">&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Kaydet" class="submit" /></td>
  </tr>
</table>
</form>		
<?php if(isset($_GET['duzenle']) && !empty($_GET['duzenle'])) { ?>
 	<form method="post" action="" enctype="multipart/form-data">	
<input type="hidden" name="rec" value="2" />
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>Sıra</strong></td>
    <td><strong>:</strong></td>
    <td><input name="sira" type="text" id="sira" size="3" value="<?php echo $cat['sira']; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Başlık Türkçe</strong></td>
    <td><strong>:</strong></td>
    <td><input name="baslik" type="text" id="baslik5" size="100" value="<?php echo $cat['baslik_tr']; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Başlık İngilizce</strong></td>
    <td><strong>:</strong></td>
    <td><input name="baslik2" type="text" id="baslik4" size="100" value="<?php echo $cat['baslik_eng']; ?>"/></td>
  </tr>
  <tr>
    <td width="150">&nbsp;</td>
    <td width="5">&nbsp;</td>
    <td><input type="submit" name="button3" id="button3" value="Güncelle" class="submit" /></td>
  </tr>
</table>
 	</form>	
<?php } ?>
<form name="siralama" method="post" action="">
<input type="hidden" name="sirala" value="1" />
  <table>
    <thead>
      <tr>
        <th>Başlık Türkçe</th>
        <th>Başlık İngilizce</th>
        <th>Sıralama</th>
        <th>&nbsp;</th>
        <th>İşlemler</th>
      </tr>
    </thead>
    <tbody>
      <?php $sorgu=mysql_query($query." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
	$i=1;
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
      <tr>
        <td><?php echo $yaz['baslik_tr']; ?></td>
        <td><?php echo $yaz['baslik_eng']; ?></td>
        <td>
          <input name="ids[]" type="hidden" id="ids[]" size="2" maxlength="2" value="<?php echo $yaz['id']; ?>" />
          <input name="sira[]" type="text" id="sira[]" size="2" maxlength="2" value="<?php echo $yaz['sira']; ?>" /></td>
        <td>&nbsp;</td>
        <td><a href="index.php?page=kategori&amp;sil=<?php echo $yaz['id']; ?>" onclick="return sil_kontrol('Silmek İstediğinizden Emin misiniz?')"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" /></a> <a href="index.php?page=kategori&amp;duzenle=<?php echo $yaz['id']; ?>"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="Detay" /></a></td>
      </tr>
                <?php } ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3"><input type="submit" name="button2" id="button2" value="Bilgileri Güncelle" class="submit" /></td>
        </tr>

 
    </tbody>
  </table>
</form>
<div class="tab-footer clear"><div class="pager fr">
<?php 
echo '<span class="nav">'; 
echo $kgPagerOBJ -> first_page; 
echo $kgPagerOBJ -> previous_page; 
echo '</span>';
echo '<span class="pages">';
echo $kgPagerOBJ -> page_links; 
echo '</span>';
echo '<span class="nav">'; 
echo $kgPagerOBJ -> next_page; 
echo $kgPagerOBJ -> last_page; 
echo '</span>';
?>
</div></div>
						
</div><!-- /#table -->
				</div> <!-- end of box-body -->
			</div>
</div>   
