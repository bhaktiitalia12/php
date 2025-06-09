<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php
  include 'connection.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sno = $_POST['sno'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mno = mysqli_real_escape_string($conn, $_POST['mno']);
    $updateImage = "";

    // Check if image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
      $image = $_FILES['image']['name'];
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($image);

      if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $updateImage = ", image='$target_file'";
      } else {
        echo "<div class='alert alert-danger'>Error uploading file.</div>";
        exit();
      }
    }

    // Update query (image included only if updated)
    $sql = "UPDATE userdata SET name='$name', mno='$mno' $updateImage WHERE sno='$sno'";
    if (mysqli_query($conn, $sql)) {
      echo "<div class='alert alert-success'>Record updated successfully</div>";
      header("Location: viewdata.php");
      exit();
    } else {
      echo "<div class='alert alert-danger'>Error updating record: " . mysqli_error($conn) . "</div>";
    }
  }
  ?>

  <div class="container mt-5">
    <h2>Update User Data</h2>
    <?php
    if (isset($_GET['sno'])) {
      $sno = $_GET['sno'];
      $sql = "SELECT * FROM userdata WHERE sno='$sno'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    ?>
        <form method="POST" enctype="multipart/form-data">
          <input type="hidden" name="sno" value="<?php echo $row['sno']; ?>">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
          </div>
          <div class="mb-3">
            <label for="mno" class="form-label">Mobile No</label>
            <input type="text" class="form-control" id="mno" name="mno" value="<?php echo htmlspecialchars($row['mno']); ?>" required>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="User Image" style="width: 100px; height: 100px; margin-top: 10px;">
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
    <?php
      } else {
        echo "<div class='alert alert-danger'>No record found for the given ID.</div>";
      }
    } else {
      echo "<div class='alert alert-danger'>Invalid request.</div>";
    }
    ?>
  </div>

</body>

</html>