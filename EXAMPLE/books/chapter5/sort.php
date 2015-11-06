#!/usr/bin/php
<?php

#sort() rsort() for indexed arrat sort  #
$mybook=array('name','surname','age');
echo "\n";
print_r($mybook);
echo "\n";
sort($mybook);
print_r($mybook);
echo "\n";
echo "\n";

echo "reversed sort";
echo "\n";
rsort($mybook);
print_r($mybook);
echo "\n";
#associated sort function asort() arsort()#
echo "########ASSOCIATE ARRAY SORT###########";
$myBooks=array(
	array("title"=>"TheGrapesof Wrath","author" => "John Steinbeck","pubYear"=> 1939),
	array("title" =>"TheTrial","author"=>"FranzKafka","pubYear"=>1925),
	array("title"=>"TheHobbit","author"=>"J.R.R.Tolkien","pubYear"=>1937),
	array("title"=>"ATaleofTwoCities","author"=>"CharlesDickens","pubYear"=>1859));


echo "\n";
echo "\n normal \n";
print_r($myBooks);
echo "\n";
echo "\n sorted \n";
asort($myBooks);
print_r($myBooks);
echo "\n";
echo "\n";

echo "reversed sort";
echo "\n";
arsort($myBooks);
print_r($myBooks);
echo "\n";
?>


