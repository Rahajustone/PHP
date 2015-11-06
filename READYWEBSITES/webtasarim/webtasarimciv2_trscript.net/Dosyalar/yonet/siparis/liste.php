<?php
include('library/kontrol.php');
$sayfa=intval($_GET['sayfa']);
$id=intval($_GET['sil']);
$durum=intval($_GET['durum']);

if(empty($sayfa)) { $sayfa=1; } else { $sayfa=$_GET['sayfa']; }
$query = "SELECT * FROM siparis WHERE onay!=1 ORDER BY id DESC";
$sql = mysql_query($query); 
$total_records = mysql_num_rows($sql); // toplam veri sayisi 
$scroll_page = 5; // kaydirilacak sayfa sayisi 
$per_page = 20; // her sayafa gösterilecek sayfa sayisi 
$current_page =$sayfa; // bulunulan sayfa 
$pager_url = "index.php?page=siparis&sayfa="; // sayfalamanin yapildigi adres 
$inactive_page_tag = 'class="active"'; // aktif olmayan sayfa linki için biçim 
$previous_page_text = 'Önceki Sayfa' ; // önceki sayfa metni (resim de olabilir <img src="... gibi) 
$next_page_text = 'Sonraki Sayfa' ; // sonraki sayfa metni (resim de olabilir <img src="... gibi) 
$first_page_text = 'İlk Sayfa' ; // ilk sayfa metni (resim de olabilir <img src="... gibi) 
$last_page_text = 'Son Sayfa' ; // son sayfa metni (resim de olabilir <img src="... gibi) 
$kgPagerOBJ = & new kgPager(); 
$kgPagerOBJ -> pager_set($pager_url, $total_records, $scroll_page, $per_page, $current_page, $inactive_page_tag, $previous_page_text, $next_page_text, $first_page_text, $last_page_text, $pager_url_last);
###########################################################################################
if(isset($_GET['sil']))
{
	$sil=mysql_query("DELETE FROM siparis,siparis_urun USING siparis LEFT JOIN siparis_urun ON 	siparis.id=siparis_urun.siparis_no WHERE siparis.id=".$eretna->sayi($_GET['sil'])."");
	header("Location: index.php?page=siparis");
}
###########################################################################################
if(isset($_GET['onay']) && !empty($_GET['onay']))
{
	$aktif_et=mysql_query("UPDATE siparis SET onay=1 WHERE id=".intval($_GET['onay'])." LIMIT 1");
	header("Location: index.php?page=siparis&sayfa=".$sayfa."&ok");	
}
###########################################################################################
if(isset($_GET['ok']))
{
	echo $islem->islem_sonucu(1,'Sipariş Onaylama İşlemi Başarıyla Gerçekleşmiştir.');
}
?>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Onaylanmamış Gelen Siparişler</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 				<form method="post" action="">
		  <table><thead><tr>
		    <th width="150">Tarih</th>
		    <th>Toplam Ürün</th>
		  <th>Firma</th>
		  <th>İsim</th>
		  <th>Telefon</th>
		  <th width="100">Durum</th>
		  <th width="100">İşlemler</th></tr></thead><tbody>
	<?php $sorgu=mysql_query($query." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
          					
          <tr>
            <td><strong><?php echo $islem->tr_tarih($yaz['tarih']); ?> <?php echo $yaz['saat']; ?></strong></td>
            <td><strong><?php echo $yaz['toplam']; ?> Adet</strong></td>
            <td><?php echo $yaz['firma']; ?></td>
            <td><?php echo $yaz['isim']; ?></td>
            <td><?php echo $yaz['telefon']; ?></td>
            <td class="iptal">Onay Bekliyor</td>
            <td>
            <a href="index.php?page=siparis&sil=<?php echo $yaz['id']; ?>" onClick="return sil_kontrol('Silmek istediğinizden eminmisiniz')"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" /></a>
            <a href="#" onClick="mesaj('Siparişi Onaylıyor musunuz ?','index.php?page=siparis&onay=<?php echo $yaz['id']; ?>'); return false;"><img src="images/ico_active_16.png" class="icon16 fl-space2" alt="" title="Siparişi Onayla" /></a>
            <a href="index.php?page=siparis_detay&id=<?php echo $yaz['id']; ?>"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="Detay" /></a>
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
