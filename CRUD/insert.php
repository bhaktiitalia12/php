<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


  <?php
  include 'connection.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mno = $_POST['mno'];

    // Check for duplicates
    $checkQuery = "SELECT * FROM userdata WHERE name = '$name' OR mno = '$mno'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
      echo "<div class='alert alert-warning'>Name or Mobile number already exists.</div>";
      exit();
    }

    // Handle file upload
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);

    $uploadOk = false;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
      // Try moving file first
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $uploadOk = true;
      } else {
        echo "<div class='alert alert-danger'>Error uploading file.</div>";
        exit();
      }
    } else {
      echo "<div class='alert alert-danger'>No file uploaded or there was an error.</div>";
      exit();
    }

    // If file uploaded successfully, run SQL query
    if ($uploadOk) {
      $sql = "INSERT INTO userdata (name, mno, image) VALUES ('$name', '$mno', '$target_file')";
      // if (mysqli_query($conn, $sql)) {
      //   echo "<div class='alert alert-success'>New record inserted successfully</div>";
      // } else {
      //   echo "<div class='alert alert-danger'>Database error: " . mysqli_error($conn) . "</div>";
      // }

      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo "<div class='alert alert-success' role='alert'>Your data has been submitted successfully</div>";
        header("Location: viewdata.php");
        exit(); // Always call exit after header
      } else {
        echo "error inserting data: " . mysqli_error($conn);
      }
    }
  }
  ?>

  <div class="container mt-5">
    <h2 class="mb-2">Add new user data</h2>
    <form action="insert.php" method="post" enctype="multipart/form-data">

      <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="mno" class="form-label">Mobile.No</label>
        <input type="text" class="form-control" id="mno" name="mno" required>
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">Upload image</label>
        <input class="form-control" type="file" id="formFile" name="image" accept="image/*" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>