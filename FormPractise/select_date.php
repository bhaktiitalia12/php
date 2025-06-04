<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "date";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sno = $_GET['sno'] ?? null;

$disabledDays = [];
$disabledDates = [];

if ($sno) {
  $sql = "SELECT * FROM datetime WHERE sno = $sno";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  if ($row) {
    $days = explode(", ", $row['days']);
    $holidayDates = explode(", ", $row['date']);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Select Available Date</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.css">
  <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.js"></script>
</head>

<body style="font-family: Arial, sans-serif; padding: 20px; display: flex; flex-direction: column; align-items: center; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; ">

  <h3>Select available date</h3>
  <input type="text" id="datepicker" placeholder="select date" style="width: 300px; padding: 10px; font-size: 16px;">

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
      timeFormat: 'hh:mm aa',
      firstDay: 0
    };

    const disabledDays = <?php echo json_encode(array_map('intval', $days)); ?>;
    const disabledDates = <?php echo json_encode($holidayDates); ?>;

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    new AirDatepicker('#datepicker', {
      locale: customLocale,
      autoClose: true,
      minDate: today,
      onRenderCell({
        date,
        cellType
      }) {
        if (cellType === 'day') {
          const day = date.getDay();
          
          const yyyyMMdd = date.getFullYear() + '-' +
            String(date.getMonth() + 1).padStart(2, '0') + '-' +
            String(date.getDate()).padStart(2, '0');

          const isPast = date < today;
          const isDisabledDay = disabledDays.includes(day);
          const isDisabledDate = disabledDates.includes(yyyyMMdd);

          if (isPast || isDisabledDay || isDisabledDate) {
            return {
              disabled: true
            };
          }
        }
      }
    });
  </script>
</body>

</html>