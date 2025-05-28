<?php
// Database connection
$servername  =  "localhost";
$username = "root";
$password = "";
$dbname = "contacts";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables
$sno = '';
$name = '';
$email = '';
$concern = '';
$gender = '';
$hobbies = [];

// Step 1: Fetch record data based on `sno`
if (isset($_GET['sno'])) {
  $sno = $_GET['sno'];
  $sql = "SELECT * FROM contactus WHERE sno = $sno";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $email = $row['email'];
    $concern = $row['concern'];
    $gender = $row['gender'];
    $hobbies = explode(", ", $row['hobbies']);
  } else {
    echo "<div style='color:red;'>No record found for Sno: $sno</div>";
    exit();
  }
}

// Step 2: Handle form submission to update record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $sno = $_POST['sno'];
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $concern = mysqli_real_escape_string($conn, $_POST['desc']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $hobbies = mysqli_real_escape_string($conn, implode(", ", $_POST['hobbies'] ?? []));



  $updateSql = "UPDATE contactus SET name='$name', email='$email', concern='$concern', gender='$gender', hobbies='$hobbies' WHERE sno=$sno";
  $updateResult = mysqli_query($conn, $updateSql);

  if ($updateResult) {
    echo "<div style='color:green;'>Record updated successfully</div>";
    // Redirect back to the main page
    header("Location: selectdata.php");
    exit();
  } else {
    echo "<div style='color:red;'>Error updating record: " . mysqli_error($conn) . "</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Record</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">TutorialPHP </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>


  <div class="container mt-5">
    <h2 class="mb-2">Update data</h2>
    <form action="update.php" method="POST">
      <input type="hidden" name="sno" value="<?php echo $sno; ?>">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="desc" class="form-label">Description</label>
        <textarea class="form-control" id="desc" name="desc" rows="5" cols="30"><?php echo htmlspecialchars($concern); ?></textarea>
      </div>
      <div class="mb-3">
        <label for="desc" class="form-label">Gender</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>>
          <label class="form-check-label" for="radioDefault1">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>>
          <label class="form-check-label" for="radioDefault2">
            Female
          </label>
        </div>
      </div>
      <div class="mb-3">
        <label for="desc" class="form-label">Hobbies</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="Traveling" <?php if (in_array("Traveling", $hobbies)) echo "checked"; ?> name="hobbies[]">
          <label class="form-check-label" for="checkDefault">
            Traveling
          </label>

        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="Singing" <?php if (in_array("Singing", $hobbies)) echo "checked"; ?> name="hobbies[]">
          <label class="form-check-label" for="checkChecked">
            Singing
          </label>
        </div>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>

  <footer class="bg-dark text-white mt-5">
    <div class="container py-5">
      <div class="row justify-content-center text-center text-md-start">
        <div class="col-md-3 mx-3">
          <h5 style="font-size: 17px;">Get to know us</h5>
          <h6 style="font-weight: 100; font-size: 14px;">About Tutorial</h6>
          <h6 style="font-weight: 100; font-size: 14px;">Careers</h6>
        </div>
        <div class="col-md-3 mx-3">
          <h5 style="font-size: 17px;">Connect with us</h5>
          <h6 style="font-weight: 100; font-size: 14px;">Instagram</h6>
          <h6 style="font-weight: 100; font-size: 14px;">Whatsapp</h6>
          <h6 style="font-weight: 100; font-size: 14px;">Twitter</h6>
        </div>
        <div class="col-md-3 mx-3">
          <h5 style="font-size: 17px;">Let us help you</h5>
          <h6 style="font-weight: 100; font-size: 14px;">Your Account</h6>
          <h6 style="font-weight: 100; font-size: 14px;">Returns Centre</h6>
          <h6 style="font-weight: 100; font-size: 14px;">Product Safety Alerts</h6>
        </div>

      </div>
    </div>

    <div class="text-center py-3 border-top">
      <p class="mb-0">© 2023 TutorialPHP. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>