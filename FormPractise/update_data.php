<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "date";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {
  // echo "Connected successfully";
} else {
  die("Connection failed: " . mysqli_connect_error());
}

$sno = '';
$date = '';
$time = '';
$days = [];

if (isset($_GET['sno'])) {
  $sno = $_GET['sno'];
  $sql = "SELECT * FROM datetime WHERE sno = $sno";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $date = $row['date'];
    $time = $row['time'];
    $days = explode(", ", $row['days']);
  } else {
    echo "<div style='color:red;'>No record found for Sno: $sno</div>";
    exit();
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $sno = $_POST['sno'];
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $time = mysqli_real_escape_string($conn, $_POST['time']);
  $days = mysqli_real_escape_string($conn, implode(", ", $_POST['days'] ?? []));

  $updateSql = "UPDATE datetime SET date='$date', time='$time', days='$days' WHERE sno=$sno";
  $updateResult = mysqli_query($conn, $updateSql);

  if ($updateResult) {
    echo "<div style='color:green;'>Record updated successfully</div>";
    header("Location: select_data.php");
    exit();
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Air Datepicker CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.css">
  <!-- Air Datepicker JS -->
  <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.js"></script>
</head>

<body style="background-color:rgb(255, 230, 240);">


  <div class="container ">
    <h1 class="mb-4 mt-5">Update Form Submission</h1>

    <form action="update_data.php" method="POST">
      <input type="hidden" name="sno" value="<?php echo $sno; ?>">
      <label for="date">Select Date :</label>
      <input type="text" id="datepicker" name="date" autocomplete="off" value="<?php echo htmlspecialchars($date); ?>" required>

      <div class="mb-3 mt-3">
        <label for="desc" class="form-label">Days :</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="1" <?php if (in_array("1", $days)) echo "checked"; ?> name="days[]">
          <label class="form-check-label" for="checkDefault">
            Monday
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="2" <?php if (in_array("2", $days)) echo "checked"; ?> name="days[]">
          <label class="form-check-label" for="checkChecked">
            Tuesday
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="3" <?php if (in_array("3", $days)) echo "checked"; ?> name="days[]">
          <label class="form-check-label" for="checkChecked">
            Wednesday
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="4" <?php if (in_array("4", $days)) echo "checked"; ?> name="days[]">
          <label class="form-check-label" for="checkChecked">
            ThursDay
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="5" <?php if (in_array("5", $days)) echo "checked"; ?> name="days[]">
          <label class="form-check-label" for="checkChecked">
            Friday
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="6" <?php if (in_array("6", $days)) echo "checked"; ?> name="days[]">
          <label class="form-check-label" for="checkChecked">
            SaturDay
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="0" <?php if (in_array("0", $days)) echo "checked"; ?> name="days[]">
          <label class="form-check-label" for="checkChecked">
            SunDay
          </label>
        </div>
      </div>

      <div class="mb-3">
        <label for="date">Select Time :</label>
        <input type="text" id="timepicker" name="time" autocomplete="off" value="<?php echo htmlspecialchars($time); ?>">
      </div>
      <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
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

    const selectedDates = "<?php echo $date; ?>".split(", "); // Set selected time from PHP
    const selectedTime = "<?php echo $time; ?>";

    // Convert PHP time (hh:mm AM/PM) to a JS Date object
    function parseTimeToDate(timeStr) {
      const [time, modifier] = timeStr.split(' ');
      const [hours, minutes] = time.split(':');
      let hrs = parseInt(hours);
      if (modifier.toLowerCase() === 'pm' && hrs < 12) hrs += 12;
      if (modifier.toLowerCase() === 'am' && hrs === 12) hrs = 0;
      const now = new Date();
      now.setHours(hrs);
      now.setMinutes(parseInt(minutes));
      return now;
    }



    new AirDatepicker('#datepicker', {
      locale: customLocale,
      autoClose: true,
      multipleDates: true,
      selectedDates: selectedDates,
    });

    new AirDatepicker('#timepicker', {
      onlyTimepicker: true,
      timepicker: true,
      timeFormat: 'hh:mm aa',
      autoClose: true,
      selectedDates: [parseTimeToDate(selectedTime)]

    });
  </script>
</body>

</html>