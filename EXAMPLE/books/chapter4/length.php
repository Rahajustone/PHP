#!/usr/bin/php
<?php
$string="i am a string , w string";
echo "string length:".strlen($string);

echo "\n";
echo "string word count:".str_word_count($string);
echo "\n";
#accesing charachter in a string
echo "charachter:".$string[0];
echo "\n";
echo substr($string, 6,10);//to write or find a substring
echo "\n";
echo "to see the:".strstr($string, "str");//to search whether if a word or character is in astring or not
echo "\n";
echo "index or position:".strpos($string, "w");//return position or index
echo "\n";
echo "index or poition from last:".strrpos($string, "w");
echo "\n";
echo "sub str count word:".substr_count($string, "string");//tell how many times a word is came 
echo "\n";
echo "to find a word by a charachter:".strpbrk($string, "a!");
echo "\n";
?>
