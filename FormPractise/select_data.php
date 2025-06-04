<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Select Data</title>
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

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
  </style>

</head>

<body>
  <?php
  //connect to the database
  $servername  =  "localhost";
  $username = "root";
  $password = "";
  $dbname = "date";

  //create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // DELETE logic---------------------------------------------------------
  if (isset($_GET['sno'])) {
    $snoToDelete = $_GET['sno'];
    $deleteSql = "DELETE FROM datetime WHERE sno = $snoToDelete";
    $deleteResult = mysqli_query($conn, $deleteSql);

    if ($deleteResult) {
      echo "<div style='color:green;'>Record deleted successfully</div>";
     
      header("Location: select_data.php");
      exit();
    } else {
      echo "<div style='color:red;'>Error deleting record: " . mysqli_error($conn) . "</div>";
    }
  }

  // display data logic------------------------------------------------------------

  $sql = "select * from datetime";
  $result = mysqli_query($conn, $sql);

  //find the number of rows returned
  $num = mysqli_num_rows($result);
  ?>

  <br>
  <div style='text-align:center'>
    <h2>Number of rows returned : <?= $num ?></h2>
  </div>


  <?php if ($num > 0) { ?>

    <table cellpadding='10' cellspacing='0'>
      <th>Sno</th>
      <th>Date</th>
      <th>Days</th>
      <th>Time</th>
      <th>Update</th>
      <th>Delete</th>
      <th>Date picker</th>
      <th>After 10 day</th>

      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
          <td> <?= $row['sno']; ?></td>
          <td><?= $row['date']; ?></td>
          <td><?= $row['days']; ?></td>
          <td><?= $row['time']; ?></td>
          <td><a href='update_data.php?sno=<?= $row['sno']; ?>'
              style='background-color:#0d6efd; color:white; padding:5px 12px; border:none; text-decoration:none; border-radius:5px;'>Update</a></td>

          <td> <a href='select_data.php?sno=<?= $row['sno']; ?>' style='background-color:#C70039; color:white; padding:5px 12px; border:none; text-decoration:none; border-radius:5px;'>Delete</a></td>
          <td> <a href='select_date.php?sno=<?= $row['sno']; ?>' style='background-color:#03a89d; color:white; padding:5px 12px; border:none; text-decoration:none; border-radius:5px;'>Select Date</a></td>
          <td> <a href='ten_day.php?sno=<?= $row['sno']; ?>' style='background-color:#3b7839; color:white; padding:5px 12px; border:none; text-decoration:none; border-radius:5px;'>After 10 day</a></td>
        </tr>
      <?php } ?>
    </table>
    <br>
  <?php } ?>
</body>

</html>