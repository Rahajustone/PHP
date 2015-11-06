<?php
include('library/kontrol.php');
$sayfa=intval($_GET['sayfa']);
$id=intval($_GET['sil']);
$durum=intval($_GET['durum']);

$query = "SELECT * FROM ortaks ORDER BY id DESC"; // sql 

$sql = mysql_query($query); 
$total_records = mysql_num_rows($sql); // toplam veri sayisi 
$scroll_page = 5; // kaydirilacak sayfa sayisi 
$per_page = 10; // her sayafa gösterilecek sayfa sayisi 
$current_page =$_GET['sayfa']; // bulunulan sayfa 
$pager_url = "index.php?page=dliste&sayfa="; // sayfalamanin yapildigi adres 
$inactive_page_tag = 'class="active"'; // aktif olmayan sayfa linki için biçim 
$previous_page_text = 'Önceki Sayfa' ; // önceki sayfa metni (resim de olabilir <img src="... gibi) 
$next_page_text = 'Sonraki Sayfa' ; // sonraki sayfa metni (resim de olabilir <img src="... gibi) 
$first_page_text = 'İlk Sayfa' ; // ilk sayfa metni (resim de olabilir <img src="... gibi) 
$last_page_text = 'Son Sayfa' ; // son sayfa metni (resim de olabilir <img src="... gibi) 
$kgPagerOBJ = & new kgPager(); 
$kgPagerOBJ -> pager_set($pager_url, $total_records, $scroll_page, $per_page, $current_page, $inactive_page_tag, $previous_page_text, $next_page_text, $first_page_text, $last_page_text, $pager_url_last);

if(isset($_GET['sil']))
{
	$islem->host_resim('ortaks',$eretna->sayi($_GET['sil']),'../uploads/','../uploads/thumbs/');
	$sil=mysql_query("DELETE FROM ortaks WHERE id=".$eretna->sayi($_GET['sil'])." LIMIT 1");
	header("Location: index.php?page=dliste");
}
?>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Distribütör Listesi</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 				<form method="post" action="">
		  <table><thead><tr>
		  <th width="85">Resim</th>
		  <th>Başlık Türkçe</th>
		  <th>Başlık İngilizce</th>
		  <th>İşlemler</th></tr></thead><tbody>
	<?php $sorgu=mysql_query($query." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
          					
     <tr>
     <td><a href="../uploads/<?php echo $yaz['resim']; ?>"><img src="../uploads/thumbs/<?php echo $yaz['logo']; ?>" width="75" style="border:#CCC 1px solid; padding:2px;"/></a></td>
     <td><?php echo $yaz['baslik_tr']; ?></td>
     <td><?php echo $yaz['baslik_eng']; ?></td>
      <td>
        <a href="index.php?page=dliste&sil=<?php echo $yaz['id']; ?>" onClick="return sil_kontrol('Silmek istediğinizden eminmisiniz')">
          <img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" />
          </a> 
        <a href="index.php?page=dist_duzenle&id=<?php echo $yaz['id']; ?>"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="Detay" /></a></td></tr>
         
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
