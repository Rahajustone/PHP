<?php
include('library/kontrol.php');
$sayfa=intval($_GET['sayfa']);
if(empty($sayfa)) { $sayfa=1; } else { $sayfa=$_GET['sayfa']; }
if($_POST['rec']==1) {

$baslangic=$eretna->escape($_POST['baslangic']);
$bitis=$eretna->escape($_POST['bitis']);
$onay=$eretna->escape($_POST['onay']);

$_SESSION['baslangic']=$baslangic;
$_SESSION['bitis']=$bitis;
$_SESSION['onay']=$onay;

	if( ( empty($baslangic) || empty($bitis)) && $onay=='')
	{
		echo $islem->islem_sonucu(0,'Lütfen En Az Bir Kriter Seçiniz.');
	}


}	

	if(( empty($_SESSION['baslangic']) || empty($_SESSION['bitis'])) && $_SESSION['onay']=='')
	{
		$durum=1;
	}
	else
	{
		if(!empty($_SESSION['baslangic']) || !empty($_SESSION['bitis'])) {$sorgu1=" AND tarih BETWEEN '".$_SESSION['baslangic']."' AND '".$_SESSION['bitis']."' ";}
		 else { $sorgu1=''; }
		if($_SESSION['onay']!='')	{ $sorgu2=" WHERE onay=".$_SESSION['onay']." "; } else { $sorgu2="WHERE onay IN(1,0) "; }	
		$durum=2;
	}
	$genel_sorgu=$sorgu2.$sorgu1;

@$query = "SELECT * FROM siparis  ".$genel_sorgu."  ORDER BY id DESC"; 
$sql = @mysql_query($query); 
$total_records = @mysql_num_rows($sql); // toplam veri sayisi 
$scroll_page = 5; // kaydirilacak sayfa sayisi 
$per_page = 20; // her sayafa gösterilecek sayfa sayisi 
$current_page =$sayfa; // bulunulan sayfa 
$pager_url = "index.php?page=arama&sayfa="; // sayfalamanin yapildigi adres 
$inactive_page_tag = 'class="active"'; // aktif olmayan sayfa linki için biçim 
$previous_page_text = 'Önceki Sayfa' ; // önceki sayfa metni (resim de olabilir <img src="... gibi) 
$next_page_text = 'Sonraki Sayfa' ; // sonraki sayfa metni (resim de olabilir <img src="... gibi) 
$first_page_text = 'İlk Sayfa' ; // ilk sayfa metni (resim de olabilir <img src="... gibi) 
$last_page_text = 'Son Sayfa' ; // son sayfa metni (resim de olabilir <img src="... gibi) 
$kgPagerOBJ = & new kgPager(); 
$kgPagerOBJ -> pager_set($pager_url, $total_records, $scroll_page, $per_page, $current_page, $inactive_page_tag, $previous_page_text, $next_page_text, $first_page_text, $last_page_text, $pager_url_last);


if(isset($_GET['sil']) && !empty($_GET['sil']))
{
	$kayit_sil=mysql_query("DELETE FROM siparis WHERE id=".intval($_GET['sil'])." LIMIT 1");
	header("Location: index.php?page=arama&sayfa=".$_GET['sayfa']);	
}
?>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Sipariş Arama</h2></div>
    	<div class="box-body clear">
	  		<div id="table">       
          <form action="" method="post" name="hesapno">
          <input type="hidden"  name="rec" value="1" />
          <table border="0" cellspacing="0" cellpadding="0"><thead><tr>
    <td>Arama Kriterleri</td>
    </tr>
          </thead>
  <tr>
    <td height="45" valign="middle">
      Başlangıç Tarihi :
<input name="baslangic" type="text" id="datepicker" size="15" value="<?php echo $_SESSION['baslangic']; ?>" />
 Bitiş Tarihi :  <input name="bitis" type="text"  id="datepicker2" size="15"  value="<?php echo $_SESSION['bitis']; ?>" />
 
 Onay Durumu: 
 <select name="onay" id="onay">
 	<option value="" <?php if($_SESSION['onay']=='') { echo 'selected="selected"'; } else { echo ''; } ?>>Tümü</option>
   <option value="1" <?php if($_SESSION['onay']==1) { echo 'selected="selected"'; } else { echo ''; } ?> >Onaylı</option>
   <option value="0" <?php if($_SESSION['onay']=='0') { echo 'selected="selected"'; } else { echo ''; }?>>Onaysız</option>
 </select> <input type="submit" name="gonder2" id="gonder2" value="Sonuçları Getir" class="submit" /> </td>
  </tr>
  </table>
          </form>
  <?php if($durum==2) { ?>
  <table>
    <thead>
      <tr>
        <th width="150">Tarih</th>
        <th>Toplam Ürün</th>
        <th>Firma</th>
        <th>İsim</th>
        <th>Telefon</th>
        <th width="100">Durum</th>
        <th width="100">İşlemler</th>
      </tr>
    </thead>
    <tbody>
      <?php $sorgu=mysql_query($query." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
      <tr>
        <td><strong><?php echo $islem->tr_tarih($yaz['tarih']); ?> <?php echo $yaz['saat']; ?></strong></td>
        <td><strong><?php echo $yaz['toplam']; ?> Adet</strong></td>
        <td><?php echo $yaz['firma']; ?></td>
        <td><?php echo $yaz['isim']; ?></td>
        <td><?php echo $yaz['telefon']; ?></td>
        <td class="iptal">Onay Bekliyor</td>
        <td><a href="index.php?page=siparis&amp;sil=<?php echo $yaz['id']; ?>" onclick="return sil_kontrol('Silmek istediğinizden eminmisiniz')"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" /></a> <a href="#" onclick="mesaj('Siparişi Onaylıyor musunuz ?','index.php?page=siparis&amp;onay=<?php echo $yaz['id']; ?>'); return false;"><img src="images/ico_active_16.png" class="icon16 fl-space2" alt="" title="Siparişi Onayla" /></a> <a href="index.php?page=siparis_detay&amp;id=<?php echo $yaz['id']; ?>"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="Detay" /></a></td>
      </tr>
      <?php } ?>
    </tbody>
</table>
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
<?php } ?>
