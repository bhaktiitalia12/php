<?php
echo "<h3>Scope</h3>";
// Global variable

$a = 66;
$b = 77;
function test()
{
  // $a = 10; 
  global $a, $b;
  $a = 190;
  $b = 200;
  echo "the of variable is $b";
  echo "<br>";
  echo "the of variable is $a";
}


echo $a . "<br>";
echo $b . "<br>";
test();
echo "<br>";
echo $a . "<br>";
echo $b . "<br>";
echo var_dump(($GLOBALS));
echo "<br>";
echo var_dump($GLOBALS["a"]);
echo "<br>";
echo var_dump($GLOBALS["b"]);
echo "<br>";
