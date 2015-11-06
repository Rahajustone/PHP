<?php
include('library/kontrol.php');
$id=$fonks->sayi($_GET['id']);
$sorgu=mysql_query("SELECT * FROM komponent WHERE id=".$id." LIMIT 1");
$yaz=mysql_fetch_assoc($sorgu);
$sec->zero($yaz['id']);

$sabit_sorgu=mysql_query("SELECT kresim,kmetin_".$fonks->dil()." FROM ayarlar LIMIT 1");
$sabit=mysql_fetch_assoc($sabit_sorgu);
?>

<div id="main">
    <div id="left">
        <div class="baslik"><?php echo MENU3; ?></div>
            <ul>
				<?php $fonks->urun_menu($yaz['kat'],$yaz['akat'],1); ?>
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
   	<h1>
    <img src="images/arrow_top.png" align="absmiddle" /> <a href="components/"><?php echo MENU8; ?></a> 
    <img src="images/arrow.png" /> <span><?php echo $yaz['adi']; ?></span>
    </h1>
    <div class="clear"></div>
    <div class="text">
    <div id="productImage"><?php $fonks->content_img($sabit['kresim']); ?></div>
      <h2><?php echo $yaz['adi']; ?></h2>
     <form name="siparis" id="siparis" action="post" onsubmit=" return false;">
      <table class="utable">
  <tr>
    <td class="t1"><img src="images/u1.png"/></td>
    <td class="t2"><span><?php echo STOK_NO;?></span><strong>:</strong><?php if(!empty($yaz['stok'])) echo $yaz['stok']; else echo $yaz['adi']; ?></td>
  </tr>
  <?php
  	if(!empty($yaz['url'])){
  ?>
  <tr>
    <td class="t1"><img src="images/u3.png"/></td>
    <td class="t2"><span><?php echo KDETAY;?></span><strong>:</strong><a href="https://www.elfa.se/elfa3~tr_en/elfa/init.do?item=<?php echo $yaz['url']?>" style="color:#fe6f0e; text-decoration:none; outline:none;" target="_blank"><?php echo KURL;?></a></td>
  </tr>
  <?php } ?>
  <tr>
    <td class="t1"><img src="images/u4.png"/></td>
    <td class="t2">
      <div id="sepet_alan"><span><?php echo ADET;?></span><strong>:</strong><input type="text" name="adet" id="adet" value="1" size="2" />
        <img src="images/arti.png" id="arti"/>
        <img src="images/eksi.png" id="eksi"/>
        <a id="loader"></a>
        <a href="#" class="sepet" onclick="sepetekle('<?php echo $yaz['id'];?>',document.siparis.adet.value,'<?php echo SEPET_EKLE; ?>','2'); return false;" id="sepetekle"><?php echo SEPET_EKLE; ?></a>
        <div class="clear"></div>
        </div>
      </td>
  </tr>
</table>
</form>
    <div class="clear emptys"></div>
    <div id="TabbedPanels1" class="TabbedPanels">
      <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0"><?php echo ACIKLAMA; ?></li>
      </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent"><?php echo $sabit['kmetin_'.$fonks->dil()]; ?></div>
      </div>
    </div>
  </div>
    <div class="clear"></div>
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
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
