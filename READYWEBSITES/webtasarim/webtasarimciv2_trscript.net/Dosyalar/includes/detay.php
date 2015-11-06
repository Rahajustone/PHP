<?php
include('library/kontrol.php');
$id=$fonks->sayi($_GET['id']);
$sorgu=mysql_query("SELECT urunler.*,kategori.id AS aid,kategori.baslik_".$fonks->dil()." AS abaslik, akat.id AS bid,akat.baslik_".$fonks->dil()." AS bbaslik FROM urunler INNER JOIN kategori ON kategori.id=urunler.kat LEFT JOIN akat ON akat.id=urunler.akat WHERE urunler.id=".$id." LIMIT 1");
$yaz=mysql_fetch_assoc($sorgu);
$sec->zero($yaz['id']);
?>

<div id="main">
    <div id="left">
        <div class="baslik"><?php echo MENU3; ?></div>
            <ul>
				<?php $fonks->urun_menu($yaz['kat'],$yaz['akat']); ?>
            </ul>
        <div class="clear"></div>
        <div id="bulten">
        <div id="bulten_sonuc"></div>
       		 <form name="search" action="elkatek" method="post">
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
    <div id="productImage"><?php $fonks->content_img($yaz['resim']); ?></div>
      <h2><?php echo $yaz['baslik_'.$fonks->dil()]; ?></h2>
     <form name="siparis" id="siparis" action="post" onsubmit=" return false;">
      <table class="utable">
  <tr>
    <td class="t1"><img src="images/u1.png"/></td>
    <td class="t2"><span><?php echo STOK_NO;?></span><strong>:</strong><?php echo $yaz['stok'];?></td>
  </tr>
  <tr>
    <td class="t1"><img src="images/u2.png"/></td>
    <td class="t2"><span><?php echo FIYAT;?></span><strong>:</strong><?php echo $yaz['fiyat'];?> <?php echo $fonks->doviz($yaz['para_birim']);?></td>
  </tr>
  <tr>
    <td class="t1"><img src="images/u3.png"/></td>
    <td class="t2"><span><?php echo INDIRIM_FIYAT;?></span><strong>:</strong><?php echo $yaz['indirim'];?>  <?php echo $fonks->doviz($yaz['para_birim']);?></td>
    </tr>
  <tr>
    <td class="t1"><img src="images/u4.png"/></td>
    <td class="t2">
    <div id="sepet_alan"><span><?php echo ADET;?></span><strong>:</strong><input type="text" name="adet" id="adet" value="1" size="2" />
    <img src="images/arti.png" id="arti"/>
    <img src="images/eksi.png" id="eksi"/>
    <a id="loader"></a>
    <a href="#" class="sepet" onclick="sepetekle('<?php echo $yaz['id'];?>',document.siparis.adet.value,'<?php echo SEPET_EKLE; ?>','1'); return false;" id="sepetekle"><?php echo SEPET_EKLE; ?></a>
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
        <li class="TabbedPanelsTab" tabindex="0"><?php echo FOTO; ?></li>
        <li class="TabbedPanelsTab" tabindex="0"><?php echo DOKUMAN; ?></li>
        <li class="TabbedPanelsTab" tabindex="0"><?php echo VIDEO; ?></li>
      </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent"><?php echo $yaz['metin_'.$fonks->dil()]; ?></div>
        <div class="TabbedPanelsContent"><?php $fonks->galeri(2,$id); ?></div>
        <div class="TabbedPanelsContent"><ul id="doc"><?php $fonks->dokuman($id); ?></ul></div>
        <div class="TabbedPanelsContent" align="center"><?php echo $fonks->olcek(stripslashes($yaz['video']),650,450); ?></div>
      </div>
    </div>
  </div>
    <div class="clear"></div>

    </div>
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>

<script type="text/javascript">