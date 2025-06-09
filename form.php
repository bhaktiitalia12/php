<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $course = $_POST["course"];
    $errors = [];

    if (empty($name)) $errors[] = "Name is required.";
    if (empty($email)) $errors[] = "Email is required.";
    if (empty($course)) $errors[] = "Course is required.";

    if (empty($errors)) {
      $entry = "Name: $name, Email: $email, Course: $course\n";
      file_put_contents("courses.txt", $entry, FILE_APPEND);
      echo "<p style='color:green;'>Student registered!</p>";
    } else {
      foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
      }
    }
  }

  if (isset($_POST["delete"])) {
    file_put_contents("courses.txt", "");
    echo "<p style='color:red;'>All records deleted.</p>";
  }
}
?>

<form method="POST">
  Name: <input type="text" name="name"><br>
  Email: <input type="email" name="email"><br>
  Course: <input type="text" name="course"><br>
  <input type="submit" name="submit" value="Register">
  <input type="submit" name="delete" value="Delete All">
</form>

<h3>Registered Students:</h3>
<pre><?php
      if (file_exists("courses.txt")) {
        echo htmlspecialchars(file_get_contents("courses.txt"));
      }
      ?></pre>