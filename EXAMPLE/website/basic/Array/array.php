<?php
echo "<br>------create and access array-------<br>";
$cars = array("Volvo", "BMW", "Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
echo "<br>------count method------<br>";
echo count($cars);
echo "<br>------count method------<br>";
$cars = array("Volvo", "BMW", "Toyota");
$arrlength = count($cars);
echo "<br>------array inside loop method------<br>";
for($x = 0; $x < $arrlength; $x++) {
    echo $cars[$x];
    echo "<br>";}

 echo "<br>------associative arrays lokk like ruby array-----<br>";
    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "Peter is " . $age['Peter'] . " years old.";


echo "<br>------lopp method to access associative array------<br>";
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach($age as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
?>