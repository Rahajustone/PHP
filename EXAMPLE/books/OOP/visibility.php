<html>
<head>

</head>
<body>
	<?php
	
	class Car
	{
		
		public $color;
		public $manufacture;
		public static $year;
		const myconst="localhost:127.0.0";

	}
	$beetle=new Car();
	$beetle->color="red";
	$beetle->manufacture="volve";
	$years=Car::$year=2015;
	echo "<h2> car type </h2>";
	print_r($beetle);
	echo "<br>year:".$years;
	echo "<br>local host:".Car::myconst;
	?>
</body>
</html>