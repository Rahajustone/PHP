<html>
<head>
</head>
<body>
	<h1>added successifully</h1>
	
	<?php
	//kisaca degiskenler adlarini olustur
	$isbn=$_POST['isbn'];
	$author=$_POST['author'];
	$title=$_POST['title'];
	$price=$_POST['price'];
	
	if (!$isbn||!$author||!$title||!$price) 
	{

		echo "you have not entered all detais.Please go back and full all detalis";
		exit;
	}
	
	//connection of database 
	$db = new mysqli('localhost', 'root', '123456', 'books');
	if(mysqli_connect_errno())
	{
		echo "Erro:could not connect to database";
		exit();
	}
	else {
		echo "connected succsefully";
	}
	$query="insert into books values ( ' ".$isbn."',' ".$author."',' ".$title."',' ".$price."')";
	$result=$db->query($query);
	if($result)
	{
		echo $db->affected_row.'books inserted to database';
	}
	$db->close();

	?>

	</body>
	</html>