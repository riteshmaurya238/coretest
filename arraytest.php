<?php 
/*
$a = array('a' => "car",'b'=>"bus",'c'=>"train" );
$d="cars";
array_push($a, $d);
echo "<pre>";
print_r($a);

*/
?>
<?php
/*$cars=array("Volvo","BMW","Toyota","Honda","Mercedes");
print_r(array_chunk($cars,4));
?>
<?php
  $array = array("a","k","j", "l");
  $size = sizeof($array);

  for($i=$size-1; $i>=0; $i--){
      echo $array[$i];
  }
  echo "<br>";
  //using array key
  $r=array_reverse($array);
  print_r($r);
  echo "</br>";
  $k=array(1,2,3,22,11,22,22,22,22,1144,33,55);
 // max($k);
  print_r(array_unique($k));
  */
  $a="6";
  $b="5";
  $c=$a*$b;
  //echo $a."maurya";
  echo $c;
?>