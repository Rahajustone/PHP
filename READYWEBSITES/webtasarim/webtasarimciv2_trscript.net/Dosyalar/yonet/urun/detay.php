<?php
include('library/kontrol.php');
$urun=intval($_GET['urun']);

if($_POST['rec']==1)
{
		if(!empty($_FILES['myfile']['name']))
		{
			$eresim->succes='Kayıt Başarıyla Yapılmıştır';
			$eresim -> ayarlar('../uploads/','../uploads/thumbs/','250','10000',1);
			$islem2 = $eresim->yukle($_FILES['myfile']);
			$sonuc = $eresim->mesaj($islem2);
			if($sonuc[0][2]==1) { 
				$resim_sorgu=",'".$sonuc[0][1]."'";
			}
			else
			{
				echo $islem->islem_sonucu(0,$sonuc[0][0]);	
			}
		}
		$urun_ekle=mysql_query("INSERT INTO galeri VALUES(NULL,'2','".$urun."','".$sonuc[0][1]."')");	
		echo $islem->islem_sonucu(1,'Resim Başarıyla Kaydedilmiştir.');
	
}
#####################################################################################################################
if(!empty($_GET['sil']) && isset($_GET['sil']))
{
	$islem->host_resim('galeri',intval($_GET['sil']),'../uploads/','../uploads/thumbs/');
	$resim_sil=mysql_query("DELETE FROM galeri WHERE id=".intval($_GET['sil'])." LIMIT 1");
	header("Location: index.php?page=urun_detay&urun=".$urun."");	
}
#####################################################################################################################
if($_POST['send']==1 && !empty($_POST['baslik']))
{
	$dosya->Yukleme_Yeri='../uploads/dosya/';
	$dosya->success='İşlem Başarılı';
	$calistir=$dosya->dosya_yukle($_FILES['myfile']);
	$sonuc=$dosya->sonuc($calistir);
			
	$baslik=mysql_real_escape_string($_POST['baslik']);	
	$baslik2=mysql_real_escape_string($_POST['baslik2']);	
	
	$kayit=mysql_query("INSERT INTO dokuman VALUES(NULL,'".$urun."','".$baslik."','".$baslik2."','".$sonuc[0][0]."')");
	echo $islem->islem_sonucu(1,'Dokuman Başarıyla Kaydedilmiştir.');
}
#####################################################################################################################
if(!empty($_GET['doc']) && isset($_GET['doc']))
{
	$islem->host_dosya('dokuman',intval($_GET['doc']),'../uploads/dosya/');
	$resim_sil=mysql_query("DELETE FROM dokuman WHERE id=".intval($_GET['doc'])." LIMIT 1");
	header("Location: index.php?page=urun_detay&urun=".$urun."");	
}
#####################################################################################################################
$sorgu=mysql_query("SELECT baslik_tr FROM urunler WHERE id=".$urun." LIMIT 1");
$yaz=mysql_fetch_assoc($sorgu);
?>

<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2><span class="aktif"><?php echo $yaz['baslik_tr']; ?></span> &gt; Ürün Galerisi</h2>
	</div>
    	<div class="box-body clear">
	  		<div id="table">
 	<form action="" method="post" enctype="multipart/form-data"  name="urun_ekle" id="urun_ekle">	
<input type="hidden" name="rec" value="1" />
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>Resim Ekle</strong></td>
    <td><strong>:</strong></td>
    <td width="451"><input type="file" name="myfile" id="myfile" /></td>
  </tr>
  <tr>
    <td width="120"></td>
    <td width="5"></td>
    <td><input type="submit" name="button2" id="button2" value="Ekle" class="submit" /></td>
  </tr>
  </table>
    </form>
    <table border="0" cellspacing="0" cellpadding="0">
 	    <tr>
    <td> <span class="aktif">Ürün Galeri</span><br />
    <?php
	$galeri_sorgu=mysql_query("SELECT * FROM galeri WHERE icerik=".$urun." AND kat=2 ORDER BY id DESC");
	if(mysql_num_rows($galeri_sorgu)<1) { echo '<div class="iptal" align="center" style="font-size:12px; padding:10px;">Henüz Resim Eklenmemiştir.</div>'; }
	while($galeri=mysql_fetch_assoc($galeri_sorgu)){
	?>
    <div style="margin:5px; float:left; border:#CCC 1px solid; padding:5px;" align="center">
    <a href="../uploads/<?php echo $galeri['resim']; ?>"><img src="../uploads/thumbs/<?php echo $galeri['resim']; ?>" class="thumb size64" /></a>
    <a href="index.php?page=urun_detay&urun=<?php echo $urun;?>&sil=<?php echo $galeri['id']; ?>" onclick="return sil_kontrol();">
    <img src="images/ico_delete_16.png" style="margin:5px;"  align="absmiddle"/>
    </a>
    </div>
    <?php } ?>
    </td>
    </tr>
    <tr></tr>
</table>
  		  </div><!-- /#table -->
				</div> <!-- end of box-body -->
			</div>
</div>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Ürün Dokümanları</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 				<form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="send" value="1" />
		  <table><thead><tr>
		  <th>Türkçe Doküman Adı</th>
		  <th>İngilizce Doküman Adı</th>
		  <th>Dosya</th>
		  <th>Sil</th>
		  </tr>
		  </thead><tbody>
	<?php $sorgu=mysql_query("SELECT * FROM dokuman WHERE urun=".$urun."");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
          					
          <tr><td><?php echo $yaz['baslik_tr']; ?></td>
          <td><?php echo $yaz['baslik_eng']; ?></td>
          <td><?php echo $yaz['dosya']; ?></td>
          <td>
            <a href="index.php?page=urun_detay&urun=<?php echo $urun; ?>&doc=<?php echo $yaz['id']; ?>" onclick="return sil_kontrol('Silmek İstediğinizden Emin misiniz?'); return false;">
              <img src="images/ico_logout_24.png" width="24" height="24" />
              </a>
          </td>
		  </tr>
               <?php } ?>   
          <tr>
            <td><input name="baslik" type="text" id="baslik" size="25" /></td>
            <td><input name="baslik2" type="text" id="baslik2" size="25" /></td>
            <td><input type="file" name="myfile" id="myfile" />
              <input type="submit" name="button" id="button" value="Kaydet" class="submit" /></td>
            <td>&nbsp;</td>
          </tr>
         
            
		  </tbody>
		  </table>
			  </form>
		  </div><!-- /#table -->
	 </div> <!-- end of box-body -->
  </div>
</div>
