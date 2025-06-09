<?php
$a = ["a", "b", "c", "d"];
echo count($a) . "\n";
echo sizeof($a) . "\n";

$food = array(
  'fruits' => array("apple", "banana", "orange"),
  'vegetables' => array("carrot", "broccoli", "spinach"),
);
echo count($food, 1) . "\n";
echo sizeof($food) . "\n";

$len = count($a,1);
for ($i = 0; $i < $len; $i++) {
  echo  '<br>'. $a[$i] ;
}


print_r(array_count_values($a));


$color = ["black","blue","red","green","pink", 45];
echo in_array("red",$color);
echo '<br>';

if(in_array(45,$color,true)) {
  echo "45 is in the array";
} else {
  echo "45 is not in the array";
}