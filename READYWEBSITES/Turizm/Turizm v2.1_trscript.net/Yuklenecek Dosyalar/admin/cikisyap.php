<?php

	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_admin_id']);
			header("location: giris.php");
?>