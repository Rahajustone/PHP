<?php
session_start();
//error_reporting(0);

include('../library/guvenlik.php');
include('../library/functions.php');
$sec   =  new Yeniyol_Guvenlik();
$fonks =  new yeniyol();
$fonks -> home_lang('../library/lang/');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teklif Formu</title>

<script type="text/javascript">
function talep() {

var isim    = document.talep_form.isim.value;
var telefon = document.talep_form.telefon.value;
var adres   = document.talep_form.adres.value;

if(isim=='') { alert('<?php echo FORM_UYARI1; ?>'); return false; }
if(telefon=='') { alert('<?php echo FORM_UYARI2; ?>'); return false; }
if(adres=='') { alert('<?php echo FORM_UYARI7; ?>'); return false; }

if(isim!='' && telefon!='' && adres!='')
{
   $.ajax({
        type: 'POST',
        url: 'includes/ajax/talep.php',
        data: $('#talep_form').serialize(),
        success: function(cevap) {
            $('#talep_sonuc').html(cevap);
            }
    });
}
}
</script>
</head>

<body>
<div id="talep">
  <form name="talep_form" id="talep_form" method="post" action="" onsubmit="return false;">
    <input type="hidden" name="send" value="1" />
	<table class="ktable">
    <?php if($durum==1) { ?>
  <tr>
    <td colspan="4" align="center" class="<?php echo $style;?>"><?php echo $sonuc; ?></td>
    </tr>
  <tr>
  <?php } ?>

    <td class="t2"><span>AD/SOYAD:</span><strong>:
      <input type="text" name="isim" id="isim" />
    </strong></td>

    </strong></td>
  </tr>
  <tr>

    </strong></td>

    </strong></td>
  </tr>
  <tr>

    <td class="t2"><span><?php echo TELEFON;?></span><strong>: 
      <input type="text" name="telefon" id="telefon" />
    </strong></td>

    </strong></td>
  </tr>
  <tr>

    <td class="t2"><span><?php echo EPOSTA;?></span><strong>: 
      <input type="text" name="posta" id="posta" />
    </strong></td>

    </strong></td>
  </tr>
 <tr>

      </select></td>
  </tr>
  <tr>

    <td colspan="3" class="t2"><span><?php echo ADRES;?></span><strong>: 
      <input type="text" name="adres" id="adres" style="width:530px !important;"/>
    </strong></td>
    </tr>
  <tr>

    <td colspan="3" class="t3" align="center">
      <textarea name="mesaj" id="mesaj" cols="45" rows="5"  placeholder="<?php echo MESAJ; ?>" ></textarea></td>
    </tr>
  <tr>
    <td colspan="4" align="right">
      <div id="talep_sonuc"><strong style="margin-left:40px;"></strong><input type="submit" name="button" id="button" class="button" value="<?php echo GONDER; ?>" onclick="talep();" style="float:right;"/></div></td>
  </tr>
    </table>
</form>
</div>
</body>
</html>