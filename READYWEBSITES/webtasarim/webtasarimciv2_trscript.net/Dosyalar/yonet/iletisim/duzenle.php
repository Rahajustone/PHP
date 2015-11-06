<?php
include('library/kontrol.php');

$id=intval($_GET['id']);


if($_POST['rec']==1)
{
	$baslik=addslashes($_POST['baslik']);
	$baslik2=addslashes($_POST['baslik2']);
	$tel=addslashes($_POST['tel']);
	$fax=addslashes($_POST['fax']);
	$posta=addslashes($_POST['posta']);
	$gsm=addslashes($_POST['gsm']);
	$adres=addslashes($_POST['adres']);
	$map=addslashes($_POST['map']);
	
	if(!empty($_FILES['myfile']['name']))
	{	
		$baslik=mysql_real_escape_string($_POST['baslik']);
		$eresim->succes='Kayıt Başarıyla Yapılmıştır';
		$eresim -> ayarlar('../uploads/content/','../uploads/thumbs/','400','2000',1);
		$islem2 = $eresim->yukle($_FILES['myfile']);
		$sonuc = $eresim->mesaj($islem2);
		$resim_guncelle=mysql_query("UPDATE contact SET resim='".$sonuc[0][1]."' WHERE id=".$id." LIMIT 1");
	}

	$banner_gun=mysql_query("UPDATE contact SET baslik_tr='".$baslik."',baslik_eng='".$baslik2."',telefon='".$tel."',fax='".$fax."',gsm='".$gsm."',eposta='".$posta."',gmap='".$map."',adres='".$adres."' WHERE id=".$id." LIMIT 1");
	echo $islem->islem_sonucu(1,'İçerik Başarıyla Güncellenmiştir.'); 
	$islem->yonlendir(2,1,'index.php?page=iletisim_duzenle&id='.$id.'');
}
########################################################################################	
$duzenle_sorgu=mysql_query("SELECT * FROM contact WHERE id=".$id."");
$duzenle=mysql_fetch_assoc($duzenle_sorgu);
?>

<div class="page clear">
   <div class="content-box">
	<div class="box-header clear">
	  <h2>İletişim Bilgileri Düzenle</h2></div>
    	<div class="box-body clear">
	  		<div id="table">
            <form action="" method="post"  name="form1" enctype="multipart/form-data">
            <input type="hidden" name="rec" value="1" />
            <table>
              <tr>
                <td><strong>Resim</strong></td>
                <td><strong>:</strong></td>
                <td><a href="../uploads/content/<?php echo $duzenle['resim']; ?>"><img src="../uploads/thumbs/<?php echo $duzenle['resim']; ?>" width="61" height="61" /></a></td>
              </tr>
              <tr>
                <td width="20%"><strong>Başlık Türkçe</strong></td>
                <td width="2%"><strong>:</strong></td>
                <td><input name="baslik" type="text" id="baslik" value="<?php echo $duzenle['baslik_tr']; ?>" size="50" /></td>
              </tr>
              <tr>
                <td><strong>Başlık İngilizce</strong></td>
                <td><strong>:</strong></td>
                <td><input name="baslik2" type="text" id="baslik2" size="50" value="<?php echo $duzenle['baslik_eng']; ?>" /></td>
              </tr>
              <tr>
                <td><strong>Telefon</strong></td>
                <td><strong>:</strong></td>
                <td><input name="tel" type="text" id="tel" size="50" value="<?php echo $duzenle['telefon']; ?>" /></td>
              </tr>
              <tr>
                <td><strong>Fax</strong></td>
                <td><strong>:</strong></td>
                <td><input name="fax" type="text" id="fax" size="50" value="<?php echo $duzenle['fax']; ?>" /></td>
              </tr>
              <tr>
                <td><strong>Gsm</strong></td>
                <td><strong>:</strong></td>
                <td><input name="gsm" type="text" id="gsm" size="50" value="<?php echo $duzenle['gsm']; ?>" /></td>
              </tr>
              <tr>
                <td><strong>E-Posta</strong></td>
                <td><strong>:</strong></td>
                <td><input name="posta" type="text" id="posta3" size="50" value="<?php echo $duzenle['eposta']; ?>" /></td>
              </tr>
              <tr>
                <td><strong>Adres</strong></td>
                <td><strong>:</strong></td>
                <td><textarea name="adres" cols="55" rows="5" id="adres"><?php echo $duzenle['adres']; ?></textarea></td>
              </tr>
              <tr>
                <td><strong>Google Map</strong></td>
                <td><strong>:</strong></td>
                <td><textarea name="map" cols="55" rows="5" id="map"><?php echo $duzenle['gmap']; ?></textarea></td>
              </tr>
              <tr>
                <td><strong>Resim</strong></td>
                <td><strong>:</strong></td>
                <td><input type="file" name="myfile" id="myfile" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="Güncelle" id="Güncelle" value="Güncelle"  class="submit" /></td>
              </tr>
            </table>
            </form>
  		  </div><!-- /#table --></div> <!-- end of box-body -->
  </div>
</div>


