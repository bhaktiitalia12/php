<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data</title></title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
  

<?php
//connect to the database
$servername  =  "localhost";
$username = "root";
$password = "";
$dbname = "contacts";

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

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

// ✅ Display data logic------------------------------------------------------------

$sql = "select * from contactus";
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
  //   $row = mysqli_fetch_assoc($result);
  //   echo var_dump($row);
  //   echo "<br>";
  //    $row = mysqli_fetch_assoc($result);
  //   echo var_dump($row);
  //   echo "<br>";

  echo "<br>";
  echo "<table border='1' cellpadding='10' cellspacing='0' align='center'>";
  echo "<tr>";
  echo "<th >Sno</th>";
  echo "<th>Name</th>";
  echo "<th>Email</th>";
  echo "<th>Concern</th>";
  echo "<th>Date</th>";
  echo "<th>Update</th>";
  echo "<th>Delete</th>";
  echo "</tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    //echo var_dump($row);
    // echo "Sno: " . $row['sno'] . "<br>";
    // echo "Name: " . $row['name'] . "<br>";
    // echo "Email: " . $row['email'] . "<br>";
    // echo "Concern: " . $row['concern'] . "<br>";
    // echo "Date: " . $row['date'] . "<br>";
    // echo "<br>";

    echo "<tr>";
    echo "<td>" . $row['sno'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['concern'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td><a href='update.php?sno=" . $row['sno'] . "'>Update</a></td>";
    // echo "<td><a href='selectdata.php?sno=" . $row['sno'] . "'>Delete</a></td>";
    echo "<td><a href='selectdata.php?sno=" . $row['sno'] . "' >Delete</a></td>";
    echo "</tr>";
  }
  echo "</table>";
  echo "<br>";
}
?>
</body>
</html>
