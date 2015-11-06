 <?php
 echo "hello<br>";
$myfile = fopen("/home/raha/Desktop/raha.txt", "r") or die("Unable to open file!");
echo "hi<br>";
fread($myfile,filesize("/home/raha/Desktop/raha.txt"));
fclose($myfile);
?> 