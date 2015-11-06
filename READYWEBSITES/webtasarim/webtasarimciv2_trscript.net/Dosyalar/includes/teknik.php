<?php
include('library/kontrol.php');
$id=$fonks->sayi($_GET['id']);
if(empty($_GET['id']) && !isset($_GET['id']))
{
	$sorgu=mysql_query("SELECT * FROM icerik WHERE kat=3 ORDER BY id ASC LIMIT 1");
	$yaz=mysql_fetch_assoc($sorgu);
	$id=$yaz['id'];
}
else
{
	$sorgu=mysql_query("SELECT * FROM icerik WHERE kat=3 AND id=".$id." LIMIT 1");
	$yaz=mysql_fetch_assoc($sorgu);
	$sec->zero($yaz['id']);
}

?>
<div id="main">
    <div id="left">
        <div class="baslik"><?php echo MENU4; ?></div>
            <ul>
				<?php $fonks->content_menu('icerik',3,$id,'teknik'); ?>
                <li><a href="hizmet-alanlari"><?php echo HIZMET_ALAN; ?></a></li>
            </ul>
        <div class="clear"></div>
        <div id="bulten">
        <div id="bulten_sonuc"></div>
        	<div class="bsk"><?php echo ARAMA_ACIKLAMA1; ?></div>
       		 <form name="search" action="elkatek" method="post">
        		<input type="text" class="binpt" name="ara" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" autocomplete="off"  placeholder="<?php echo URUN_ARAMA; ?>"/>
                 <div class="suggestionsBox" id="suggestions" style="display: none;">
                        <img src="images/top_ok.png" style="position: relative; top: -12px; left: 20px;" alt="upArrow" />
                        <div class="suggestionList" id="autoSuggestionsList"></div>
                  </div>
       			 <img src="images/sb.png" onclick="document.search.submit();" />
        	</form>
        </div>
        <img src="images/left_bottom.jpg" class="bottom" />
	</div>
  <div id="right">
   	<h1><img src="images/arrow_top.png" align="absmiddle" /> <a href="teknik"><?php echo MENU4; ?></a> <img src="images/arrow.png" /> <span><?php echo $yaz['baslik_'.$fonks->dil()]; ?></span></h1>
    <div id="content_banner">
    <img src="uploads/content/<?php echo $yaz['resim']; ?>" class="img" />
    <img src="images/banner_shadow.jpg" class="shadow" />
    </div>
    <div class="clear"></div>
    <h2><?php echo $yaz['baslik_'.$fonks->dil()]; ?></h2>
    <div class="text">
	<?php echo $yaz['metin_'.$fonks->dil()]; ?>    
    <!-- AddThis Button BEGIN -->
    <div class="addthis_toolbox addthis_default_style ">
    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
    <a class="addthis_button_tweet"></a>
    <a class="addthis_button_pinterest_pinit"></a>
    <a class="addthis_counter addthis_pill_style"></a>
    </div>
    <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4ee1c04f31a05734"></script>
    <!-- AddThis Button END -->
    </div>
    <div class="clear"></div>
  </div>
</div>