<?php
include('library/kontrol.php');

$baslik=addslashes($_POST['baslik']);
$baslik2=addslashes($_POST['baslik2']);
$tel=addslashes($_POST['tel']);
$fax=addslashes($_POST['fax']);
$posta=addslashes($_POST['posta']);
$gsm=addslashes($_POST['gsm']);
$adres=addslashes($_POST['adres']);
$map=addslashes($_POST['map']);
$sira=addslashes($_POST['sira']);

if($_POST['rec']==1)
{
	if(!empty($baslik) && !empty($tel))
	 {

		$baslik=mysql_real_escape_string($_POST['baslik']);
		$eresim->succes='Kayıt Başarıyla Yapılmıştır';
		$eresim -> ayarlar('../uploads/content/','../uploads/thumbs/','400','2000',1);
		$islem2 = $eresim->yukle($_FILES['myfile']);
		$sonuc = $eresim->mesaj($islem2);
			
		$anket_resim_kayit=mysql_query("INSERT INTO contact VALUES(NULL,'".$sira."','".$baslik."','".$baslik2."','".$adres."','".$tel."','".$fax."','".$posta."','".$gsm."','".$sonuc[0][1]."','".$map."')");
		echo $islem->islem_sonucu(1,'Bilgiler Başarıyla Sisteme Girilmiştir.'); 
		$islem->yonlendir(2,1,'index.php?page=iletisim');
	 }
	 else
	 {
		echo $islem->islem_sonucu(0,'Lütfen Banner Seçimini Yapınız.'); 
	 }
}
#######################################################################################	
if($_POST['sirala']==1)
{
	$ssay=count($_POST['sira']);
	for($i=0; $i<$ssay; $i++)
	{
		$sira_guncelle=mysql_query("UPDATE contact SET sira=".$_POST['sira'][$i]." WHERE id=".$_POST['siraid'][$i]."");
	}
}
if(isset($_GET['sil']) && !empty($_GET['sil']))
{
	$banner_sil=mysql_query("DELETE FROM contact WHERE id=".$_GET['sil']." LIMIT 1 ");	
	$islem->yonlendir(1,0,'index.php?page=iletisim');
}

$query = "SELECT * FROM contact ORDER BY sira ASC"; // sql
$sql = mysql_query($query); 
$total_records = mysql_num_rows($sql); // toplam veri sayisi 
$scroll_page = 5; // kaydirilacak sayfa sayisi 
$per_page = 20; // her sayafa gösterilecek sayfa sayisi 
$current_page =$_GET['sayfa']; // bulunulan sayfa 
$pager_url = "index.php?page=iletisim&sayfa="; // sayfalamanin yapildigi adres 
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
            <td width="20%"><strong>Başlık Türkçe</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td><input name="baslik" type="text" id="baslik" size="50" /></td>
          </tr>
          <tr>
            <td><strong>Başlık İngilizce</strong></td>
            <td><strong>:</strong></td>
            <td><input name="baslik2" type="text" id="baslik2" size="50" /></td>
          </tr>
          <tr>
            <td><strong>Telefon</strong></td>
            <td><strong>:</strong></td>
            <td><input name="tel" type="text" id="tel" size="50" /></td>
          </tr>
          <tr>
            <td><strong>Fax</strong></td>
            <td><strong>:</strong></td>
            <td><input name="fax" type="text" id="fax" size="50" /></td>
          </tr>
          <tr>
            <td><strong>Gsm</strong></td>
            <td><strong>:</strong></td>
            <td><input name="gsm" type="text" id="gsm" size="50" /></td>
          </tr>
          <tr>
            <td><strong>E-Posta</strong></td>
            <td><strong>:</strong></td>
            <td><input name="posta" type="text" id="posta3" size="50" /></td>
          </tr>
          <tr>
            <td><strong>Adres</strong></td>
            <td><strong>:</strong></td>
            <td><textarea name="adres" cols="55" rows="5" id="adres"></textarea></td>
          </tr>
          <tr>
            <td><strong>Google Map</strong></td>
            <td><strong>:</strong></td>
            <td><textarea name="map" cols="55" rows="5" id="map"></textarea></td>
          </tr>
          <tr>
            <td><strong>Sıra</strong></td>
            <td><strong>:</strong></td>
            <td><input name="sira" type="text" id="sira" size="3" maxlength="3"/></td>
          </tr>
          <tr>
            <td><strong>Resim</strong></td>
            <td><strong>:</strong></td>
            <td><input type="file" name="myfile" id="myfile" /></td>
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
	  <h2>İletişim Bilgileri</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 		<form method="post" action="index.php?page=iletisim">
        <input type="hidden" name="sirala" value="1" />
		  <table><thead><tr>
		  <th>Başlık</th>
		  <th>Telefon</th>
		  <th>Faks</th>
		  
		  <th>E-Posta</th>
		  <th>&nbsp;</th>
          <th>Sıra</th>
		  <th>İşlemler</th>
          
          </tr></thead><tbody>
	<?php $sorgu=mysql_query($query." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
          <tr>
            <td valign="middle"><?php echo $yaz['baslik_tr']; ?></td>
            <td><?php echo $yaz['telefon']; ?></td>
            <td><?php echo $yaz['fax']; ?></td>
            <td><?php echo $yaz['eposta']; ?></td>
            <td>&nbsp;</td>
            <td>
              <input type="hidden" name="siraid[]" id="siraid[]" value="<?php echo $yaz['id']; ?>" />
              <input name="sira[]" type="text" id="sira[]" size="2" maxlength="5" value="<?php echo $yaz['sira']; ?>" />
              </td>
            <td><a href="index.php?page=iletisim_duzenle&id=<?php echo $yaz['id']; ?>"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="Detay" /></a>
              <a href="index.php?page=iletisim&sil=<?php echo $yaz['id']; ?>" onClick="return sil_kontrol('Silmek istediğinizden eminmisiniz')">
                <img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" /></a> 
            </td></tr>
          <?php } ?>  
          <tr>
            <td>&nbsp;</td>
            <td colspan="6" align="right"><input type="submit" name="button2" id="button2" value="Sıralamayı Güncelle" class="submit" /></td>
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

