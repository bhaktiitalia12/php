<?php
$color = array("red", "green", "blue", "yellow");
echo count($color);
echo "<br>";
echo  var_dump($color);
echo "<br>";

echo $color[0] = "red";
echo "<br>";
array_push($color, "black");
echo "<br>";

echo "<b>Array Value</b><br>";
foreach ($color as  $value) {
  echo $value . "<br>";
  # code...
}

function hello()
{
  echo "hello world";
}

$arr = array(1, 2, ["apple", "banana", "orange"], hello());
echo $arr[3];
$arr[1] = "BHAKTI";
var_dump($arr);
echo "<br>";
echo $arr[2][1];

echo "<br>";

// Step 1: Create associative array
$student = [
  "name" => "Bhakti",
  "age" => 21,
  "email" => "bhakti@example.com",
  "course" => "PHP"
];

// Step 2: Print values by key
echo "Name: " . $student["name"] . "<br>";
echo "Age: " . $student["age"] . "<br>";
echo "Email: " . $student["email"] . "<br>";
echo "Course: " . $student["course"] . "<br>";

// Step 3: Loop with foreach
foreach ($student as $key => $value) {
  echo "$key: $value<br>";
}

// Step 4: Add status
$student["status"] = "active";

// Step 5: Count elements
echo "Total items: " . count($student) . '<br>';
echo $student["status"] . "<br><br>";

$emp = [
  ["name" => "Bhakti", "age" => 21, "id" => 1],
  ["name" => "Dhamo", "age" => 20, "id" => 2],
  ["name" => "John", "age" => 24, "id" => 3],
  ["name" => "Doe", "age" => 19, "id" => 4]
];

echo $emp[1]["name"] . "<br>";

foreach ($emp as $employee) {
  echo "Name: " . $employee["name"] . ", Age: " . $employee["age"] . ", Id: " . $employee["id"] . "<br>";
}

echo "<br><br>";

$std = [
  ["name" => "abc", "email" => "abc@gmail.com", "course" => "BCA"],
  ["name" => "xyz", "email" => "xyz@gmail.com", "course" => "BBA"],
  ["name" => "pqr", "email" => "pqr@gmail.com", "course" => "Bcom"]
];

echo $std[1]["course"] . "<br>";

foreach ($std as $student) {
  echo "Name: " . $student["name"] . ", Email: " . $student["email"] . ", Course: " . $student["course"] . "<br><br>";
}

// Step 3: Loop through all students
foreach ($std as $student) {
  echo "Name: " . $student["name"] . "<br>";
  echo "Email: " . $student["email"] . "<br>";
  echo "Course: " . $student["course"] . "<br><br>";
}

echo "<br><br>";

echo '<form method="POST" action="">
  Name: <input type="text" name="name"><br>
  Email: <input type="email" name="email"><br>
  Course: <input type="text" name="course"><br>
  <input type="submit" value="Submit">
</form>';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $course = $_POST["course"];

  $errors = [];

  if (empty($name)) {
    $errors[] = "Name is required.";
  }

  if (empty($email)) {
    $errors[] = "Email is required.";
  }

  if (empty($course)) {
    $errors[] = "Course is required.";
  }

  if (count($errors) > 0) {
    foreach ($errors as $error) {
      echo "<p style='color:red;'>$error</p>";
    }
  } else {
    echo "Hello, $name!<br>";
    echo "You are enrolled in $course with email: $email";
  }
}



session_start(); // Start session to store data temporarily

if (!isset($_SESSION["students"])) {
  $_SESSION["students"] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $course = $_POST["course"];
  $errors = [];

  if (empty($name)) $errors[] = "Name is required.";
  if (empty($email)) $errors[] = "Email is required.";
  if (empty($course)) $errors[] = "Course is required.";

  if (empty($errors)) {
    $student = [
      "name" => $name,
      "email" => $email,
      "course" => $course
    ];
    $_SESSION["students"][] = $student;
    echo "<p style='color:green;'>Student added successfully!</p>";
  } else {
    foreach ($errors as $error) {
      echo "<p style='color:red;'>$error</p>";
    }
  }
}

 echo '<form method="POST" action="">
  Name: <input type="text" name="name"><br>
  Email: <input type="email" name="email"><br>
  Course: <input type="text" name="course"><br>
  <input type="submit" value="Submit">
</form>';

if (!empty($_SESSION["students"])) {
  echo "<h3>Student List</h3>";
  echo "<table border='1' cellpadding='5'>";
  echo "<tr><th>Name</th><th>Email</th><th>Course</th></tr>";
  foreach ($_SESSION["students"] as $s) {
    echo "<tr>";
    echo "<td>" . $s["name"] . "</td>";
    echo "<td>" . $s["email"] . "</td>";
    echo "<td>" . $s["course"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
}


?>

