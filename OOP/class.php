<?php

class Fruit
{
  public $name;
  public function __construct()
  {
    echo "This is a fruit class constructor";
    echo "<br>";
  }


  public function getdata()
  {
    echo "the name of the fruit is :" . $this->name;
    echo "<br>";
  }
}

$fruit1 = new Fruit();
$fruit1->name = "Apple";
$fruit1->getdata();

echo "<br>";



