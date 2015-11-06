<?php
include('library/kontrol.php');
$id=intval($_GET['id']);

if(!empty($_GET['sil']) && $_GET['sil']=='ok')
{
	$duyuru_sil=mysql_query("DELETE FROM siparis WHERE id=".intval($_GET['id'])." LIMIT 1");	
	$islem->yonlendir(1,0,'index.php?page=siparis');
}

if(isset($_GET['onay']) && $_GET['onay']==1)
{
	$guncelle=mysql_query("UPDATE siparis SET onay=1 WHERE id=".intval($_GET['id'])." LIMIT 1");	
	$islem->yonlendir(1,0,'index.php?page=siparis_detay&id='.$id);
}

if(isset($_GET['onay']) && $_GET['onay']==2)
{
	$guncelle=mysql_query("UPDATE siparis SET onay=0 WHERE id=".intval($_GET['id'])." LIMIT 1");		
	$islem->yonlendir(1,0,'index.php?page=siparis_detay&id='.$id);
}
$urun_sorgu=mysql_query("SELECT * FROM siparis WHERE id=".$id." LIMIT 1");
$yaz=mysql_fetch_assoc($urun_sorgu);
?>
<style type="text/css">
.page.clear .content-box .box-body.clear #table table td {
	font-weight: bold;
}
</style>

<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Sipariş Bilgileri</h2>
	</div>
    	<div class="box-body clear">
	  		<div id="table">
                <table>
  <tr>
    <td>Sipariş Durumu</td>
    <td>:</td>
    <td><?php if($yaz['onay']==0) echo '<span class="iptal">Onay Bekliyor</span>'; else echo '<span class="onayli">Onaylandi</span>'; ?></td>
  </tr>
  <tr>
    <td width="200"><strong>Sipariş No</strong></td>
    <td width="5"><strong>:</strong></td>
    <td><?php echo $yaz['id']; ?></td>
  </tr>
  <tr>
    <td><strong>Sipariş Tarihi</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $islem->tr_tarih($yaz['tarih']); ?> <?php echo $yaz['saat']; ?></td>
  </tr>
  <tr>
    <td><strong>Sipariş Verilen IP</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $yaz['ip']; ?></td>
  </tr>
  <tr>
    <td><strong>Firma </strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $yaz['firma']; ?></td>
  </tr>
  <tr>
    <td><strong>İsim</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $yaz['isim']; ?></td>
  </tr>
  <tr>
    <td><strong>Telefon</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $yaz['telefon']; ?></td>
  </tr>
  <tr>
    <td><strong>Gsm</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $yaz['gsm']; ?></td>
  </tr>
  <tr>
    <td><strong>Fax</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $yaz['fax']; ?></td>
  </tr>
  <tr>
    <td><strong>E-Posta</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $yaz['eposta']; ?></td>
  </tr>
  <tr>
    <td><strong>Adres</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $yaz['adres']; ?></td>
  </tr>
  <tr>
    <td><strong>Sipariş Mesajı</strong></td>
    <td><strong>:</strong></td>
    <td><?php echo $yaz['mesaj']; ?></td>
  </tr>
                </table>
    <table>
      <tr>
        <td width="100"><strong>Türü</strong></td>
        <td><strong>Ürün Adı</strong></td>
        <td><strong>Adeti</strong></td>
        </tr>
  		<?php 
			$siparis_sorgu=mysql_query("SELECT * FROM siparis_urun WHERE siparis_no=".$id." ORDER BY kat ASC"); 
			while($siparis=mysql_fetch_assoc($siparis_sorgu))
			{
		?>    
      <tr>
        <td><?php if($siparis['kat']==1) echo '<span class="aktif">Ürün</span>'; else echo '<span class="onayli">Komponent</span>'; ?></td>
        <td><?php $islem->siparis_urun($siparis['kat'],$siparis['urun']); ?></td>
        <td><?php echo $siparis['adet']; ?> Adet</td>
        </tr>
      <?php } ?>
    </table>
    <table>
      <tr>
        <td>Durum Aktif / Pasif<strong></strong></td>
        <td>Siparişi Sistemden Sil</td>
        <td>Siparişi Excele Aktar</td>
        </tr>

      <tr>
        <td>
        <?php if($yaz['onay']==0) { ?>
        <a href="#" onclick="mesaj('Siparişi Onayla','index.php?page=siparis_detay&id=<?php echo $id; ?>&onay=1'); return false;"><img src="images/onayla.png" width="48" height="48" /></a>
        <?php } else { ?>
        <a href="#" onclick="mesaj('Siparişi Pasif Yap','index.php?page=siparis_detay&id=<?php echo $id; ?>&onay=2'); return false;"><img src="images/onayla.png" width="48" height="48" /></a>
        <?php } ?>
        </td>
        <td><a href="#" onclick="mesaj('Silmek İstediğinizden Emin misiniz?','index.php?page=siparis_detay&id=<?php echo $id; ?>&sil=ok'); return false;"><img src="images/red.png" width="48" height="48" /></a></td>
        <td><a href="siparis/siparis_excel.php?id=<?php echo $id; ?>" target="_blank"><img src="images/excel.png" width="48" height="48" /></a></td>
      </tr>

    </table>
<div class="tab-footer clear"><div class="pager fr">

</div></div>
						
</div><!-- /#table -->
	 </div> <!-- end of box-body -->
  </div>
</div>
