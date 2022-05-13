<?php 
// swaping without using third variable;
//1st method
/*$a=20;
$b=30;
$a=$a+$b;
$b=$a-$b;
$a=$a-$b;
echo "a= ".$a;
echo "<br>";
echo "b= ". $b;
*/
// 2nd method
/*$a=20;
$b=30;
$a=$a*$b;
$b=$a/$b;
$a=$a/$b;
echo "  value of  a:$a <br>";
echo " value of b:$b";
*/
// swapping using third variable
$a=10;
$b=20;
$c=$a+$b;
$a=$c-$a;
$b=$c-$b;
echo " value of a:$a <br>";
echo "value of b:$b ";



?>