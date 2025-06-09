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
  <?php include 'connection.php'; ?>

  <div class="container mt-5">
    <!-- Search Form -->
    <form class="d-flex mb-3" method="GET" action="viewdata.php">
      <input type="text" class="form-control me-2" name="search" placeholder="Search by name or mobile"
        value="<?php echo $_GET['search'] ?? ''; ?>">
      <button class="btn btn-primary me-2" type="submit">Search</button>
    </form>

    <?php include 'delete.php'; ?>


    <?php
    
    $search = $_GET['search'] ?? '';
    $nameSort = $_GET['name'] ?? '';
    $idSort = $_GET['id'] ?? '';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = 5;
    $start = ($page - 1) * $limit;

    $countSql = "SELECT COUNT(*) AS total FROM userdata";
    if (!empty($search)) {
      $countSql .= " WHERE name LIKE '%$search%' OR mno LIKE '%$search%'";
    }
    $countResult = mysqli_query($conn, $countSql);
    $totalRow = mysqli_fetch_assoc($countResult);
    $totalRecords = $totalRow['total'];
    $totalPages = ceil($totalRecords / $limit);


    $sql = "select * from userdata";

    if (!empty($search)) {
      $search = mysqli_real_escape_string($conn, $search);
      $sql .= " where name like '%$search%' or mno like '%$search%'";
    }

    // Sorting order
    if ($nameSort === 'asc' || $nameSort === 'desc') {
      $sql .= " order by name $nameSort";
    } elseif ($idSort === 'asc' || $idSort === 'desc') {
      $sql .= " order by sno $idSort";
    }

    $sql .= " LIMIT $start, $limit";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0):
    ?>
      <h2 class="mb-4">User Data</h2>
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <!-- <th class="text-center align-middle">ID</th> -->
            <th class="text-center align-middle">
              Id
              <a href="viewdata.php?id=asc<?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>" class="ms-2 text-white">
                <i class="bi bi-sort-alpha-down"></i>
              </a>
              <a href="viewdata.php?id=desc<?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>" class="text-white">
                <i class="bi bi-sort-alpha-up"></i>
              </a>
            </th>
            <th class="text-center align-middle">
              Name
              <a href="viewdata.php?name=asc<?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>" class="ms-2 text-white">
                <i class="bi bi-sort-alpha-down"></i>
              </a>
              <a href="viewdata.php?name=desc<?php echo isset($_GET['search']) ? '&search=' . $_GET['search'] : ''; ?>" class="text-white">
                <i class="bi bi-sort-alpha-up"></i>
              </a>
            </th>
            <th class="text-center align-middle">Mobile No</th>
            <th class="text-center align-middle">Image</th>
            <th class="text-center align-middle">Update</th>
            <th class="text-center align-middle">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
              <td class="text-center align-middle"><?php echo $row['sno']; ?></td>
              <td class="text-center align-middle"><?php echo htmlspecialchars($row['name']); ?></td>
              <td class="text-center align-middle"><?php echo htmlspecialchars($row['mno']); ?></td>
              <td class="text-center align-middle">
                <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="User Image" style="width: 50px; height: 50px;">
              </td>
              <td class="text-center align-middle">
                <a href="update.php?sno=<?php echo $row['sno']; ?>" class="btn btn-sm btn-primary">Update</a>
              </td>
              <td class="text-center align-middle">
                <a href="viewdata.php?sno=<?php echo $row['sno']; ?>" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      <!-- ⏩ Pagination -->
      <nav>
        <ul class="pagination justify-content-center">
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
              <a class="page-link"
                href="?page=<?php echo $i; ?>
                 <?php echo $search ? '&search=' . $search : ''; ?>
                 <?php echo $nameSort ? '&name=' . $nameSort : ''; ?>
                 <?php echo $idSort ? '&id=' . $idSort : ''; ?>">
                <?php echo $i; ?>
              </a>
            </li>
          <?php endfor; ?>
        </ul>
      </nav>
    <?php else: ?>
      <div class="alert alert-info">No records found.</div>
    <?php endif; ?>
  </div>

</body>

</html>