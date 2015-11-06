<?php
include('library/kontrol.php');
$adres=addslashes($_POST['adres']);
$baslik=addslashes($_POST['baslik']);
$metin=addslashes($_POST['metin']);
$durum=intval($_POST['durum']);
$sira=intval($_POST['sira']);
$tarih=date("Y-m-d");

if($_POST['rec']==1)
{
	if(!empty($_FILES['myfile']['name']) && !empty($baslik))
	 {
			$dosya->Yukleme_Yeri='../upload/';
			$dosya->success='İşlem Başarılı';
			$calistir=$dosya->dosya_yukle($_FILES['myfile']);
			$sonuc=$dosya->sonuc($calistir);
			$anket_resim_kayit=mysql_query("INSERT INTO kategori VALUE(NULL,'".$sira."','".$baslik."','".$sonuc[0][0]."')");
			echo $islem->islem_sonucu(1,'Kategori Başarıyla Sisteme Girilmiştir.'); 
			$islem->yonlendir(2,1,'index.php?page=kategori');
	 }
	 else
	 {
		echo $islem->islem_sonucu(0,'Lütfen Resim Seçimini Yapınız.'); 
	 }
}
#######################################################################################	
if($_POST['sirala']==1)
{
	$ssay=count($_POST['sira']);
	for($i=0; $i<$ssay; $i++)
	{
		$sira_guncelle=mysql_query("UPDATE kategori SET sira=".$_POST['sira'][$i]." WHERE id=".$_POST['siraid'][$i]."");
	}
}
#######################################################################################	
if(isset($_GET['sil']) && !empty($_GET['sil']))
{
	$banner_sil=mysql_query("DELETE FROM kategori WHERE id=".$_GET['sil']." LIMIT 1 ");	
	$islem->yonlendir(1,0,'index.php?page=kategori');
}

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
?>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Yeni Kayıt</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
            <form action="" method="post"  name="form1" enctype="multipart/form-data">
            <input type="hidden" name="rec" value="1" />
		  <table>
          <tr>
            <td width="20%"><strong>Sıra</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td><input name="sira" type="text" id="sira" size="5" maxlength="5" /></td>
          </tr>
          <tr>
            <td><strong>Başlık</strong></td>
            <td><strong>:</strong></td>
            <td><input name="baslik" type="text" id="baslik" size="50" value="<?php echo $_POST['baslik']; ?>" /></td>
          </tr>
          <tr>
            <td><strong>Dosya Seç</strong></td>
            <td><strong>:</strong></td>
            <td><input type="file" name="myfile" id="myfile" /> 
              <span class="iptal">Dikkat: </span> <span class="aktif">Resim Ebatı 230px * 261px Olmalıdır.</span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="Ekle"  class="submit" /></td>
          </tr>
        
		  </table>
			</form>
     </div><!-- /#table --></div> <!-- end of box-body -->
  </div>
</div>


<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Sisteme Kayıtlı Kategoriler</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 		<form method="post" action="index.php?page=kategori">
        <input type="hidden" name="sirala" value="1" />
		  <table><thead><tr>
		  <th width="105">Resim</th>
		  <th>Başlık</th>
		  <th>Sıra</th>
		  <th>İşlemler</th></tr></thead><tbody>
	<?php $sorgu=mysql_query($query." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
          					
          <tr><td><a href="../upload/<?php echo $yaz['resim']; ?>"><img src="../upload/<?php echo $yaz['resim']; ?>" width="100" style="border:#CCC 1px solid; padding:2px;"/></a></td>
          <td valign="middle"><?php echo $yaz['baslik']; ?></td>
          <td>
            <input type="hidden" name="siraid[]" id="siraid[]" value="<?php echo $yaz['id']; ?>" />
            <input name="sira[]" type="text" id="sira[]" size="2" maxlength="5" value="<?php echo $yaz['sira']; ?>" />
          </td>
		  <td><a href="index.php?page=kategori_duzenle&id=<?php echo $yaz['id']; ?>"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="Detay" /></a>
          <a href="index.php?page=kategori&sil=<?php echo $yaz['id']; ?>" onClick="return sil_kontrol('Silmek istediğinizden eminmisiniz')">
          <img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" /></a> 
          </td></tr>
          <?php } ?>  
          <tr>
            <td align="right">&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="left"><input type="submit" name="button2" id="button2" value="Sıralamayı Güncelle" class="submit" /></td>
            <td align="right">&nbsp;</td>
            </tr>
         
                  
		  </tbody></table>
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

