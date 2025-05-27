<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact us</title>
  <!-- Bootstrap 5 CSS -->
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
  <!-- ---------------------------------------------------------------------------------------------------------------- -->
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $name = $_POST['name'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];


    // if (empty($email) || empty($name) || empty($desc)) {
    //   echo "<div class='alert alert-danger' role='alert'>Please fill in all fields.</div>";
    // } else {
    //   echo "<div class='alert alert-warning' role='alert'>Your data has been submitted successfully</div>";
    // }


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

    // $sql = "INSERT INTO `trip` ( `name`, `dob`, `sub`) VALUES ('Susi', '2025-07-15', 'C++')";
    $sql = "INSERT INTO `contactus` ( `name`, `email`, `concern`, `date`) VALUES ( '$name', '$email', '$desc', current_timestamp())";

    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<div class='alert alert-success' role='alert'>Your data has been submitted successfully</div>";
      header("Location: selectdata.php");
      exit(); // Always call exit after header
    } else {
      echo "error inserting data: " . mysqli_error($conn);
    }
  }
  ?>
  <!-- ------------------------------------------------------------------------------------------------------------- -->
  <div class="container mt-5">
    <h2 class="mb-2">Contact us for your concerns</h2>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">

      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="desc" class="form-label">Description</label>
        <textarea class="form-control" id="desc" name="desc" rows="5" cols="30"></textarea>

      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
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
  <!-- Bootstrap JS (optional, for dropdowns/modals) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>