<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      padding: 14px;
      border-collapse: collapse;

    }
    table {
      align-items: center;
    }
  </style>


</head>

<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
  <div class="container mt-5">

    <form class="d-flex mb-3" method="GET" action="selectdata.php">
      <input type="text" class="form-control me-2" name="search" placeholder="Search by name or email"
        value="<?php echo $_GET['search'] ?? ''; ?>">
      <button class="btn btn-primary me-2" type="submit">Search</button>
    </form>

    <!-- 🔁 Sort Buttons -->
    <div class="mb-4">
      <a href="selectdata.php?order=asc<?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>"
        class="btn btn-success me-2">Sort Ascending</a>
      <a href="selectdata.php?order=desc<?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>"
        class="btn btn-danger">Sort Descending</a>
    </div>

  </div>

  <?php
  //connect to the database
  $servername  =  "localhost";
  $username = "root";
  $password = "";
  $dbname = "contacts";

  //create connection----------------------------------------------------------
  $conn = mysqli_connect($servername, $username, $password, $dbname, 3307);

  //die if connection fails
  // if (!$conn) {
  //   die("connection failed:" . mysqli_connect_error());
  // } else {
  //   echo "Connected successfully<br>";
  // }

  // echo "Connected to existing database '$dbname' successfully!<br>";

  // ✅ DELETE logic---------------------------------------------------------
  if (isset($_GET['sno'])) {
    $snoToDelete = $_GET['sno'];
    $deleteSql = "DELETE FROM contactus WHERE sno = $snoToDelete";
    $deleteResult = mysqli_query($conn, $deleteSql);

    if ($deleteResult) {
      echo "<div style='color:green;'>Record deleted successfully</div>";
      // Optional: redirect to avoid deleting again on refresh
      header("Location: selectdata.php");
      exit();
    } else {
      echo "<div style='color:red;'>Error deleting record: " . mysqli_error($conn) . "</div>";
    }
  }

  // Search logic
  $search = $_GET['search'] ?? '';
  $order = ($_GET['order'] ?? 'asc') === 'desc' ? 'desc' : 'asc';
  if (!empty($search)) {
    $search = mysqli_real_escape_string($conn, $search);
    $sql = "SELECT * FROM contactus WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR concern LIKE '%$search%'";
  } else {
    $sql = "SELECT * FROM contactus ORDER BY name $order";
  }


  // ✅ Display data logic------------------------------------------------------------

  // $sql = "select * from contactus";
  $result = mysqli_query($conn, $sql);
  // if ($result) {
  //   echo "Data selected successfully<br>";
  // } else {
  //   echo "error selecting data: " . mysqli_error($conn);
  // }

  echo "<br>";
  //find the number of rows returned
  $num = mysqli_num_rows($result);

  echo "<div style='text-align:center'><h2>Number of rows returned : $num</h2></div>";


  //display the data -------------------------------------------------------------
  if ($num > 0) {

    echo "<br>";
    echo "<table border='1' cellpadding='10' cellspacing='0' align='center'>";
    echo "<tr>";
    echo "<th>Sno</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Concern</th>";
    echo "<th>Date</th>";
    echo "<th>Gender</th>";
    echo "<th>Hobbies</th>";
    echo "<th>Update</th>";
    echo "<th>Delete</th>";

    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {

      echo "<tr>";
      echo "<td>" . $row['sno'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td>" . $row['concern'] . "</td>";
      echo "<td>" . $row['date'] . "</td>";
      echo "<td>" . $row['gender'] . "</td>";
      echo "<td>" . $row['hobbies'] . "</td>";
      echo "<td><a href='update.php?sno=" . $row['sno'] . "' style='background-color:#0d6efd; color:white; padding:5px 12px; border:none; text-decoration:none; border-radius:5px;'>Update</a></td>";

      echo "<td><a href='selectdata.php?sno=" . $row['sno'] . "' style='background-color:#C70039; color:white; padding:5px 12px; border:none; text-decoration:none; border-radius:5px;'>Delete</a></td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
  }
  ?>
</body>

</html>