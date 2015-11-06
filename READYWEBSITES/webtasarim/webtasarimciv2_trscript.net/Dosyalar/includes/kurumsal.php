<?php
include('library/kontrol.php');
$id=$fonks->sayi($_GET['id']);
if(empty($_GET['id']) && !isset($_GET['id']))
{
	$sorgu=mysql_query("SELECT * FROM icerik WHERE kat=1 ORDER BY id ASC LIMIT 1");
	$yaz=mysql_fetch_assoc($sorgu);
	$id=$yaz['id'];
}
else
{
	$sorgu=mysql_query("SELECT * FROM icerik WHERE kat=1 AND id=".$id." LIMIT 1");
	$yaz=mysql_fetch_assoc($sorgu);
	$sec->zero($yaz['id']);
}

?>
<div id="main">
    <div id="left">
        <div class="baslik"><?php echo MENU1; ?></div>
            <ul>
				<?php $fonks->content_menu('icerik',1,$id,'webtasarim'); ?>
				
        <div class="clear"></div>
        <div id="bulten">
        <div id="bulten_sonuc"></div>
                 <div class="suggestionsBox" id="suggestions" style="display: none;">
                        <img src="images/top_ok.png" style="position: relative; top: -12px; left: 20px;" alt="upArrow" />
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
	<?php echo $yaz['metin_'.$fonks->dil()]; ?>    

    </div>
    <div class="clear"></div>
  </div>
</div>