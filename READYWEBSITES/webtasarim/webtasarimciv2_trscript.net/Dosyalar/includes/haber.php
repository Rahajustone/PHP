<?php
include('library/kontrol.php');
$id=$fonks->sayi($_GET['id']);
$sorgu=mysql_query("SELECT * FROM haberler WHERE id=".$id." LIMIT 1");
$yaz=mysql_fetch_assoc($sorgu);
$sec->zero($yaz['id']);
?>

<div id="main">
    <div id="left">
        <div class="baslik"><?php echo MENU7; ?></div>
            <ul>
				<?php $fonks->content_menu('haberler',0,$id,'haber'); ?>
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
    <div class="clear"></div>
    <div class="text">
    <?php $fonks->content_img($yaz['resim']); ?>
      <h2><?php echo $yaz['baslik_'.$fonks->dil()]; ?></h2>
	<?php echo $yaz['metin_'.$fonks->dil()]; ?>    
    
    </div>
    <div class="clear"></div>
    <div id="TabbedPanels1" class="TabbedPanels">
      <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0"><?php echo FOTO; ?></li>
        <li class="TabbedPanelsTab" tabindex="0"><?php echo VIDEO; ?></li>
      </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent"><?php $fonks->galeri(1,$id); ?></div>
        <div class="TabbedPanelsContent" align="center"><?php echo $fonks->olcek(stripslashes($yaz['video']),650,450); ?></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
