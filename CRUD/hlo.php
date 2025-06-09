<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
  <?php
  include 'connection.php'; ?>

  <div class="container mt-5">
    <form class="d-flex mb-3" method="GET" action="viewdata.php">
      <input type="text" class="form-control me-2" name="search" placeholder="Search by name or email"
        value="<?php echo $_GET['search'] ?? ''; ?>">
      <button class="btn btn-primary me-2" type="submit">Search</button>
    </form>

    <!-- 🔁 Sort Buttons -->
    <div class="mb-4">
      <a href="viewdata.php?name=asc<?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>"
        class="btn btn-success me-2">Sort Ascending</a>
      <a href="viewdata.php?name=desc<?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>"
        class="btn btn-danger">Sort Descending</a>
    </div>

  </div>
  <?php
  include 'delete.php';


  // Search logic or Fetch data from the database-------------------------------------------------------
  $search = $_GET['search'] ?? '';
  $name = ($_GET['name'] ?? 'asc') === 'desc' ? 'desc' : 'asc';
  if (!empty($search)) {
    $search = mysqli_real_escape_string($conn, $search);
    $sql = "SELECT * FROM userdata WHERE name LIKE '%$search%'";
  } else {
    $sql = "SELECT * FROM userdata ORDER BY name $name";
  }


  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<div class='container mt-5'>";
    echo "<h2 class='mb-4'>User Data</h2>";
    echo "<table class='table table-bordered'>";
    echo "<thead class='table-dark'><tr>
          <th class='text-center align-middle'>ID</th>
          <th class='text-center align-middle'
          >Name 
          <i class='bi bi-sort-alpha-down'></i>
          <i class='bi bi-sort-alpha-up'></i>
          </th>
          
          <th class='text-center align-middle'>Mobile No</th>
          <th class='text-center align-middle'>Image</th>
          <th class='text-center align-middle'>Update</th>
          <th class='text-center align-middle'>Delete</th></tr>
          </thead>";
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td class='text-center align-middle'>" . $row['sno'] . "</td>";
      echo "<td class='text-center align-middle'>" . htmlspecialchars($row['name']) . "</td>";
      echo "<td class='text-center align-middle'>" . htmlspecialchars($row['mno']) . "</td>";
      echo "<td class='text-center align-middle'><img src='" . htmlspecialchars($row['image']) . "' alt='User Image' style='width: 50px; height: 50px;'></td>";
      echo "<td class='text-center align-middle'><a href='update.php?sno=" . $row['sno'] . "' style='background-color:#0d6efd; color:white; padding:5px 12px; border:none; text-decoration:none; border-radius:5px;'>Update</a></td>";
      echo "<td class='text-center align-middle'><a href='viewdata.php?sno=" . $row['sno'] . "' style='background-color:#C70039; color:white; padding:5px 12px; border:none; text-decoration:none; border-radius:5px;'>Delete</a></td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
  } else {
    echo "<div class='container mt-5'><div class='alert alert-info'>No records found.</div></div>";
  }
  ?>
</body>

</html>