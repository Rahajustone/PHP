#!/usr/bin/php
<?php
/**
* 
*/
class Hello {
	
	public function __get($value)
	{
		echo "the value must be '$value' ";
		return "blue";
	}

	
}
$x=new  Hello();
	$xy=$x->color;
	echo $xy;

?>