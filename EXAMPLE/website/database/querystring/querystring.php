<html>
<body>
<?php
#building a query string 
$name='raha';
$surname='kholov';
$queryString = "name=$name &amp;surname=$surname";
echo ' <p> < a href="querystring.php?' . $queryString . '" > Find out more info on
this person < /a > < /p > '; 
?>
</body>