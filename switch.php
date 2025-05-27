<?php
$day = 7;
switch ($day) {
  case 1:
    echo "Monday";
    break;
  case 2:
    echo "Tuesday";
    break;
  case 3:
    echo "Wednesday";
    break;
  case 4:
    echo "Thursday";
    break;
  case 5:
    echo "Friday";
    break;
  case 6:
    echo "Saturday";
    break;
  case 7:
    echo "Sunday";
    break;
  default:
    echo "Invalid day";
}
echo "<br>";

$favcolor = "red";

switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!";
  case "blue":
    "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
