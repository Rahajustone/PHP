<?php include('library/kontrol.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
	$("#result_error").show("slow");	
});
</script>
<div id="result_error">
    <div class="img"><img src="images/error.png" /></div>
    <div class="text"><?php echo KAPAT_UYARI; ?></div>
    <div class="img" align="right"><a class="button" onClick="error_close(); return false;"><?php echo KAPAT; ?></a></div>
</div> 