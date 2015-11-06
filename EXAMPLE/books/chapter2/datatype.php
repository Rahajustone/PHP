


<?php
$string="my name is raha";
$integer=10;

echo "first argument:".gettype($string),"<br>";//to get  type of a data you must use gettype() function
echo "second argument:".gettype($integer),"<br";
echo "<br>";
echo "<br>";
	#is_typeofdata
	$arraylist= array("my name is array",10,$string,$integer);
		foreach ($arraylist as $key) 
		{
		
			
			if(is_string($key))
			{
				echo "<br>i am string value: ".$key;
				echo "<br>";
			}
			else if (is_integer($key)) 
			{
				echo "<br>I am an integer: ";
				echo "value".$key."<br";
				echo "<br>";
		
			} else  {
				echo "<br>";
				echo "<br>something other<br>";
				
			}
			
		}


?>

