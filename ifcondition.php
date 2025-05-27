<?php
$age = 23;

if ($age >= 18) {
  echo "You can vote<br>";
} else {
  echo "You cannot vote<br>";
}
// Output: You can vote

$marks = 87;
if ($marks >= 80 && $marks < 100) {
  echo "you are in first in class";
} elseif ($marks >= 60 && $marks < 80) {
  echo "you are in second in class";
} else {
  echo "you are in third in class";
}
// Output: you are in first in class
