#!/usr/bin/php
<?php
$arrayname=array('name',"surname",'age','school');
$arraynameass=array('name'=>'john','surname'=>'funtik',"age"=>21,'school'=>"hight school");
echo "\n";
print_r($arrayname);
echo "\n";
print_r($arraynameass);
#some other function we will go to seee#
echo "\n";
$currentval=current($arrayname);
print_r($currentval);
echo "\n";
echo "key element: ".key($arrayname);
echo "\n";
echo "next element: ".next($arrayname);
echo "\n";
echo "key element: ".key($arrayname);
echo "\n";
echo "prev element: ".prev($arrayname);
echo "\n";
echo "end element: ".end($arrayname);
echo "\n";

echo "reset element: ".reset($arrayname);
echo "\n";


?>