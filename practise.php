<!-- Create a file named math.php.
Declare two numbers: $x = 12; and $y = 5;
Calculate and print:
Sum
Difference
Product
Quotient
Remainder -->

<?php
$x = 12;
$y = 5;
$sum = $x + $y;
$difference = $x - $y;
$product = $x * $y;
$quotient = $x / $y;
$remainder = $x % $y;

echo "Math Operations:<br>";
echo "Sum: $x + $y = $sum<br>";
echo "Difference: $x - $y = $difference<br>";
echo "Product: $x * $y = $product<br>";
echo "Quotient: $x / $y = $quotient<br>";
echo "Remainder: $x % $y = $remainder<br>";

// Create a file named check_age.php that:
// Asks for a person’s age (just hardcode it in a variable).
// If age >= 18, echo "Adult".
// If age < 18, echo "Minor".

$age = 20;
if ($age >= 18) {
    echo "Adult<br>";
} else {
    echo "Minor<br>";
}

// Create a file called check_grade.php and:
// Set a variable $marks = 67;
// Use if...elseif...else to print:
// 90-100 → Grade A
// 75-89 → Grade B
// 60-74 → Grade C
// Below 60 → Fail

$marks = 67;
if ($marks >= 90 && $marks <= 100) {
    echo "Grade A<br>";
} elseif ($marks >= 75 && $marks < 90) {
    echo "Grade B<br>";
} elseif ($marks >= 60 && $marks < 75) {
    echo "Grade C<br>";
} else {
    echo "Fail<br>";
}

// Create a file called day_message.php:
// Create a $day variable and set it to any day name.
// Use a switch to display a unique message for each day.

$day = "Monday";
switch ($day) {
    case "Monday":
        echo "Start of the week!<br>";
        break;
    case "Tuesday":
        echo "It's Tuesday!<br>";
        break;
    case "Wednesday":
        echo "Midweek already!<br>";
        break;
    case "Thursday":
        echo "Almost Friday!<br>";
        break;
    case "Friday":
        echo "Weekend is near!<br>";
        break;
    case "Saturday":
        echo "It's Saturday! Enjoy!<br>";
        break;
    case "Sunday":
        echo "Relax, it's Sunday!<br>";
        break;
    default:
        echo "Not a valid day!<br>";
}

// Create a file called count.php
// Use a for loop to count from 1 to 10.
// Print each number.

for ($i = 1; $i <= 10; $i++) {
    echo "Count: $i<br>";
}

// Create a file fruits.php:
// Create an array with 5 fruits.
// Use a foreach loop to display each fruit.

$fruits = ["Apple", "banana", "mango", "grapes", "litchi"];
foreach ($fruits as $fruit) {
    echo "fruit name is : $fruit <br>";
}


$users = [
    ["name" => "John", "age" => 20],
    ["name" => "Jane", "age" => 22],
    ["name" => "Bob", "age" => 18]
];

echo $users[1]["name"]; // Jane
echo "<br>";

foreach ($users as $user) {
    echo $user["name"] . " is " . $user["age"] . " years old.<br>";
}


// Create a file named students.php
// Use echo to print each value.

$student = [
    "name" => "Your Name",
    "class" => "10th",
    "roll" => 23,
    "passed" => true,
];
echo "Student Name: " . $student["name"] . "<br>";
echo "Student Class: " . $student["class"] . "<br>";
echo "Student Roll: " . $student["roll"] . "<br>";
echo "Student Roll: " . $student["passed"] . "<br>";


$books = [
    ["book" => "PHP", "author" => "Bhakti"],
    ["book" => "Java", "author" => "Italia"],
    ["book" => "Python", "author" => "Mahi"],
];

foreach ($books as $book) {
    echo "Book Name: " . $book["book"] . "<br>";
    echo "Author Name: " . $book["author"] . "<br>";
}



// 1. Check if a number is even or odd -----------------------------------
echo "<h3>1. Even or Odd</h3>";
$number = 7;
if ($number % 2 == 0) {
    echo "$number is Even<br>";
} else {
    echo "$number is Odd<br>";
}

// 2. Find the largest of three numbers ----------------------------------------
echo "<h3>2. Largest of Three</h3>";
$a = 10;
$b = 25;
$c = 15;
$max = $a;
if ($b > $max) {
    $max = $b;
}
if ($c > $max) {
    $max = $c;
}
echo "The largest number is $max<br>";

// 3. Reverse a string ---------------------------------------------------
echo "<h3>3. Reverse a String</h3>";
$str = "hello";
$reversed = strrev($str);
echo "Reversed string: $reversed<br>";

// 4. Count vowels in a string ------------------------------------------------
echo "<h3>4. Count Vowels</h3>";
$str = "Programming is fun!";
$vowels = ['a', 'e', 'i', 'o', 'u'];
$count = 0;
$str = strtolower($str);
for ($i = 0; $i < strlen($str); $i++) {
    if (in_array($str[$i], $vowels)) {
        $count++;
    }
}
echo "Number of vowels: $count<br>";

// 5. Sum of numbers from 1 to N -----------------------------------------------------------
echo "<h3>5. Sum from 1 to N</h3>";
$n = 100;
$sum = 0;
for ($i = 1; $i <= $n; $i++) {
    $sum += $i;
}
echo "Sum from 1 to $n is: $sum<br>";

// 6. Check if a number is prime ---------------------------------------------------------                                    
echo "<h3>6. Prime Check</h3>";
$num = 33;
$isPrime = true;
if ($num < 2) {
    $isPrime = false;
} else {
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            $isPrime = false;
            break;
        }
    }
}
if ($isPrime) {
    echo "$num is a prime number<br>";
} else {
    echo "$num is not a prime number<br>";
}

function sqrtt($num)
{
    echo $num * $num;
}
sqrtt(6);

echo "<br><br>";
// --------------------------------------------------------------------------
echo "Associative Array<br>";
$girl = array("ring", "hair", "makeup", "dress");

//associative array
$favCol = array(
    "red" => "apple",
    "green" => "grapes",
    "yellow" => "banana",
    "blue" => "sky",
    "black" => "night",
    "white" => "milk",
);

foreach ($favCol as $key => $value) {
    echo $key . " : " . $value . "<br>";
}

echo $favCol["blue"];
echo $favCol["red"];


// --------------------------------------------------------------------------
echo "<br><br>";
echo "Multidimensional Array<br>";
// Multidimensional array
$emp = array(
    [
        "name" => "John",
        "age" => 30,
        "department" => "HR"
    ],
    [
        "name" => "Jane",
        "age" => 25,
        "department" => "IT"
    ],
    [
        "name" => "Bob",
        "age" => 35,
        "department" => "Finance"
    ]
);

echo $emp[1]["name"];
echo "<br>";
foreach ($emp as $key => $value) {
    echo $key . " : ";
    foreach ($value as $k => $v) {
        echo $k . " : " . $v . ", ";
    }
    echo "<br>";
}

echo "<br>";
$multidimensional = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

echo $multidimensional[0][0];
echo "<br>"; // Output: 6
foreach ($multidimensional as $value) {
    foreach ($value as $v) {
        echo $v . " ";
    }
    echo "<br>";
}

echo "<br><br>";
for($i=0; $i< count($multidimensional); $i++){
    for($j=0; $j< count($multidimensional[$i]); $j++){
        echo $multidimensional[$i][$j] . " ~ ";
    }
    echo "<br>";
}
?>