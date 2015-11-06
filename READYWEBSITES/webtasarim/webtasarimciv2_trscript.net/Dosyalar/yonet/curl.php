<?php
session_start();
error_reporting(0);
include_once("../library/DoDo_MoBily.php");
include_once("library/guvenlik.php");
$eretna= new Eretna_Guvenlik();

if(!empty($_REQUEST['user']) && !empty($_REQUEST['password']))
	{
		$user=$eretna->metin($_REQUEST['user']);
		$sifre=$eretna->admin_giris($_REQUEST['password']);
		
		$admin_sor=mysql_query("SELECT id FROM admin_kontrol WHERE user='".$user."' AND password='".$sifre."' LIMIT 1");
		if(mysql_num_rows($admin_sor)>0) 
		{ 
			echo 'YENIYOL_OK_CURL';
		} 
		else 
		{ 
			//exit();
		}
	}
?>