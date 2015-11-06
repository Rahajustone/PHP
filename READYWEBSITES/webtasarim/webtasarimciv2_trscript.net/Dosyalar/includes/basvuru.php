<?php
include('library/kontrol.php');
$durum=0;
include('library/dosya.php');
$dosya =  new Yeniyol_Dosya();
if($_POST['kayit']==1)
{
	$isim=$sec->metin($_POST['isim']).' '.$sec->metin($_POST['soyad']);
	$tel=$sec->metin($_POST['telefon']);
	$gsm=$sec->metin($_POST['gsm']);
	$eposta=$sec->metin($_POST['posta']);	
	$mesaj=$sec->metin($_POST['mesaj']);
	$tarih=date("d/m/Y H:i:s");
	$IP=$_SERVER['REMOTE_ADDR'];
	
	if(!empty($_FILES['myfile']['name']))
	 {
			$dosya =  new Yeniyol_Dosya();
			$dosya->Yukleme_Yeri='uploads/cv/';
			$dosya->success='İşlem Başarılı';
			$calistir=$dosya->dosya_yukle($_FILES['myfile']);
			$sonuc=$dosya->sonuc($calistir);
	 }
	
	$kayit=mysql_query("INSERT INTO basvuru VALUES(NULL,'".$IP."','".date("Y-m-d H:i:s")."','".$isim."','".$tel."','".$gsm."','".$mesaj."','".$eposta."','".$sonuc[0][0]."')");
	$sorgus=mysql_query("SELECT basvuru_mail FROM ayarlar");
	$yazz=mysql_fetch_assoc($sorgus);
	$ileti='<strong>Gönderici Adı:</strong> '.$isim.'<br>';
	$ileti.='<strong>Telefon:</strong> '.$tel.'<br>';
	$ileti.='<strong>Gsm:</strong> '.$gsm.'<br>';
	$ileti.='<strong>E-Posta:</strong> '.$eposta.'<br>';
	$ileti.='<strong>Ön Yazı:</strong> '.$mesaj.'<br>';
	$ileti.='<strong>CV:</strong> <a href="http://www.eyapim.com/webtasarimci/uploads/cv/'.$sonuc[0][0].'">İndir </a><br>';
	$ileti.='<strong>Tarih:</strong> '.$tarih.'<br>';
	$ileti.='<strong>IP Adresi:</strong> '.$IP.'<br>';
	if($kayit)
	{
		$fonks->mail_gonder($ileti,$yazz['basvuru_mail'],'Web Form [ Yeni CV ]');
		$durum=1;
		$style='succes';
		$sonuc=CV_OK;
	}
	else
	{
		$durum=1;
		$style='error';
		$sonuc=CV_ERR;
	}
}
$sorgu=mysql_query("SELECT * FROM sabit WHERE id=1 LIMIT 1");
$yaz=mysql_fetch_assoc($sorgu);



?>
<div id="main">
    <div id="left">
        <div class="baslik"><?php echo MENU5; ?></div>
            <ul>
				<?php $fonks->content_menu('icerik',4,$id,'kariyer'); ?>
                <li><a href="basvuru-formu" class="active"><?php echo BASVURU_FORMU; ?></a></li>
            </ul>
        <div class="clear"></div>
        <div id="bulten">
        <div id="bulten_sonuc"></div>
             <div class="inputs">
                 <div class="suggestionsBox" id="suggestions" style="display: none;">
                        <img src="images/top_ok.png" style="position: relative; top: -12px; left: 20px;" alt="upArrow" />
                        <div class="suggestionList" id="autoSuggestionsList"></div>
                  </div>
                 </div>
        	</form>
        </div>
	</div>
  <div id="right">
    <div id="content_banner">
    <img src="uploads/content/basvuru.jpg" class="img" />
    </div>
    <div class="clear"></div>
    <h2><?php echo $yaz['baslik_'.$fonks->dil()]; ?></h2>
    <div class="text">
	<?php echo $yaz['metin_'.$fonks->dil()]; ?>    
    
    <h2><?php echo POZISYON; ?></h2>
    <div class="clear"></div>
    <table class="kariyer">
  <tr>
    <th width="28%"><?php echo ILAN_TARIHI; ?></th>
    <th width="19%"><?php echo IHTIYAC; ?></th>
    <th colspan="2"><?php echo ALINACAK_POZISYON; ?></th>
    </tr>
