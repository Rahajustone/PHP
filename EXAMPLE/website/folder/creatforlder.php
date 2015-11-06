<?php
$a=fopen('raha.txt', 'w');
fwrite($a, 'my name is raha');
fread($a, length($a));

?>