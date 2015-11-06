<?php 
session_start();
include('library/kontrol.php'); 
@$fonks = new yeniyol();
?>
<div id="vitrin_area">
  <div id="vitrin">
  	<div class="vbg"></div>

  	<img src="uploads/content/<?php echo $fonks->content_banner(); ?>">
  </div>
</div>  