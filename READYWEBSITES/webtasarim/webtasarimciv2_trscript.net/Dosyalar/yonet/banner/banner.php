<?php
include('library/kontrol.php');
$adres=addslashes($_POST['adres']);
$baslik=addslashes($_POST['baslik']);
$baslik2=addslashes($_POST['baslik2']);
$metin=addslashes($_POST['metin']);
$metin2=addslashes($_POST['metin2']);
$durum=intval($_POST['durum']);
$sira2=intval($_POST['sira2']);

if($_POST['rec']==1)
{
	if(!empty($_FILES['myfile']['name']))
	 {
			$dosya->Yukleme_Yeri='../uploads/banner/';
			$dosya->success='İşlem Başarılı';
			$calistir=$dosya->dosya_yukle($_FILES['myfile']);
			$sonuc=$dosya->sonuc($calistir);
			$anket_resim_kayit=mysql_query("INSERT INTO banner VALUE(NULL,".$durum.",'".$sira2."','".$baslik."','".$baslik2."','".$metin."','".$metin2."','".$adres."','".$sonuc[0][0]."')");
			echo $islem->islem_sonucu(1,'Banner Başarıyla Sisteme Girilmiştir.'); 
			$islem->yonlendir(2,1,'index.php?page=banner');
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
		$sira_guncelle=mysql_query("UPDATE banner SET sira=".$_POST['sira'][$i]." WHERE id=".$_POST['siraid'][$i]."");
	}
}
#######################################################################################	
if(isset($_GET['pasif']) && !empty($_GET['pasif']))
{
	$pasif_yap=mysql_query("UPDATE banner SET onay=2 WHERE id=".$_GET['pasif']." LIMIT 1");
	echo $islem->islem_sonucu(1,'İşlem Başarıyla Gerçekleştirilmiştir.');
	$islem->yonlendir(2,1,'index.php?page=banner');
}
if(isset($_GET['aktif']) && !empty($_GET['aktif']))
{
	$pasif_yap=mysql_query("UPDATE banner SET onay=1 WHERE id=".$_GET['aktif']." LIMIT 1");
	echo $islem->islem_sonucu(1,'İşlem Başarıyla Gerçekleştirilmiştir.');
	$islem->yonlendir(2,1,'index.php?page=banner');
}
#######################################################################################	
if(isset($_GET['sil']) && !empty($_GET['sil']))
{
	$banner_sil=mysql_query("DELETE FROM banner WHERE id=".$_GET['sil']." LIMIT 1 ");	
	$islem->yonlendir(1,0,'index.php?page=banner');
}

