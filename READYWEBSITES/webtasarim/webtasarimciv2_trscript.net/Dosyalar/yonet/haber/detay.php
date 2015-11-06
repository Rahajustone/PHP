<?php
include('library/kontrol.php');
$urun=intval($_GET['urun']);
$id=intval($_GET['id']);

if($_POST['rec']==1)
{
	
		if(!empty($_FILES['myfile']['name']))
		{
			$eresim->succes='Kayıt Başarıyla Yapılmıştır';
			$eresim -> ayarlar('../upload/urun/','../upload/urun/thumb/','250','2000',1);
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

		### RESİM EKLENİYOR ###
		$urun_ekle=mysql_query("INSERT INTO galeri VALUES(NULL,'".$id."','".$urun."','".$sonuc[0][1]."')");	
		
		echo $islem->islem_sonucu(1,'Fotoğraf Başarıyla Kaydedilmiştir.');
		//$islem->yonlendir(2,1,'index.php?page=foto_ekle');
	
}

if(!empty($_GET['sil']) && isset($_GET['sil']))
{
	$resim_sil=mysql_query("DELETE FROM urun_olcu WHERE id=".intval($_GET['sil'])." LIMIT 1");
	header("Location: index.php?page=urun_detay&urun=".$urun."&id=".$id."");	
}

if($_POST['send']==1 && !empty($_POST['baslik']))
{
	$baslik=mysql_real_escape_string($_POST['baslik']);	
	$yukseklik=mysql_real_escape_string($_POST['yukseklik']);	
	$genislik=mysql_real_escape_string($_POST['genislik']);	
	$derinlik=mysql_real_escape_string($_POST['derinlik']);	
	$fiyat=mysql_real_escape_string($_POST['fiyat']);	
	
	$kayit=mysql_query("INSERT INTO urun_olcu VALUES(NULL,'".$urun."','".$baslik."','".$genislik."','".$yukseklik."','".$derinlik."','".$fiyat."')");
	echo $islem->islem_sonucu(1,'Ürün Ölçüleri Başarıyla Kaydedilmiştir.');
}

$sorgu=mysql_query("SELECT baslik FROM urun WHERE id=".$urun." LIMIT 1");
$yaz=mysql_fetch_assoc($sorgu);
?>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>

<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2><span class="aktif"><?php echo $yaz['baslik']; ?></span></h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 	<form action="" method="post" enctype="multipart/form-data"  name="urun_ekle" id="urun_ekle">	
<input type="hidden" name="rec" value="1" />
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120"><strong>Kategori</strong></td>
    <td><strong>:</strong></td>
    <td width="451">
      <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('self',this,0)">
        <option value="index.php?page=urun_detay">Kategori Seçiniz</option>
        <option value="index.php?page=urun_detay&urun=<?php echo $urun; ?>&id=1" <?php if($id==1) { echo 'selected="selected"'; } ?>>Ürün Galeri</option>
        <option value="index.php?page=urun_detay&urun=<?php echo $urun; ?>&id=2" <?php if($id==2) { echo 'selected="selected"'; } ?>>Teknik Çizim</option>
        </select>
      </td>
  </tr>
  <tr>
    <td><strong>Resim Ekle</strong></td>
    <td><strong>:</strong></td>
    <td><input type="file" name="myfile" id="myfile" /></td>
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
	$galeri_sorgu=mysql_query("SELECT * FROM galeri WHERE urun=".$urun." AND kat=1 ORDER BY id DESC");
	if(mysql_num_rows($galeri_sorgu)<1) { echo '<div class="iptal" align="center" style="font-size:12px; padding:10px;">Henüz Resim Eklenmemiştir.</div>'; }
	while($galeri=mysql_fetch_assoc($galeri_sorgu)){
	?>
    <div style="margin:5px; float:left; border:#CCC 1px solid; padding:5px;" align="center">
    <a href="../upload/urun/<?php echo $galeri['resim']; ?>"><img src="../upload/urun/thumb/<?php echo $galeri['resim']; ?>" class="thumb size64" /></a>
    <a href="index.php?page=urun_detay&urun=<?php echo $urun;?>&id=<?php echo $id;?>&sil=<?php echo $galeri['id']; ?>" onclick="return sil_kontrol();">
    <img src="images/ico_delete_16.png" style="margin:5px;"  align="absmiddle"/>
    </a>
    </div>
    <?php } ?>
    </td>
    </tr>
    <tr>
    <td> <span class="aktif">Ürün Teknik Resimleri</span><br />
    <?php
	$galeri_sorgus=mysql_query("SELECT * FROM galeri WHERE urun=".$urun." AND kat=2 ORDER BY id DESC");
	if(mysql_num_rows($galeri_sorgus)<1) { echo '<div class="iptal" align="center" style="font-size:12px; padding:10px;">Henüz Teknik Resim Eklenmemiştir.</div>'; }

	while($galeris=mysql_fetch_assoc($galeri_sorgus)){
	?>
    <div style="margin:5px; float:left; border:#CCC 1px solid; padding:5px;" align="center">
    <a href="../upload/urun/<?php echo $galeris['resim']; ?>"><img src="../upload/urun/thumb/<?php echo $galeris['resim']; ?>" class="thumb size64" /></a>
    <a href="index.php?page=urun_detay&urun=<?php echo $urun;?>&id=<?php echo $id;?>&sil=<?php echo $galeris['id']; ?>" onclick="return sil_kontrol();">
    <img src="images/ico_delete_16.png" style="margin:5px;"  align="absmiddle"/>
    </a>
    </div>
    <?php } ?>
    </td>
</tr>
</table>
  		  </div><!-- /#table -->
				</div> <!-- end of box-body -->
			</div>
</div>
<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>Ürün Ölçüleri</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 				<form method="post" action="">
                <input type="hidden" name="send" value="1" />
		  <table><thead><tr>
		  <th>Ürün Adı</th>
		  <th>Genişliği</th>
		  <th>Yükseliği</th>
		  <th>Derinliği</th>
		  <th>Fiyatı</th>
		  <th>Sil</th>
		  </tr>
		  </thead><tbody>
	<?php $sorgu=mysql_query("SELECT * FROM urun_olcu WHERE urun=".$urun."");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
          					
          <tr><td><?php echo $yaz['baslik']; ?></td>
          <td><?php echo $yaz['genislik']; ?> <strong>cm</strong></td>
          <td><?php echo $yaz['yukseklik']; ?> <strong>cm</strong></td>
          <td><?php echo $yaz['derinlik']; ?> <strong>cm</strong></td>
            <td><?php echo $yaz['fiyat']; ?> <strong>TL</strong></td>
            <td>
            <a href="index.php?page=urun_detay&urun=<?php echo $urun; ?>&id=<?php echo $id; ?>&sil=<?php echo $yaz['id']; ?>" onclick="return sil_kontrol('Silmek İstediğinizden Emin misiniz?'); return false;">
            <img src="images/ico_logout_24.png" width="24" height="24" />
            </a>
            </td>
		  </tr>
               <?php } ?>   
          <tr>
            <td><input name="baslik" type="text" id="baslik" size="25" /></td>
            <td><input name="genislik" type="text" id="genislik" size="10" /> 
              <strong>cm</strong></td>
            <td><input name="yukseklik" type="text" id="yukseklik" size="10" /> 
              <strong>cm</strong></td>
            <td><input name="derinlik" type="text" id="derinlik" size="10" />
              <strong>cm</strong></td>
            <td><input name="fiyat" type="text" id="fiyat" size="10" />
              <strong>TL</strong></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><input type="submit" name="button" id="button" value="Kaydet" class="submit" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
         
            
		  </tbody>
		  </table>
			  </form>
		  </div><!-- /#table -->
	 </div> <!-- end of box-body -->
  </div>
</div>