<?php 
$i=1;
$pozisyon_sorgu=mysql_query("SELECT * FROM pozisyon ORDER BY id DESC"); 
while($pozisyon=mysql_fetch_assoc($pozisyon_sorgu)) {
?>  
  <tr class="td1">
    <td><?php echo $fonks->tr_tarih($pozisyon['tarih']); ?></td>
    <td><?php echo $pozisyon['toplam']; ?> <?php echo KISI; ?></td>
    <td width="45%"><?php echo $pozisyon['baslik_'.$fonks->dil()]; ?></td>
    <td width="8%" style="padding-left:0 !important;"><a class="basvur" href="#" onclick="basvuru(<?php echo $pozisyon['id'] ;?>); return false;"><?php echo BASVUR; ?></a></td>
  </tr>
<?php $i++; } ?>  
</table>
<?php if($durum==1) { ?>

    <div class="<?php echo $style;?>" style="padding:5px 0 5px 0; margin-left:2px;"><?php echo $sonuc; ?></div>

  <?php } ?>
<div id="bform">
    <form name="basvuru_form" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="kayit" value="1" />
    <div id="pozisyon"></div>
	<table class="etable">
    <td class="t1"></td>
    <td class="t2"><span><?php echo ISIM;?></span><strong>:
      <input type="text" name="isim" id="isim" />
    </strong></td>
    <td  class="t1"></td>
    <td class="t2"><span><?php echo SOYAD;?></span><strong>: 
      <input type="text" name="soyad" id="soyad" />
    </strong></td>
  </tr>
  <tr>
    <td class="t1"></td>
    <td class="t2"><span><?php echo TELEFON;?></span><strong>: 
      <input type="text" name="telefon" id="telefon" />
    </strong></td>
    <td  class="t1"></td>
    <td class="t2"><span><?php echo GSM;?></span><strong>: 
      <input type="text" name="gsm" id="gsm" />
    </strong></td>
  </tr>
  <tr>
    <td class="t1"></td>
    <td class="t2"><span><?php echo EPOSTA;?></span><strong>: 
      <input type="text" name="posta" id="posta" />
    </strong></td>
    <td  class="t1"></td>
    <td class="t2"><span><?php echo CV;?></span><strong>:</strong>
     <a id="cvbtn" onclick="getFile()"><?php echo CV_YUKLE;?> <span class="values"></span></a>
        <div style="height: 0px;width: 0px; overflow:hidden;"><input name="myfile" id="myfile" onchange="sub(this)" value="upload" type="file"></div>
    </td>
  </tr>
  <tr>
    <td class="t1" valign="bottom"></td>
    <td colspan="3" class="t3" align="center">
      <textarea name="mesaj" id="mesaj" cols="45" rows="5"  placeholder="<?php echo ON_YAZI; ?>" ></textarea></td>
  </tr>
  <tr>
    <td colspan="4" align="right"><input type="submit" name="button" id="button" class="button" value="<?php echo GONDER; ?>"/></td>
  </tr>
    </table>
</form>
</div>

    </div>
    <div class="clear"></div>
  </div>
</div>
<script language="JavaScript" type="text/javascript" xml:space="preserve">
  var frmvalidator  = new Validator("basvuru_form");
  frmvalidator.addValidation("isim","req","<?php echo FORM_UYARI1;  ?>");
  frmvalidator.addValidation("soyad","req","<?php echo FORM_UYARI6;  ?>");
  frmvalidator.addValidation("telefon","req","<?php echo FORM_UYARI2;  ?>");
  frmvalidator.addValidation("posta","req","<?php echo FORM_UYARI3;  ?>"); 
  frmvalidator.addValidation("mesaj","req","<?php echo FORM_UYARI5;  ?>");
</script>