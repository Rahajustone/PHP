<?php
session_start();
error_reporting(0);
include('../../library/Elkatek_Connection.php');
include('../../library/guvenlik.php');
include('../../library/functions.php');

$fonks = new yeniyol();
$sec = new Yeniyol_Guvenlik();
$fonks -> home_lang('../../library/lang/');

if(!isset($_POST['ekayit']) || empty($_POST['ekayit'])) { exit(); } else
{
	
	$posta=$sec->metin($_POST['ekayit']);
	
	if(!filter_var($posta, FILTER_VALIDATE_EMAIL))
	{
		echo "<script>alert('".BULTEN_ERR."');</script>";
	}
	else
	{
		$sql=mysql_query("SELECT posta FROM bulten WHERE posta='".$posta."' LIMIT 1");
		if(mysql_num_rows($sql)>0) 
		{ 
			echo "<script>alert('".BULTEN_OLD."');</script>";	 
		} 
		else
		{
			$ip=$_SERVER['REMOTE_ADDR'];
			$tarih=date("Y-n-d H:i:s");
			$kayit=mysql_query("INSERT INTO bulten VALUES(NULL,'".$ip."','".$tarih."','".$posta."')");
			echo "<script type=\"text/javascript\">
			$(document).ready(function(){
			alert('".BULTEN_OK."');
			document.getElementById('ekayit').value='".BULTEN_INPUT."';
			});
			</script>";

		}	
		
	}
		
}

$baglan->kapat();
?>