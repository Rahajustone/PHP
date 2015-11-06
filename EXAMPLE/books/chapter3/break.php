<?php
for ($i=0; $i <100 ; $i++) {
	echo "number:".$i;
	echo "\n"; 
	echo "<br/>"; 
	if ($i==50) {
	 echo "break down";
	 break;
	}
	else if ($i==80) {
		echo "continue";
		continue;
		# code...
	}
	
}
?>