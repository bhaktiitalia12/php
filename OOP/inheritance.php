<!-- A child class inherits properties and methods from a parent class. -->
<?php
class animal
{
  protected $name;
  public function tail()
  {
    echo "Animal speaks";
    echo "<br>";
    echo $this->name = "Lion";
    echo "<br>";
  }
}

class dog extends animal
{
  public function speak()
  {
    echo "Dog barks";
    echo "<br>";
    $this->name = "Miew";
    echo " The name of the dog is: " . $this->name;
    echo "<br>";
    $this->tail(); // Calling parent method
    echo "<br>";
  }
}


$newDog = new dog();
$newDog->speak(); // Output: Dog barks



class Math
{
  public static $pi = 3.14;

  public static function square($x)
  {

    return $x * $x;
  }
}

// echo Math::$pi; // 3.14
echo Math::square(5); // 25
echo "<br>";

class Circle
{
  public $radius;

  public function __construct($r)
  {
    $this->radius = $r;
  }

  public function area()
  {
    return Math::square($this->radius) * Math::$pi;
  }
}
$circle = new Circle(5);
echo $circle->area(); // 78.5
echo "<br>";



class Animal1
{
  // protected $name; // Protected property, accessible in child classes
  public $name; // Public property, accessible everywhere

  public function setName($n)
  {
    $this->name = $n;
  }
}

class Dogg extends Animal1
{
  public function bark()
  {
    echo "I am $this->name and I bark!";
  }
}

$dog2 = new Dogg();
$dog2->setName("Miew");
$dog2->bark();  // ✅ Output: I am Miew and I bark!

echo $dog2->name; //  Error: Cannot access protected property Animal1::$name
