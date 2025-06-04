<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
    }
  </style>
</head>

<body>
  <?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $department = $_POST['department'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die("Don't connect database" . mysqli_connect_error());
    } else {
      echo "Connect successfully..<br>";
    }
  }
  ?>

  <h1 style="text-align: center;">
    Basic Form
  </h1>
  <div style="text-align: center;">
    <form>
      <div style="margin-bottom: 20px;">
        <label for="name">Name</label>
        <input name="name" id="name" type="text" />
      </div>
      <div style="margin-bottom: 20px;">
        <label for="salary">Salary</label>
        <input name="salary" id="salary" type="text" />
      </div>
      <div style="margin-bottom: 20px;">
        <label for="department">Depa..</label>
        <input name="department" id="department" type="text" />
      </div>
      <button type="submit">Insert</button>
    </form>
  </div>
</body>

</html>