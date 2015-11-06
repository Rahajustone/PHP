<?php
include('library/kontrol.php');
$id=$fonks->sayi($_GET['id']);
if(empty($_GET['id']) && !isset($_GET['id']))
{
	$sorgu=mysql_query("SELECT * FROM contact ORDER BY sira ASC LIMIT 1");
	$yaz=mysql_fetch_assoc($sorgu);
	$id=$yaz['id'];
}
else
{
	$sorgu=mysql_query("SELECT * FROM contact WHERE id=".$id." LIMIT 1");
	$yaz=mysql_fetch_assoc($sorgu);
	$sec->zero($yaz['id']);
}

?>
<div id="main">
    <div id="left">
        <div class="baslik"><?php echo MENU6; ?></div>
            <ul>
				<?php $fonks->content_menu('contact',0,$id,'iletisim','sira'); ?>
                <li><a href="iletisim-formu"><?php echo ILETISIM_FORMU; ?></a></li>
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
    <img src="uploads/content/<?php echo $yaz['resim']; ?>" class="img" />
    </div>
    <div class="clear"></div>
    <h2><?php echo $yaz['baslik_'.$fonks->dil()]; ?></h2>
    <div class="text">
	<table class="etable">
  <tr>
    <td colspan="3" class="t4"><span><?php echo ADRES;?></span><strong>:</strong><?php echo $yaz['adres'];?></td>
    </tr>
  <tr>
    <td class="t2"><span><?php echo TELEFON;?></span><strong>:</strong><?php echo $yaz['telefon'];?></td>
    <td  class="t1"></td>
    <td class="t2"><span><?php echo FAKS;?></span><strong>:</strong><?php echo $yaz['fax'];?></td>
  </tr>
  <tr>
    <td class="t2"><span><?php echo EPOSTA;?></span><strong>:</strong><?php echo $yaz['eposta'];?></td>
    <td class="t1"></td>
    <td class="t2"><span><?php echo GSM;?></span><strong>:</strong><?php echo $yaz['gsm'];?></td>
  </tr>
  <tr>
    <td colspan="3" class="t3" align="center"><?php echo $fonks->olcek(stripslashes($yaz['gmap']),630,225);?></td>
    </tr>
</table>

    
    </div>
    <div class="clear"></div>
  </div>
</div>