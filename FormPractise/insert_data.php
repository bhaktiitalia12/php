<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert</title>
  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Air Datepicker CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.css">
  <!-- Air Datepicker JS -->
  <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.js"></script>
</head>

<body style="background-color:rgb(255, 230, 240);">

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "date";

    $time = $_POST['time'];
    // $date = isset($_POST['date']) ? $_POST['date'] : "";
    $date = $_POST['date'];

    $days = isset($_POST['days']) ? implode(", ", $_POST['days']) : "";
    // $days = isset($_POST['days']) ? mysqli_real_escape_string($conn, implode(", ", $_POST['days'])) : '';

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn) {
      // echo "Connected successfully";
    } else {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO `datetime` ( `date`, `days`, `time`) VALUES ( '$date', '$days', '$time')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "<div class='alert alert-success' role='alert'>Your data has been submitted successfully</div>";
      header("Location: select_data.php");
      exit(); // Always call exit after header
    } else {
      echo "error inserting data: " . mysqli_error($conn);
    }
    // mysqli_close($conn);
  }

  ?>
  <div class="container ">
    <h1 class="mb-4 mt-5">Form Submission</h1>

    <form action="insert_data.php" method="POST">
      <label for="date">Select Date :</label>
      <input type="text" id="datepicker" name="date" autocomplete="off">

      <div class="mb-3 mt-3">
        <label for="desc" class="form-label">Days :</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="1" name="days[]">
          <label class="form-check-label" for="checkDefault">
            Monday
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="2" name="days[]">
          <label class="form-check-label" for="checkChecked">
            Tuesday
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="3" name="days[]">
          <label class="form-check-label" for="checkChecked">
            Wednesday
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="4" name="days[]">
          <label class="form-check-label" for="checkChecked">
            ThursDay
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="5" name="days[]">
          <label class="form-check-label" for="checkChecked">
            Friday
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="6" name="days[]">
          <label class="form-check-label" for="checkChecked">
            SaturDay
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="0" name="days[]">
          <label class="form-check-label" for="checkChecked">
            SunDay
          </label>
        </div>
      </div>

      <div class="mb-3">
        <label for="date">Select Time :</label>
        <input type="text" id="timepicker" name="time" autocomplete="off">
      </div>
      <button type="submit" class="btn btn-primary mt-3 mb-4">Submit</button>
    </form>

    <?php
    $months = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December"
    ];
    
    foreach ($months as $index => $month) {
      echo '
      
      <div class="col-md-4 mb-2">
        <label for="month' . $index . '">' . $month . ':</label>
        <input type="text" id="month' . $index . '" class="form-control month-input" >
      </div>';
    }
    ?>
  </div>


  <script>
    const customLocale = {
      days: ['SunDay', 'MonDay', 'TuesDay', 'WednesDay', 'ThursDay', 'FriDay', 'SaturDay'],
      daysMin: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
      months: [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
      ],
      monthsShort: [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
      ],
      today: 'Today',
      clear: 'Clear',
      dateFormat: 'yyyy-MM-dd',
      // timeFormat: 'HH:mm',
      timeFormat: 'hh:mm aa',
      firstDay: 0
    };

    new AirDatepicker('#datepicker', {
      locale: customLocale,
      autoClose: true,
      multipleDates: true
    });

    new AirDatepicker('#timepicker', {
      onlyTimepicker: true,
      timepicker: true,
      timeFormat: 'hh:mm aa',
      autoClose: true
    });
  </script>
</body>

</html>