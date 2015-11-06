<?php
include('library/kontrol.php');
$id=$sec->sayi($_GET['id']);

if(!empty($id) && isset($_GET['id']))
{
	$kategori_sorgu=mysql_query("SELECT akat.id,akat.baslik_".$fonks->dil().",kategori.baslik_".$fonks->dil()." AS abaslik,.kategori.id AS aid FROM akat INNER JOIN kategori ON kategori.id=akat.ana WHERE akat.id=".$id." LIMIT 1");
	$kategori=mysql_fetch_assoc($kategori_sorgu);
	$id=$kategori['id'];
	$baslik=$kategori['baslik_'.$fonks->dil()];	
	$sec->zero($id);
}
else
{
	header("Location: elkatek"); exit();
}


$sayfa=$sec->sayi($_GET['sayfa']);
if(empty($sayfa)) { $sayfa=1;} else { $sayfa; }
$sorgu="SELECT id,baslik_".$fonks->dil().",resim FROM urunler WHERE akat=".$id." ORDER BY baslik_".$fonks->dil()." ASC ";
$sql = mysql_query($sorgu); 
$total_records = mysql_num_rows($sql); // toplam veri sayisi 
$scroll_page = 5; // kaydirilacak sayfa sayisi 
$per_page = 12; // her sayafa gösterilecek sayfa sayisi 
$current_page =$sayfa; // bulunulan sayfa 
$pager_url = "kategori/".$id."/".$fonks->permalink($baslik)."/"; // sayfalamanin yapildigi adres 
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
				<?php $fonks->urun_menu($kategori['aid'],$id); ?>
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
   	<h1><img src="images/arrow_top.png" align="absmiddle" /> <a href="urunler/"><?php echo MENU3; ?></a> <img src="images/arrow.png" /> <span><a href="kategori/<?php echo $kategori['aid']; ?>/<?php echo $fonks->permalink($kategori['abaslik']); ?>/"><?php echo $kategori['abaslik']; ?></a></span> <img src="images/arrow.png" /> <span><?php echo $baslik; ?></span></h1>
    <div class="clear"></div>
    <div class="text">
	<?php 
		$sorgu= mysql_query($sorgu." LIMIT ".$kgPagerOBJ -> start.", ".$kgPagerOBJ -> per_page."");
		while($yaz=mysql_fetch_assoc($sorgu))
		{
			echo '<div class="hlist">
			<div>
			<span><a href="urun/'.$yaz['id'].'/'.$fonks->permalink($yaz['baslik_tr']).'"><img src="uploads/thumbs/'.$yaz['resim'].'" /></a></span><strong>'.$yaz['baslik_'.$fonks->dil()].'</strong>
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