<?php
error_reporting(0);
if(isset($_POST['id']) && !empty($_POST['id']))
{
	echo '<input type="hidden" name="pozisyon" value="'.intval($_POST['id']).'" />';	
}
else exit();

?>