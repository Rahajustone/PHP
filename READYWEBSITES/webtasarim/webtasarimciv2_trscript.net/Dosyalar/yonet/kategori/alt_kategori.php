<?php
include('library/kontrol.php');
$id=intval($_GET['id']);
$baslik=mysql_real_escape_string($_POST['baslik']);
$baslik2=mysql_real_escape_string($_POST['baslik2']);
$sira=$_POST['sira'];

if($_POST['rec']==1)
{
	$urun_ekle=mysql_query("INSERT INTO akat VALUES(NULL,'".$sira."','".$id."','".$baslik."','".$baslik2."')");	
	echo $islem->islem_sonucu(1,'Alt Kategori Başarıyla Oluşturulmuştur.');
}
####################################################################################################
if(isset($_GET['sil']))
{
	$sil=mysql_query("DELETE FROM akat WHERE id=".intval($_GET['sil'])." LIMIT 1");
	header("Location: index.php?page=akategori&id=".$id);
}
####################################################################################################
if($_POST['sirala']==1)
{
	$say=count($_POST['sira']);
	for($i=0; $i<=($say-1); $i++)
	{
		
		$sira_guncelle=mysql_query("UPDATE akat SET sira=".$_POST['sira'][$i]." WHERE id=".$_POST['ids'][$i]."");	
		
	}
}
####################################################################################################
if($_POST['rec']==2)
{
	if(!empty($_POST['baslik']))
	{		
		$baslik=mysql_real_escape_string($_POST['baslik']);
		$baslik2=mysql_real_escape_string($_POST['baslik2']);
		$kat=intval($_POST['kat']);

		$guncelle=mysql_query("UPDATE akat SET baslik_tr='".$baslik."',baslik_eng='".$baslik2."',ana='".$kat."' WHERE id=".intval($_GET['duzenle'])." LIMIT 1");
		header("Location: index.php?page=akategori&id=".$id);
	}
}
####################################################################################################
$kat_duzenle=mysql_query("SELECT * FROM akat WHERE id=".intval($_GET['duzenle'])."");
$cat=mysql_fetch_assoc($kat_duzenle);
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
	  <h2>Alt Kategori Ekle</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
 	<form action="" method="post" enctype="multipart/form-data"  name="urun_ekle" id="urun_ekle">	
<input type="hidden" name="rec" value="1" />
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="120">Kategori Bilgileri</th>
    <th width="5"></th>
    <th width="451">&nbsp;</th>
    </tr>
  <tr>
    <td width="120"><strong>Kategori</strong></td>
    <td><strong>:</strong></td>
    <td>
    <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('self',this,0)">
    <option value="index.php?page=akategori">Kategori Seçiniz</option>
          <?php
	  	$kategori_sorgu=mysql_query("SELECT * FROM kategori ORDER BY sira ASC");
		while($kyaz=mysql_fetch_assoc($kategori_sorgu))
		{
			if($id==$kyaz['id']) { $s='selected="selected"'; } else { $s=''; }
			echo '<option value="index.php?page=akategori&id='.$kyaz['id'].'" '.$s.'>'.$kyaz['baslik_tr'].'</option>';
		}
	  ?>
    </select></td>
  </tr>
  <?php if(isset($_GET['id'])) { ?>
  <tr>
    <td><strong>Sıra</strong></td>
    <td><strong>:</strong></td>
    <td><input name="sira" type="text" id="sira" size="2" maxlength="2" /></td>
  </tr>
  <tr>
    <td><strong>Başlık Türkçe</strong></td>
    <td><strong>:</strong></td>
    <td><input name="baslik" type="text" id="baslik" size="75" /></td>
  </tr>
  <tr>
    <td><strong>Başlık İngilizce</strong></td>
    <td><strong>:</strong></td>
    <td><input name="baslik2" type="text" id="baslik2" size="75" /></td>
  </tr>
  <tr>
    <td width="120"></td>
    <td width="5"></td>
    <td><input type="submit" name="button2" id="button2" value="Alt Kategori Oluştur" class="submit" /></td>
  </tr>
  <?php } ?>
  </table>
    </form>
