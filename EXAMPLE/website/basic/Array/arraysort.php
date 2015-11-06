<?php
print("<br>-----------sort array and it function--------<br>");

$ar1=array(1,2,3.32,43,5,12,23,43,53,1,2,12,12342,42,1234,1241,41512,512,51251,25125,12512,5125,121,1,2121,21,4,5);
sort($ar1);
foreach($ar1 as $ar2){
echo "  $ar2 , ";
}
rsort($ar1);
foreach($ar1 as $ar2){
echo "  $ar2 , ";
}
?>