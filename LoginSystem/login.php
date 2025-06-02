<?php
$login = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'partials/dbconnect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];



  // $sql = "SELECT * FROM `users` WHERE username = '$username' and password = '$password'";
  $sql = "SELECT * FROM `users` WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['password'])) {
        // Password is correct
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: welcome.php");
      } else {
        // Password is incorrect
        $showError = "Invalid Credentials";
      }
    }
  } else {
    $showError = "Invalid Credentials";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
  <?php require 'partials/_nav.php' ?>
  <?php
  if ($login) {
    echo '<div class="alert alert-success alert-dismissible" role="alert">
    <strong>Success!</strong> Your are logged in now.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>';
  }
  if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
    <strong>Error!</strong> ' . $showError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>';
  }
  ?>
  <div class="container my-4">
    <h1 class="text-center">Login to our website</h1>
    <form action="login.php" method="post">
      <div class="mb-3 my-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>

      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>

</body>

</html>