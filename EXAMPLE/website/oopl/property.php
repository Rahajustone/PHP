#!/usr/bin/php

<?php
#creation of class

class Person{
	public $name;//you can access it from every where within class or outside class(from another class) 
	private $surname;//you can ony access it from this class
	protected $age;//it behave like private property but  when use inheritance you can access it from another's classes
	public static $statvar;//static variable inside class
}
$myfirst=new Person();//creation of objets
$myfirst->name="Jack";//you can access global
$myfirst->this->surname='John';//for accesing private use this words
$myfirst->this->age=15;//for accesing protected use this words

#to access static varibale classname::$property

  $var=Person::$statvar='i am a static variable';

print_r($myfirst);
print($var);

?>