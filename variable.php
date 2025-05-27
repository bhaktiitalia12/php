<?php
$x = 10;
$y = 20;
$z = $x + $y;
echo "X : " . $x;
echo "<br><br>";
echo "Y : " . $y;
echo "<br><br>";
echo "Z : " . $z;
echo "<br><br>";
echo "Total sum is : " . $z;
echo "<br><br>";
$name = "Bhakti italia";
echo "My name is : " . $name;

$pass = true;
echo "<br><br>";
echo $name . " is " . $pass . "(pass)";

$num = 3.321;
echo "<br><br>";
echo "number is " . $num;

$arr = array("mango", true, "banana", 101, "apple", "grapes", 99);

echo "<br><br>";
echo var_dump($arr);
echo "<br><br>";
echo $arr[0];
echo "<br><br>";
echo $arr[1];
echo "<br><br>";
echo $arr[2];
echo "<br><br>";
echo $arr[3];
echo "<br><br>";

echo "X : ";
echo var_dump($x);
echo "<br><br>";
echo "Num : ";
echo var_dump($num);
echo "<br><br>";
echo "Name : ";
echo var_dump($name);
echo "<br><br>";
