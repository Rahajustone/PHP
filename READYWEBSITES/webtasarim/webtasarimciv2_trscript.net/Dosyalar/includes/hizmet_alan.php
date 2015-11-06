<?php
include('library/kontrol.php');
$sayfa=$sec->sayi($_GET['sayfa']);
if(empty($sayfa)) { $sayfa=1;} else { $sayfa; }
$sorgu="SELECT id,baslik_".$fonks->dil().",resim FROM hizmet_alanlari ORDER BY baslik_".$fonks->dil()." ASC ";
$sql = mysql_query($sorgu); 
$total_records = mysql_num_rows($sql); // toplam veri sayisi 
$scroll_page = 5; // kaydirilacak sayfa sayisi 
$per_page = 8; // her sayafa gösterilecek sayfa sayisi 
$current_page =$sayfa; // bulunulan sayfa 
$pager_url = "hizmet-alanlari/"; // sayfalamanin yapildigi adres 
$inactive_page_tag = 'id="current_page"'; // aktif olmayan sayfa linki için biçim 
$previous_page_text = 'Önceki Sayfa' ; // önceki sayfa metni (resim de olabilir <img src="... gibi) 
$next_page_text = 'Sonraki Sayfa' ; // sonraki sayfa metni (resim de olabilir <img src="... gibi) 
$first_page_text = 'İlk Sayfa' ; // ilk sayfa metni (resim de olabilir <img src="... gibi) 
$last_page_text = 'Son Sayfa' ; // son sayfa metni (resim de olabilir <img src="... gibi) 
$kgPagerOBJ = & new Pager_Yeniyol(); 
$kgPagerOBJ -> pager_set($pager_url, $total_records, $scroll_page, $per_page, $current_page, $inactive_page_tag, $previous_page_text, $next_page_text, $first_page_text, $last_page_text, $pager_url_last);
?>
<div id="main">
    <div id="left">
        <div class="baslik"><?php echo MENU4; ?></div>
            <ul>
				<?php $fonks->content_menu('icerik',3,$id,'teknik'); ?>
                <li><a href="hizmet-alanlari" class="active"><?php echo HIZMET_ALAN; ?></a></li>
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
   	<h1><img src="images/arrow_top.png" align="absmiddle" /> <a href="teknik"><?php echo MENU4; ?></a> <img src="images/arrow.png" /> <span><?php echo HIZMET_ALAN; ?></span></h1>
    <div class="clear"></div>
    <div class="text">
	<?php 
		$sorgu= mysql_query($sorgu." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
		while($yaz=mysql_fetch_assoc($sorgu))
		{
			echo '<div class="hlist">
			<div>
			<span><a href="hizmetler/'.$yaz['id'].'/'.$fonks->permalink($yaz['baslik_tr']).'"><img src="uploads/thumbs/'.$yaz['resim'].'" /></a></span><strong>'.$yaz['baslik_'.$fonks->dil()].'</strong>
			</div>
			</div>';
		}	
	?>  

    </div>
    <div class="clear emptys"></div>
   <div align="center"> 
					<?php echo '<p id="pager_links">'; 
                    echo $kgPagerOBJ -> first_page; 
                    echo $kgPagerOBJ -> previous_page; 
                    echo $kgPagerOBJ -> page_links; 
                    echo $kgPagerOBJ -> next_page; 
                    echo $kgPagerOBJ -> last_page; 
                    echo '</p>'; ?>  
                    <div class="clear empty"></div> 
                 </div>       
    <div class="clear"></div>
  </div>
</div>