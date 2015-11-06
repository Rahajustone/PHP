<html>
<head></head>
<body>
	<h1>Resulted:</h1>
<?php
	//kisaca degiskenler adlarini olustur
	$searchtype=$_POST['searchtype'];
	$searchterm=$_POST['searchterm'];
	$searchterm=trim($searchterm);
	if (!$searchterm || !$searchtype) 
	{

		echo "you have not entered search detailed.Please go back and try to  again";
		exit;
	}
	if (!get_magic_quotes_gpc()) 
	{
		$searchtype=addslashes($searchtype);
		$searchterm=addslashes($searchterm);
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
	$sql="SELECT  *FROM books where ".$searchtype." like '%".$searchterm."%'";
	$result=$db->query($sql);
	$num_result=$result->num_rows;
	echo '<p> Number of books found:'.$num_result.'<p>';
	if($result->num_rows >0)
	{
		while($row = $result->fetch_assoc())
		{
		echo '<p><strong> Title:';
		echo $row['isbn'];
		echo '</strong><br/>Author:';
		echo $row['author'];
		echo "<br/>ISBN:";
		echo $row['title'];
		echo '<br/> Price:';
		echo $row['price'];
		echo '<p/>';

		}
	}
	else {
		echo "thre is no such book";
	}
	$result->free();
	$db->close();





?>
</body>
</html>