$query = "SELECT * FROM banner ORDER BY sira ASC"; // sql
$sql = mysql_query($query); 
$total_records = mysql_num_rows($sql); // toplam veri sayisi 
$scroll_page = 5; // kaydirilacak sayfa sayisi 
$per_page = 20; // her sayafa gösterilecek sayfa sayisi 
$current_page =$_GET['sayfa']; // bulunulan sayfa 
$pager_url = "index.php?page=banner&sayfa="; // sayfalamanin yapildigi adres 
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
            <td width="20%"><strong>Durum</strong></td>
            <td width="2%"><strong>:</strong></td>
            <td><select name="durum" id="durum">
              <option value="1">Banner Yayınlansın</option>
              <option value="2">Şimdilik Gösterme</option>
              </select></td>
          </tr>
          <tr>
            <td><strong>Sıra</strong></td>
            <td><strong>:</strong></td>
            <td><input name="sira2" type="text" id="sira2" size="5" maxlength="5" value="<?php echo $_POST['sira2']; ?>" /></td>
          </tr>
          <tr>
            <td><strong>Adres ( URL )</strong></td>
            <td><strong>:</strong></td>
            <td><input name="adres" type="text" id="adres" value="<?php echo $_POST['adres']; ?>" size="50" /></td>
          </tr>
          <tr>
            <td><strong>Türkçe Başlık</strong></td>
            <td><strong>:</strong></td>
            <td><span id="sprytextfield1">
              <input name="baslik" type="text" id="baslik" size="50" value="<?php echo $_POST['baslik']; ?>" />
              </span></td>
          </tr>
          <tr>
            <td><strong>İngilizce Başlık</strong></td>
            <td><strong>:</strong></td>
            <td><input name="baslik2" type="text" id="baslik2" size="50" value="<?php echo $_POST['baslik2']; ?>" /></td>
          </tr>
          <tr>
            <td><strong>Türkçe Açıklama</strong></td>
            <td><strong>:</strong></td>
            <td><textarea name="metin" cols="55" rows="5" id="metin"><?php echo $_POST['metin']; ?></textarea></td>
          </tr>
          <tr>
            <td><strong>İngilizce Açıklama</strong></td>
            <td><strong>:</strong></td>
            <td><textarea name="metin2" cols="55" rows="5" id="metin2"><?php echo $_POST['metin2']; ?></textarea></td>
          </tr>
          <tr>
            <td><strong>Dosya Seç</strong></td>
            <td><strong>:</strong></td>
            <td><input type="file" name="myfile" id="myfile" /> 
              <span class="iptal">Dikkat: </span> <span class="aktif">Banner Ebatı 1000px * 315px Olmalıdır.</span></td>
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
	  <h2>Sisteme Kayıtlı Bannerler</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 		<form method="post" action="index.php?page=banner">
        <input type="hidden" name="sirala" value="1" />
		  <table><thead><tr>
		  <th width="105">Banner</th>
		  <th>Türkçe Başlık</th>
		  <th>İngilizce Başlık</th>
		  <th>Yayın Durumu</th>
		  <th>Sıra</th>
		  <th>İşlemler</th></tr></thead><tbody>
	<?php $sorgu=mysql_query($query." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
          					
          <tr><td><a href="../uploads/banner/<?php echo $yaz['resim']; ?>"><img src="../uploads/banner/<?php echo $yaz['resim']; ?>" width="100" style="border:#CCC 1px solid; padding:2px;"/></a></td>
          <td valign="middle"><?php echo $yaz['baslik_tr']; ?></td>
          <td><?php echo $yaz['baslik_eng']; ?></td>
          <td><?php if($yaz['onay']==1) { echo '<span class="aktif">Yayında</span>'; } else { echo '<span class="iptal">Pasif</span>'; } ?></td>
          <td>
          <input type="hidden" name="siraid[]" id="siraid[]" value="<?php echo $yaz['id']; ?>" />
          <input name="sira[]" type="text" id="sira[]" size="2" maxlength="5" value="<?php echo $yaz['sira']; ?>" />
          </td>
		  <td>
            <?php if($yaz['onay']==1) { ?>
            <a href="index.php?page=banner&pasif=<?php echo $yaz['id']; ?>" 
            onClick="return sil_kontrol('Dikkat!\nBu İşlem Sonrasında Banner Sitede Listelenmeyecektir.\nİşleme Devam Etmek İstediğinizden Emin misiniz?')">
            <img src="images/ico_success_16.png" class="icon16 fl-space2" alt="" title="Pasifleştir" />
            </a>
            <?php } else { ?>
            <a href="index.php?page=banner&aktif=<?php echo $yaz['id']; ?>" 
            onClick="return sil_kontrol('Dikkat!\nBu İşlem Sonrasında Banner Sitede Listelenecektir.\nİşleme Devam Etmek İstediğinizden Emin misiniz?')">
            <img src="images/ico_info_16.png" class="icon16 fl-space2" alt="" title="Aktifleştir" />
            </a>          
			<?php } ?>
          <a href="index.php?page=banner_duzenle&id=<?php echo $yaz['id']; ?>"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="Detay" /></a>
          <a href="index.php?page=banner&sil=<?php echo $yaz['id']; ?>" onClick="return sil_kontrol('Silmek istediğinizden eminmisiniz')">
          <img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" /></a> 
          </td></tr>
          <?php } ?>  
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="4" align="right"><input type="submit" name="button2" id="button2" value="Sıralamayı Güncelle" class="submit" /></td>
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

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
