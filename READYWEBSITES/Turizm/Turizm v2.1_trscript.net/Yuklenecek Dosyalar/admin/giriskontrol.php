<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('../inc/database.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;

define('DB_HOST', 'localhost');
define('DB_USER', 'demo_turizm');
define('DB_PASSWORD', '654123');
define('DB_DATABASE', 'demo_turizm');

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$kullanici_adi = clean($_POST['kullanici_adi']);
	$sifre = clean($_POST['sifre']);
	
	//Input Validations
	if($kullanici_adi == '') {
		$errmsg_arr[] = 'kullanici_adi ID missing';
		$errflag = true;
	}
	if($sifre == '') {
		$errmsg_arr[] = 'sifre missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the kullanici_adi form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: giris.php");
		exit();
	}
	
	//Create query
	$sifremd5=md5($sifre);
	$qry="SELECT * FROM admin WHERE kullanici_adi='$kullanici_adi' AND sifre='$sifremd5'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//kullanici_adi Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_admin_id'] = $member['admin_id'];
			session_write_close();
			header("location: index.php");
			exit();
		}else {
			//kullanici_adi failed
			header("location: giris.php");
			exit();
		}
	}else {
		die("Query failed");
	}
?>