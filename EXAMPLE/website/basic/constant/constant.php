<?php
define("constant1", "hello");//create a constatn without a casesensitive 
echo "<br>-------creating constant---------<br><br>";
echo  constant1;
echo "<br>-------creating constant with case sensitive ---------<br><br>";
define('name', 'rahmatrullo',true);//we of case-sensitive
echo name;
echo "<br>";
echo NAme;

echo "<br>-------constant is a global value ---------<br><br>";
define('name', 'raha');
function func1(){
	echo  name;
}
func1();


?>