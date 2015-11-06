#!/usr/bin/php
<?php
$myBooks=array(
	array("title"=>"TheGrapesof Wrath","author" => "John Steinbeck","pubYear"=> 1939),
	array("title" =>"TheTrial","author"=>"FranzKafka","pubYear"=>1925),
	array("title"=>"TheHobbit","author"=>"J.R.R.Tolkien","pubYear"=>1937),
	array("title"=>"ATaleofTwoCities","author"=>"CharlesDickens","pubYear"=>1859));

print_r($myBooks);
echo "\n";
#i want to print just array
foreach ($myBooks as $key) {
	print_r($key);
	echo "\n";
	
}
foreach ($myBooks as $key) {
	foreach ($key as $value=>$val) {
		echo("name: ".$value."- values: ".$val);
	echo "\n";
	
		
	}
	
}
?>


