	<div id="wowslider-container1">
	<div class="ws_images">
<?
$manset=mysql_query("select * from slider order by slider_id desc");
$manset_say=0;
while($mansetveri = mysql_fetch_array($manset)){
$buyukresim="slider/".$mansetveri['resim_slider'];
?>
<span><img src="<? echo $buyukresim; ?>" alt="" title="" id="wows<? echo $manset_say; ?>" /></span>
<? 
$manset_say++;
}
?>
</div>
<div class="ws_bullets"><div>
<?
$manset2=mysql_query("select * from slider order by slider_id desc");
$manset_say2=0;
while($mansetveri2 = mysql_fetch_array($manset2)){
?>
<a href="#wows<? echo $manset_say2; ?>" title=""><? echo $manset_say2; ?></a>
<? 
$manset_say2++;
}
?>
</div></div>
	</div>
	<script type="text/javascript" src="<? echo $siteurl; ?>/js/script.js"></script>