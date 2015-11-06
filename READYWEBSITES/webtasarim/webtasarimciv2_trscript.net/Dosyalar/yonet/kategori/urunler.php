<?php
include('library/kontrol.php');
$adres=addslashes($_POST['adres']);
$aciklama=addslashes($_POST['aciklama']);

if($_POST['rec']==1)
{
	if(!empty($_FILES['myfile']['name']) && !empty($adres) && $adres!='http://')
	 {
			$dosya->Yukleme_Yeri='../upload/slider/';
			$dosya->success='İşlem Başarılı';
			$calistir=$dosya->dosya_yukle($_FILES['myfile']);
			$sonuc=$dosya->sonuc($calistir);
			$anket_resim_kayit=mysql_query("INSERT INTO banner VALUE(NULL,'".$aciklama."','".$adres."','".$sonuc[0][0]."')");
			echo $islem->islem_sonucu(1,'Banner Başarıyla Sisteme Girilmiştir.'); 
	 }
	 else
	 {
		echo $islem->islem_sonucu(0,'Lütfen Banner Seçimini Yapınız.'); 
	 }
}


#######################################################################################	
if(isset($_GET['sil']) && !empty($_GET['sil']))
{
	$banner_sil=mysql_query("DELETE FROM urunler WHERE id=".$_GET['sil']." LIMIT 1 ");	
	$islem->yonlendir(1,0,'index.php?page=urunler');
}

$query = "SELECT urunler.*,kategori.baslik AS kat_baslik,akat.baslik AS akat_baslik FROM urunler LEFT JOIN kategori ON urunler.kat=kategori.id LEFT JOIN akat ON akat.ana=urunler.akat ORDER BY urunler.kat ASC,urunler.id DESC"; // sql
$sql = mysql_query($query); 
$total_records = mysql_num_rows($sql); // toplam veri sayisi 
$scroll_page = 5; // kaydirilacak sayfa sayisi 
$per_page = 20; // her sayafa gösterilecek sayfa sayisi 
$current_page =$_GET['sayfa']; // bulunulan sayfa 
$pager_url = "index.php?page=urunler&sayfa="; // sayfalamanin yapildigi adres 
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
	  <h2>Ürün Listesi</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 		<form method="post" action="index.php?page=banner">
        <input type="hidden" name="sirala" value="1" />
		  <table><thead><tr>
		  <th width="110">Banner</th>
		  <th>Açıklama</th>
		  <th width="150">Kategori</th>
		  <th width="80">Alt Kategori</th>
		  <th width="80">İşlemler</th></tr></thead><tbody>
	<?php $sorgu=mysql_query($query." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
          					
          <tr><td><a href="../upload/<?php echo $yaz['resim']; ?>"><img src="../upload/thumbs/<?php echo $yaz['resim']; ?>" width="100" style="border:#CCC 1px solid; padding:2px;"/></a></td>
          <td valign="middle"><strong><?php echo stripslashes($yaz['baslik']); ?></strong><br /><?php echo stripslashes($yaz['icerik']); ?></td>
          <td valign="middle"><span class="renk1"><?php echo $yaz['kat_baslik']; ?></span></td>
          <td><span class="renk2"><?php echo $yaz['akat_baslik']; ?></span></td>
          <td>
            <a href="index.php?page=urun_duzenle&id=<?php echo $yaz['id']; ?>"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="Detay" /></a>
            <a href="index.php?page=urunler&sil=<?php echo $yaz['id']; ?>" onClick="return sil_kontrol('Silmek istediğinizden eminmisiniz')">
              <img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" /></a> 
          </td></tr>
          <?php } ?>
         
                  
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

