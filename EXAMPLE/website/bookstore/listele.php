<html>
<head></head>
<body>
	<h1>Resulted:</h1>
<?php
	
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
	$sql="SELECT  *FROM books ";
	$result=$db->query($sql);
	$num_result=$result->num_rows;
	echo '<p> Number of books found:'.$num_result.'<p>';
	for($i=0;$i<$num_result;$i++)
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
	
	$result->free();
	$db->close();





?>
</body>
</html>