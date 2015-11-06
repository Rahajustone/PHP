<?php
include('library/kontrol.php');
$id=$fonks->sayi($_GET['id']);

$sorgu=mysql_query("SELECT * FROM ortaks WHERE id=".$id." LIMIT 1");
$yaz=mysql_fetch_assoc($sorgu);
$sec->zero($yaz['id']);


?>
<div id="main">
    <div id="left">
        <div class="baslik"><?php echo DISTRIBUTORS; ?></div>
            <ul>
				<?php $fonks->content_menu('ortaks',0,$id,'distributor'); ?>
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
    <div class="text">
    <?php $fonks->content_img($yaz['resim']); ?>
      <h2><?php echo $yaz['baslik_'.$fonks->dil()]; ?></h2>
	<?php echo $yaz['metin_'.$fonks->dil()]; ?>    
   
    </div>
    <div class="clear"></div>
  </div>
</div>