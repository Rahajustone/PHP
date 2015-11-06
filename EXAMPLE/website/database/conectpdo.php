<?php
$servername = "localhost";
$username = "root";
$password = "123456";

try {
    $conn = new PDO("mysql:host=$servername;dbname=lib", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
   
    $sql="select * from login where 'ad' and 'sifre' ";

   try {
	$rows=$conn->query($sql);
	foreach ($rows as $value) {
		echo "ad".$value["ad"]+"sifre".$valuep["sifre"];
	}
}
	catch (PDOException $e) {
		echo "Query failed".$e->getMessage();
	} 
?> 