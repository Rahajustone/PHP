<?php
include('library/kontrol.php');
$sayfa=intval($_GET['sayfa']);
$id=intval($_GET['tur']);
$durum=intval($_GET['durum']);
###########################################################################################
if(empty($sayfa)) { $sayfa=1; } else { $sayfa=$_GET['sayfa']; }
$query = "SELECT siparis.*,uyes.isim,uyes.id AS uid,vips.baslik FROM siparis INNER JOIN uyes ON siparis.user=uyes.id INNER JOIN vips ON vips.id=siparis.paket 
WHERE siparis.tarih='".date("Y-m-d")."' AND siparis.odeme_turu='".$id."' ORDER BY siparis.onay DESC,id";
$sql = mysql_query($query); 
$total_records = mysql_num_rows($sql); // toplam veri sayisi 
$scroll_page = 5; // kaydirilacak sayfa sayisi 
$per_page = 20; // her sayafa gösterilecek sayfa sayisi 
$current_page =$sayfa; // bulunulan sayfa 
$pager_url = "index.php?page=odeme&tur=".$id."sayfa="; // sayfalamanin yapildigi adres 
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
	$sil=mysql_query("DELETE FROM siparis WHERE id=".$eretna->sayi($_GET['sil'])." LIMIT 1");
	header("Location: index.php?page=odeme&tur=2&sayfa=".$sayfa."");
}
###########################################################################################
function odeme($o)
{
	if($o==1) { echo '<span class="aktif">Kredi Kartı</span>'; } else { echo '<span class="iptal">Havale / Eft</span>'; }	
}
###########################################################################################
if(isset($_GET['onay']) && !empty($_GET['onay']))
{
	$siparis_sorgu=mysql_query("SELECT uyes.bitis_tarihi,uyes.id,vips.sure FROM siparis INNER JOIN uyes ON uyes.id=siparis.user INNER JOIN vips ON vips.id=siparis.paket 
	WHERE siparis.id=".intval($_GET['onay'])." LIMIT 1");
	$siparis=mysql_fetch_assoc($siparis_sorgu);

	if($islem->sure($siparis['bitis_tarihi'])<0) { $sure=0; } else { $sure=$islem->sure($siparis['bitis_tarihi']); }
	$tarih=date("Y-m-d",strtotime("+".($siparis['sure']+$sure)."day"));
	
	$odeme_onayla=mysql_query("UPDATE uyes SET bitis_tarihi='".$tarih."',vip=1 WHERE id=".intval($siparis['id'])." LIMIT 1");
	if($odeme_onayla)
	{
		$aktif_et=mysql_query("UPDATE siparis SET onay=1 WHERE id=".intval($_GET['onay'])." LIMIT 1");
		header("Location: index.php?page=odeme&tur=2&sayfa=".$sayfa."&ok");	
	}
}
###########################################################################################
if(isset($_GET['ok']))
{
	echo $islem->islem_sonucu(1,'Ödeme Onaylama İşlemi Başarıyla Gerçekleşmiştir.');
}
?>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Bugün Gelen Siparişler</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 				<form method="post" action="">
		  <table><thead><tr>
		    <th width="150">Tarih</th>
		    <th>Satın Alınan Paket</th>
		  <th>Üye</th>
		  <th>Banka</th>
		  <th>Ödeme Türü</th>
		  <th>Toplam Tutar</th>
		  <th width="100">Durum</th>
		  <th width="75">İşlemler</th></tr></thead><tbody>
	<?php $sorgu=mysql_query($query." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
          					
          <tr>
            <td><strong><?php echo $islem->tr_tarih($yaz['tarih']); ?></strong></td>
            <td><strong><?php echo $yaz['baslik']; ?></strong></td>
            <td><a href="index.php?page=uye_duzenle&id=<?php echo $yaz['uid']; ?>"><?php echo $yaz['isim']; ?></a></td>
            <td><?php echo $yaz['banka']; ?></td>
            <td><?php odeme($yaz['odeme_turu']); ?></td>
            <td><?php echo $yaz['tutar']; ?> <strong>TL</strong></td>
            <td><?php $islem->odeme_onay($yaz['odeme_turu'],$yaz['onay']); ?></td>
            <td>
            <a href="#" onClick="mesaj('Silmek İstediğizden Eminmisiniz ?','index.php?page=odeme&tur=2&sil=<?php echo $yaz['id']; ?>&sayfa=<?php echo $sayfa; ?>'); return false;">
            <img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" /></a>
            <?php if($yaz['odeme_turu']==2 && $yaz['onay']!=1) { ?>
            <a href="#" onClick="mesaj('Ödemeyi Onaylıyor musunuz ?','index.php?page=odeme&tur=2&onay=<?php echo $yaz['id']; ?>'); return false;"><img src="images/ico_active_16.png" class="icon16 fl-space2" alt="" title="Ödemeyi Onayla" /></a>
            <?php } ?>
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
