<?php
echo "For each Loop<br>";
$colors = array("red", "green", "blue", "yellow","black","white","pink","purple","orange","brown");
foreach ($colors as $value) {
  echo $value  ."<br>";
}

$newDate = date("Y-m-d H:i:s");
echo "The date is : $newDate  <br>";
$newDate = date("Y-M-d H:i:s A" );
echo "The date is : $newDate  <br>";
$newDate = date("Y-m-d H:i:s a");
echo "The date is : $newDate  <br>";