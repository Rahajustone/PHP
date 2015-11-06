<?php
include('library/kontrol.php');
$durum='';
if(isset($_GET['sil']) && !empty($_GET['sil']))
{
	$sil=$sec->sayi($_GET['sil']);
	$sepet_sil=mysql_query("DELETE FROM sepet WHERE id=".$sil." AND sepet='".$sessionID."' LIMIT 1");	
	header("Location: ".ELKATEK_ROOT."sepet");
}
#########################################################################################################
if($_POST['sgun']==1)
{
	for($i=0; $i<=count($_POST['toplam']); $i++)
	{
		if(!empty($_POST['toplam'][$i]) && $_POST['toplam'][$i]>0) 
		{

			$guncelle=mysql_query("UPDATE sepet SET adet=".abs(intval($_POST['toplam'][$i]))." WHERE id=".intval($_POST['sid'][$i])." AND sepet='".$sessionID."'");
		}
	}
}
#########################################################################################################
if($_POST['send']==1)
{
			
	$isim=$sec->metin($_POST['isim']);
	$telefon=$sec->metin($_POST['telefon']);
	$posta=$sec->metin($_POST['posta']);
	$firma=$sec->metin($_POST['firma']);
	$fax=$sec->metin($_POST['fax']);
	$gsm=$sec->metin($_POST['gsm']);
	$adres=$sec->metin($_POST['adres']);
	$mesaj=$sec->metin($_POST['mesaj']);
	$tarih=date("Y-m-d");
	$saat=date("H:i:s");
	$ip=$_SERVER['REMOTE_ADDR'];
	
	if(!empty($isim) || !empty($telefon) || !empty($posta))
	{
		
		$toplam_sorgu=mysql_query("SELECT SUM(adet) AS toplam_urun FROM sepet  WHERE sepet='".$sessionID."'");
		$tyaz=mysql_fetch_assoc($toplam_sorgu);
		$toplam_urun=$tyaz['toplam_urun'];
		
		$siparis_kayit=mysql_query("INSERT INTO siparis 
		VALUES(NULL,0,'".$tarih."','".$saat."','".$ip."','".$isim."','".$telefon."','".$posta."','".$firma."','".$fax."','".$gsm."','".$adres."','".$mesaj."','".$toplam_urun."')");	
		
		$siparis_no=mysql_insert_id();
		
		if($siparis_kayit)
		{
			$siparis_sorgu=mysql_query("SELECT * FROM sepet WHERE sepet='".$sessionID."'");
			while($spr=mysql_fetch_assoc($siparis_sorgu))
			{	
				$siparis_urun_kayit=mysql_query("INSERT INTO siparis_urun VALUES(NULL,'".$siparis_no."','".$spr['kat']."','".$spr['urun']."','".$spr['adet']."')");
			}
			
			$durum='succes';
			$posta_sorgu=mysql_query("SELECT siparis_mail FROM ayarlar LIMIT 1");
			$pyaz=mysql_fetch_assoc($posta_sorgu);
			$ileti= date("d-m-Y").'Tarihinde Yeni Bir Sipariş Alınmıştır.';	
			$ileti.='<br><a href="http://www.eyapim.com/webtasarimci/yonet/siparis/siparis_excel.php?id='.$siparis_no.'">Sipariş Detayı İçin Tıklayınız</a>';
			$fonks->mail_gonder($ileti,$pyaz['siparis_mail'],'Yeni Sipariş');	
			$sonuc=ISLEM_BASARILI;	
			$sepet_bosalt=mysql_query("DELETE FROM sepet WHERE sepet='".$sessionID."'");
		}
		else
		{
			$durum='error';	
			$sonuc=ISLEM_HATALI;	
		}
	}
	else
	{
		
	}
}
?>
<div id="smain">
	<div class="baslik"><?php echo SIPARISLERIM; ?></div>
    <hr />
    <?php if(!empty($durum)) { echo '<div class="'.$durum.'" style="padding:5px; margin:0 0 5px 10px;">'.$sonuc.'</div>'; } ?>
    <form name="sepets" action="sepet" method="post">
    <input type="hidden" name="sgun" value="1" />
    	<ul id="siparis">
        <?php
			$sepet_sorgu=mysql_query("SELECT * FROM sepet WHERE sepet='".$sessionID."'");
			if(mysql_num_rows($sepet_sorgu)<1) { echo '<li class="no_result">'.SEPET_BOS.'</li>'; } else {
			while($sepet=mysql_fetch_assoc($sepet_sorgu)){
			$toplam+=$sepet['adet'];	
		?>
        	<li>
            	<span class="img"><img src="<?php echo $fonks->urun_resim($sepet['urun'],$sepet['kat']); ?>" /></span>
                <span class="bsl"><?php echo $fonks->urun_baslik($sepet['urun'],$sepet['kat']); ?></span>
                <span class="inp">
                <input name="sid[]" type="hidden" id="sid[]" value="<?php echo $sepet['id']; ?>"/>
                <input name="toplam[]" type="text" id="toplam[]" value="<?php echo $sepet['adet']; ?>" size="3" maxlength="3" /> <?php echo ADET; ?></span>
            	<a class="del" href="#" onclick="uyari('<?php echo SIL_UYARI; ?>','sepet/<?php echo $sepet['id'];?>'); return false;"><?php echo SIL; ?></a>
            </li>
            <?php }	echo '<li class="toplam">'.SEPET_URUN1.'<strong> '.$toplam.'</strong> '.SEPET_URUN2.'</li>'; ?>
			    
        </ul>
        <a href="#" class="s_complate" onclick="siparis_tamamla(); return false;"><?php echo SEPET_TAMAM; ?></a>
        <input type="submit" name="guncelle" value="<?php echo SEPET_GUNCELLE; ?>" class="guncelle" />
        
    </form>   
    <div class="clear"></div>
    <div id="siparis_form">
    
    <form name="siparis_form" method="post" action="">
    <input type="hidden" name="send" value="1" />
    <div class="baslik"><?php echo SIPARIS_FORMU; ?></div>
	<table class="stable">
    <?php if($durum==1) { ?>
  <tr>
    <td colspan="4" align="center" class="<?php echo $style;?>"><?php echo $sonuc; ?></td>
    </tr>
  <tr>
  <?php } ?>
    <td class="t1">
    <td class="t2"><span><?php echo ISIM;?></span><strong>:
      <input type="text" name="isim" id="isim" />
    <td  class="t1">
    <td class="t2"><span><?php echo FIRMA;?></span><strong>: 
      <input type="text" name="firma" id="firma" />
  </tr>
  <tr>
    <td class="t1">
    <td class="t2"><span><?php echo TELEFON;?></span><strong>: 
      <input type="text" name="telefon" id="telefon" />
    <td  class="t1">
    <td class="t2"><span><?php echo FAKS;?></span><strong>: 
      <input type="text" name="fax" id="fax" />
  </tr>
  <tr>
    <td class="t1">
    <td class="t2"><span><?php echo EPOSTA;?></span><strong>: 
      <input type="text" name="posta" id="posta" />
    <td  class="t1">
    <td class="t2"><span><?php echo GSM;?></span><strong>: 
      <input type="text" name="gsm" id="gsm" />
  </tr>
  <tr>
    <td class="t1">
    <td colspan="3" class="t2"><span><?php echo ADRES;?></span><strong>: 
      <input type="text" name="adres" id="adres" style="width:835px !important;"/>
    </tr>
  <tr>
    <td class="t1" valign="bottom"></td>
    <td colspan="3" class="t3" align="center">
      <textarea name="mesaj" id="mesaj" cols="45" rows="5"  placeholder="<?php echo MESAJ; ?>" ></textarea></td>
    </tr>
  <tr>
    <td colspan="4" align="right"><input type="submit" name="button" id="button" class="button" value="<?php echo GONDER; ?>"/></td>
  </tr>
    </table>
</form>
<div class="clear"></div>
</script>  
<script language="JavaScript" type="text/javascript" xml:space="preserve">
  var frmvalidator  = new Validator("siparis_form");
  frmvalidator.addValidation("isim","req","<?php echo FORM_UYARI1;  ?>");
  frmvalidator.addValidation("telefon","req","<?php echo FORM_UYARI2;  ?>");
  frmvalidator.addValidation("posta","req","<?php echo FORM_UYARI3;  ?>"); 
  frmvalidator.addValidation("adres","req","<?php echo FORM_UYARI7;  ?>");

    </div>  
    <?php } ?> 
</div>