<?php
include('library/kontrol.php');
$durum=0;
if($_POST['send']==1)
{
	$sorgus=mysql_query("SELECT iletisim_mail FROM ayarlar");
	$yazz=mysql_fetch_assoc($sorgus);
	
	$isim=$sec->metin($_POST['isim']);
	$telefon=$sec->metin($_POST['telefon']);
	$posta=$sec->metin($_POST['posta']);
	$firma=$sec->metin($_POST['firma']);
	$fax=$sec->metin($_POST['fax']);
	$gsm=$sec->metin($_POST['gsm']);
	$konu=$sec->metin($_POST['konu']);
	$mesaj=$sec->metin($_POST['mesaj']);
	$tarih=date("d-m-Y H:i:s");
	$ip=$_SERVER['REMOTE_ADDR'];
	
	$ileti='<hr /><strong>İsim : </strong>'.$isim.'<br>';
	$ileti.='<strong>Telefon : </strong>'.$telefon.'<br>';
	$ileti.='<strong>E-Posta : </strong>'.$posta.'<br>';
	$ileti.='<strong>Firma : </strong>'.$firma.'<br>';
	$ileti.='<strong>Faks : </strong>'.$fax.'<br>';
	$ileti.='<strong>Gsm: </strong>'.$gsm.'<br>';
	$ileti.='<strong>Konu : </strong>'.$konu.'<br>';
	$ileti.='<strong>Mesaj : </strong>'.$mesaj.'<br>';
	$ileti.='<strong>Tarih : </strong>'.$tarih.'<br>';
	$ileti.='<strong>IP Adres : </strong>'.$ip.'<br><hr />';
	
	$fonks->mail_gonder($ileti,$yazz['iletisim_mail'],'Web Form [ Yeni Mesaj ]');

	$durum=1;
	$style='succes';
	$sonuc=MESAJ_OK;

}
?>
<div id="main">
    <div id="left">
        <div class="baslik"><?php echo MENU6; ?></div>
            <ul>
				<?php $fonks->content_menu('contact',0,$id,'iletisim'); ?>
                <li><a href="iletisim-formu" class="active"><?php echo ILETISIM_FORMU; ?></a></li>
            </ul>
        <div class="clear"></div>
        <div id="bulten">
        <div id="bulten_sonuc"></div>
                 <div class="suggestionsBox" id="suggestions" style="display: none;">
                        <img src="images/top_ok.png" style="position: relative; top: -12px; left: 20px;" alt="upArrow" />
                        <div class="suggestionList" id="autoSuggestionsList"></div>
                  </div>
        	</form>
        </div>
	</div>
  <div id="right">
    <div id="content_banner">
    <img src="uploads/content/contact.jpg" class="img" />
    </div>
    <div class="clear"></div>
    <h2><?php echo ILETISIM_FORMU; ?></h2>
    <div class="text">
    <form name="contact_form" method="post" action="">
    <input type="hidden" name="send" value="1" />
	<table class="etable">
    <?php if($durum==1) { ?>
  <tr>
    <td colspan="4" align="center" class="<?php echo $style;?>"><?php echo $sonuc; ?></td>
    </tr>
  <tr>
  <?php } ?>
    <td class="t2"><span><?php echo ISIM;?></span><strong>:
      <input type="text" name="isim" id="isim" />
    </strong></td>
    <td class="t2"><span><?php echo FIRMA;?></span><strong>: 
      <input type="text" name="firma" id="firma" />
    </strong></td>
  </tr>
  <tr>
    <td class="t2"><span><?php echo TELEFON;?></span><strong>: 
      <input type="text" name="telefon" id="telefon" />
    </strong></td>
    <td class="t2"><span><?php echo FAKS;?></span><strong>: 
      <input type="text" name="fax" id="fax" />
    </strong></td>
  </tr>
  <tr>
    <td class="t2"><span><?php echo EPOSTA;?></span><strong>: 
      <input type="text" name="posta" id="posta" />
    </strong></td>
    <td class="t2"><span><?php echo GSM;?></span><strong>: 
      <input type="text" name="gsm" id="gsm" />
    </strong></td>
  </tr>
  <tr>
    <td colspan="3" class="t2"><span><?php echo KONU;?></span><strong>: 
      <input type="text" name="konu" id="konu" style="width:550px !important;"/>
    </strong></td>
    </tr>
  <tr>
    <td colspan="3" class="t3" align="center">
      <textarea name="mesaj" id="mesaj" cols="45" rows="5"  placeholder="<?php echo MESAJ; ?>" ></textarea></td>
    </tr>
  <tr>
    <td colspan="4" align="right"><input type="submit" name="button" id="button" class="button" value="<?php echo GONDER; ?>"/></td>
  </tr>
    </table>
</form>
    
    </div>
    <div class="clear"></div>
  </div>
</div>
<script language="JavaScript" type="text/javascript" xml:space="preserve">
  var frmvalidator  = new Validator("contact_form");
  frmvalidator.addValidation("isim","req","<?php echo FORM_UYARI1;  ?>");
  frmvalidator.addValidation("telefon","req","<?php echo FORM_UYARI2;  ?>");
  frmvalidator.addValidation("posta","req","<?php echo FORM_UYARI3;  ?>"); 
  frmvalidator.addValidation("konu","req","<?php echo FORM_UYARI4;  ?>");
  frmvalidator.addValidation("mesaj","req","<?php echo FORM_UYARI5;  ?>");
</script>