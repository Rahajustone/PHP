<?php
include('library/kontrol.php');
$sayfa=intval($_GET['sayfa']);
$id=intval($_GET['sil']);
$durum=intval($_GET['durum']);

$query = "SELECT urunler.*,kategori.baslik_tr AS kbaslik,akat.baslik_tr AS abaslik FROM urunler LEFT JOIN kategori ON kategori.id=urunler.kat LEFT JOIN akat ON urunler.akat=akat.id  ORDER BY urunler.kat ASC,urunler.baslik_tr ASC"; // sql 

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

if(isset($_GET['sil']))
{
	$sil=mysql_query("DELETE FROM urunler,galeri,dokuman,siparis_urun USING urunler 
	LEFT JOIN galeri ON ( galeri.icerik=urunler.id AND galeri.kat=2 )
	LEFT JOIN dokuman ON dokuman.urun=urunler.id 
	LEFT JOIN siparis_urun ON ( siparis_urun.urun=urunler.id AND siparis_urun.kat=1 )
	WHERE urunler.id=".$eretna->sayi($_GET['sil'])."");
	header("Location: index.php?page=urunler");
}
?>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Ürün Listesi</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 				<form method="post" action="">
		  <table><thead><tr>
		  <th width="105">Resim</th>
		  <th>Kategori</th>
		  <th>Alt Kategori</th>
		  <th>Başlık</th>
		  <th>Stok Kodu</th>
		  <th>Fiyat</th>
		  <th>İndirimli Fiyat</th>
		  <th>İşlemler</th></tr></thead><tbody>
	<?php $sorgu=mysql_query($query." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
          					
          <tr><td><a href="../uploads/<?php echo $yaz['resim']; ?>"><img src="../uploads/thumbs/<?php echo $yaz['resim']; ?>" width="50" height="50" style="border:#CCC 1px solid; padding:2px;"/></a></td>
           <td class="aktif"><?php echo $yaz['kbaslik']; ?></td>
            <td><?php if(!empty($yaz['abaslik'])) echo '<span class="onayli">'.$yaz['abaslik'].'</span>'; else '<span class="iptal">Alt Kategori Seçilmemiş</span>'; ?></td>
            <td><strong><?php echo $yaz['baslik_tr']; ?></strong></td><td><?php echo $yaz['stok']; ?></td>
            <td><?php echo $yaz['fiyat']; ?></td>
            <td><?php echo $yaz['indirim']; ?></td>
		  <td>
          <a href="index.php?page=urunler&sil=<?php echo $yaz['id']; ?>" onClick="return sil_kontrol('Silmek istediğinizden eminmisiniz')">
          <img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" />
          </a> 
          <a href="index.php?page=urun_duzenle&id=<?php echo $yaz['id']; ?>"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="Detay" /></a>
          <a href="index.php?page=urun_detay&urun=<?php echo $yaz['id']; ?>"><img src="images/note.png" class="icon16 fl-space2" alt="" title="Galeri / Dokümanlar" /></a>
          </td></tr>
         
      <?php } ?>              
		  </tbody></table>
						
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
						</form>
					</div><!-- /#table -->
				</div> <!-- end of box-body -->
			</div>
</div>   
