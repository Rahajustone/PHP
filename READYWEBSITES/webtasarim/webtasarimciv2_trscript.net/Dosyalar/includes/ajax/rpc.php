<?php
error_reporting(0);
session_start();
ob_start();
include ('../../library/Elkatek_Connection.php');
include('../../library/guvenlik.php');
include('../../library/functions.php');
$sec   = new Yeniyol_Guvenlik();
$fonks = new yeniyol();

if(isset($_POST['queryString'])) 
	{
		$queryString = mysql_real_escape_string(strip_tags($_POST['queryString']));
		if(strlen($queryString) > 1) 
		{
			$query = mysql_query("SELECT baslik_".$fonks->dil()." FROM urunler WHERE baslik_".$fonks->dil()." LIKE '$queryString%' LIMIT 10");
			while ($result = mysql_fetch_assoc($query)) 
			{
				echo '<li onClick="fill(\''.$result['baslik_'.$fonks->dil()].'\');">'.$result['baslik_'.$fonks->dil()].'</li>';
			}
			$query = mysql_query("SELECT adi FROM komponent WHERE adi LIKE '$queryString%' OR stok LIKE '$queryString%' LIMIT 10");
			while ($result = mysql_fetch_assoc($query)) 
			{
				echo '<li onClick="fill(\''.$sec->stext($result['adi']).'\');">'.$result['adi'].'</li>';
			}			
		} 
	}
	
	else 
	{
	  exit();
	}

ob_start();	
$baglan->kapat();
?>