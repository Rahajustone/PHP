<?php
echo "les't see static variable as you know the definition of it from c programing languge <br><br><br>";
echo "--------------static variable are variable when function is finishe it store variable and doestn destroit----------<br><br>";
echo "--static variable inside function----<br>";
function FunctionName()
 {
 	static $var="i am a static variable<br>";#stati variable as local variable
 	echo "static variable value:$var<br>";
 	static $x=0;
 	$x=$x+1;
 	echo "value of x is increased:$x<br>";
 } 
 FunctionName();
 FunctionName();
 FunctionName();
 //echo "try to access static var as local value:$var<br>"; never  true
 echo "<br><br><br>";
 echo "---STATIC GLOBAL VARIABLES----<br>";
 static $var1=10;
 $var1++;
 echo $var1."<br>";
 $var1++;
  echo $var1."<br>";
  for ($i=1; $i<5 ; $i++) {
  	 $var1++;
  	echo "$var1<br>";
  }
?>