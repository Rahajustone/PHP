#!/usr/bin/php
<?php
$arrayname=array("raha",1,2);
for ($i=0; $i<3; $i++) {
	echo "array:".$i;
	echo "\n";
	echo "array value: ".$arrayname[$i];
	echo "\n";
	} 

print_r($arrayname);//to print out all array element
#array slice-a part
echo "\n";
$names=array("jack","john","funtik","jackson","jack1","john1","funtik1","jackson1");
$arrayslicenames=array_slice($names,2,4);
print_r($arrayslicenames);
echo "\n";

#associative array
$assarrays=array("name"=>"john","surname"=>"funtik");
print_r($assarrays);
echo('name:'.$assarrays["name"]);
echo "\n";
#count function in array
$carray=count($arrayname);
echo "count value:".$carray;
echo "\n";
echo "count value:".count($names);
echo "\n";
echo "count value:".count($assarrays);
echo "\n";
	?>