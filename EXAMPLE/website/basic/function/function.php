<?php
echo "<br>-----creation of function <br>";
#creation of function
function createfunc()
{
	print("i am a new function");
	# code...
}
createfunc();//calling functom
echo "<br>-----creation argument <br>";
function functarg($arg1=1,$arg2=3)
{
	$arg3=$arg1+$arg2;
	return $arg3;

	# code...
}
echo "<br>answer: ".functarg()."<br>";
echo "<br>-----argument assigment------- <br>";
echo functarg(5,6);
?>
