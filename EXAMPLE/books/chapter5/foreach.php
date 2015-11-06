#!/usr/bin/php
<?php
$arrayname=array('name',"surname",'age','school');
$arraynameass=array('name'=>'john','surname'=>'funtik',"age"=>21,'school'=>"hight school");
foreach ($arraynameass as $key => $value) {
	echo "--\n--";
	echo "key: ".$key." values:".$value;
	echo "**\n**";

	
}


?>