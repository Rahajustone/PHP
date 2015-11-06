<?php
echo "how to access global value inside function <br>";
$var=10;//global varibale;
$var1=20;//global variable;
$var2="i am also global scope..... ";
function FunctionName()
{
	global $var,$var1;
	echo "answer is: ";
	echo  $var+$var1;
	$var1=$var+$var1;
	echo "<br>";
	echo $GLOBALS['var2']."i call with GLOBALS[] syntax" ;
}
FunctionName();
echo $var1;

?>