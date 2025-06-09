<?php
include 'connection.php';

if (isset($_GET['sno'])) {
  $snoToDelete = $_GET['sno'];
  $deleteSql = "DELETE FROM userdata WHERE sno = $snoToDelete";
  $deleteResult = mysqli_query($conn, $deleteSql);

  if ($deleteResult) {
    echo "<div style='color:green;'>Record deleted successfully</div>";
    // Optional: redirect to avoid deleting again on refresh
    header("Location: viewdata.php");
    exit();
  } else {
    echo "<div style='color:red;'>Error deleting record: " . mysqli_error($conn) . "</div>";
  }
}