<?php if(isset($_GET['duzenle']) && !empty($_GET['duzenle'])) { ?>
 	<form method="post" action="" enctype="multipart/form-data">	
<input type="hidden" name="rec" value="2" />
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><strong>Kategori</strong></td>
    <td><strong>:</strong></td>
    <td><select name="kat" id="kat">
      <?php
	  	$kategori_sorgu=mysql_query("SELECT * FROM kategori ORDER BY sira ASC");
		while($kyaz=mysql_fetch_assoc($kategori_sorgu))
		{
			if($cat['ana']==$kyaz['id']) { $s='selected="selected"'; } else { $s=''; }
			echo '<option value="'.$kyaz['id'].'" '.$s.'>'.$kyaz['baslik_tr'].'</option>';
		}
	  ?>
      </select></td>
  </tr>
  <tr>
    <td><strong>Başlık Türkçe</strong></td>
    <td><strong>:</strong></td>
    <td><input name="baslik" type="text" id="baslik" size="75" value="<?php echo $cat['baslik_tr']; ?>" /></td>
  </tr>
  <tr>
    <td><strong>Başlık İngilizce</strong></td>
    <td><strong>:</strong></td>
    <td><input name="baslik2" type="text" id="baslik2" size="75" value="<?php echo $cat['baslik_eng']; ?>"/></td>
  </tr>
  <tr>
    <td width="150">&nbsp;</td>
    <td width="5">&nbsp;</td>
    <td><input type="submit" name="button3" id="button3" value="Güncelle" class="submit" /></td>
  </tr>
</table>
 	</form>	
<?php } if(isset($_GET['id'])) { ?>
<form name="siralama" method="post" action="">
<input type="hidden" name="sirala" value="1" />
  <table>
    <thead>
      <tr>
        <th>Ana Kategori</th>
        <th>Türkçe Başlık</th>
        <th>Türkçe İngilizce</th>
        <th width="1">&nbsp;</th>
        <th width="61">Sıralama</th>
        <th width="77">İşlemler</th>
      </tr>
    </thead>
    <tbody>
      <?php $sorgu=mysql_query("SELECT akat.*,kategori.baslik_tr AS kbaslik FROM akat LEFT JOIN kategori ON kategori.id=akat.ana WHERE akat.ana=".$id." ORDER BY akat.sira ASC");
		  while($yaz=mysql_fetch_assoc($sorgu)) { ?>
      <tr>
        <td class="renk1"><?php echo $yaz['kbaslik']; ?></td>
        <td><?php echo $yaz['baslik_tr']; ?></td>
        <td><?php echo $yaz['baslik_eng']; ?></td>
        <td>&nbsp;</td>
        <td><input name="ids[]" type="hidden" id="ids[]" size="2" maxlength="2" value="<?php echo $yaz['id']; ?>" />
          <input name="sira[]" type="text" id="sira[]" size="2" maxlength="2" value="<?php echo $yaz['sira']; ?>" /></td>
        <td><a href="index.php?page=akategori&sil=<?php echo $yaz['id']; ?>&id=<?php echo $id; ?>" onclick="return sil_kontrol('Silmek İstediğinizden Emin misiniz?')"><img src="images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="Sil" /></a> 
        <a href="index.php?page=akategori&duzenle=<?php echo $yaz['id']; ?>&id=<?php echo $id; ?>"><img src="images/ico_settings_16.png" class="icon16 fl-space2" alt="" title="Detay" /></a></td>
      </tr>
                <?php } ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3"><input type="submit" name="button2" id="button2" value="Sıralamayı Güncelle" class="submit" /></td>
        </tr>

 
    </tbody>
  </table>
</form>
<?php } ?>						
</div><!-- /#table -->
				</div> <!-- end of box-body -->
			</div>
</div>   
