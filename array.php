<?php
$color=array("red", "green", "blue", "yellow");
echo count($color);
echo "<br>";
echo  var_dump($color);
echo "<br>";

echo $color[0]="red"; 
echo "<br>";
array_push($color,"black");
echo "<br>";

echo "<b>Array Value</b><br>";
foreach ($color as  $value) {
  echo $value ."<br>";
  # code...
}

function hello(){
  echo "hello world";
}

$arr = array(1,2,["apple","banana","orange"],hello());
echo $arr[3];
$arr[1] = "BHAKTI";
var_dump($arr);
echo "<br>";
echo $arr[2][1];