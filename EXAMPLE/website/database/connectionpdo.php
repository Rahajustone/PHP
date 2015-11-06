<?php
$servername="localhost";
$dsn="mysql:host=$servername;dbname=lib";//database name server
$username="root";
$password="123456";

	try {
	$conn = new PDO( $dsn, $username, $password );
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	echo "connected";
	} catch ( PDOException $e ) {
	echo "Connection failed: " . $e->getMessage();
	}

$sql="select *from login";
try {
	$rows=$conn->query($sql);
	foreach ($rows as $value) {
		echo $value['ad'];
		echo $value['sifre'];
	}
}
	catch (PDOException $e) {
		echo "Query failed".$e->getMessage();
	}



$conn = null;
?>

