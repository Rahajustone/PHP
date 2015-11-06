<?php 
include('library/kontrol.php'); 
@$fonks = new yeniyol();
?>
<div id="banner_area">
  <div id="banners">
  		<div id="banner">
			<?php $fonks->banners(); ?>
    	</div>
    </div>
</div>
<script type="text/javascript">
$('#banner').coinslider();
</script>
