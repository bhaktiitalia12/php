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
    $disabledDays = array_map('intval', explode(", ", $row['days']));
    $disabledDates = explode(", ", $row['date']);
  }
}

function getAvailableStartDate($disabledDays, $disabledDates, $addDay = 10)
{
  $count = 0;
  $currentDate = date('Y-m-d');
  $date = new DateTime($currentDate);


  while ($count < $addDay) {
    $dayOfWeek = date_format($date, 'w'); // 0 = Sunday, 6 = Saturday
    $formattedDate = date_format($date, 'Y-m-d');

    if (!in_array($dayOfWeek, $disabledDays) && !in_array($formattedDate, $disabledDates)) {
      $count++;
    }

    date_modify($date, '+1 day');
  }

  return date_format($date, 'Y-m-d');
}

$minAvailableDate = getAvailableStartDate($disabledDays, $disabledDates);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Select Available Date</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.css">
  <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.js"></script>
</head>

<body style="font-family: Arial, sans-serif; padding: 20px; display: flex; flex-direction: column; align-items: center;">

  <h3>Select available date</h3>
  <input type="text" id="datepicker" placeholder="Select date" style="width: 300px; padding: 10px; font-size: 16px;">

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

    const disabledDays = <?php echo json_encode($disabledDays); ?>;
    const disabledDates = <?php echo json_encode($disabledDates); ?>;
    const minAvailableDate = new Date('<?php echo $minAvailableDate; ?>');

    new AirDatepicker('#datepicker', {
      locale: customLocale,
      autoClose: true,
      minDate: minAvailableDate,
      onRenderCell({
        date,
        cellType
      }) {
        if (cellType === 'day') {
          const day = date.getDay();
          const formatted = date.toISOString().split('T')[0];

          const isDisabledDay = disabledDays.includes(day);
          const isDisabledDate = disabledDates.includes(formatted);

          if (isDisabledDay || isDisabledDate) {
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