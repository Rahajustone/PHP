<?php
include('library/kontrol.php');
$sayfa=$sec->sayi($_GET['sayfa']);
if(empty($sayfa)) { $sayfa=1;} else { $sayfa; }
$sorgu="SELECT * FROM komponent";
$sql = mysql_query($sorgu); 
$total_records = mysql_num_rows($sql); // toplam veri sayisi 
$scroll_page = 6; // kaydirilacak sayfa sayisi 
$per_page = 12; // her sayafa gösterilecek sayfa sayisi 
$current_page =$sayfa; // bulunulan sayfa 
$pager_url = "components/"; // sayfalamanin yapildigi adres 
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
   	<h1><img src="images/arrow_top.png" align="absmiddle" /> <a href="urunler/"><?php echo MENU3; ?></a> <img src="images/arrow.png" /> <span><?php echo MENU8; ?></span></h1>
    <div class="clear"></div>
    <div class="text">
    <ul id="com">
	<?php 
		$sorgu= mysql_query($sorgu." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
		while($yaz=mysql_fetch_assoc($sorgu))
		{
			echo '<li><a href="component/'.$yaz['id'].'/'.$fonks->permalink($fonks->stokno($yaz['adi'],$yaz['stok'])).'">'.$yaz['adi'].'</a></li><img src="images/komp_hr.png" />';
		}	
	?>  
	</ul>
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