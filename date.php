<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body style="font-family: poppins;">



  <?php

  $currentDate = date('Y-m-d l');
  echo "Current Date: " . $currentDate;
  echo "<br>";
  $holidayDates = [
    '2025-06-11',
    '2025-06-12',
    '2025-06-27',
    '2025-06-30',
    '2025-07-03',
  ];

  $date = new DateTime($currentDate);
  $totalAddDays = 10;
  $addedDays = 0;

  while ($addedDays < $totalAddDays) {

    date_modify($date, '+1 day');
    $dayOfWeek = date_format($date, 'N'); // 6 = Saturday, 7 = Sunday
    $formattedDate = date_format($date, 'Y-m-d');

    if ($dayOfWeek < 6 && !in_array($formattedDate, $holidayDates)) {
      $addedDays++;
    }
  }

  echo "After add 10 days(except Sunday-Saturday) : " . date_format($date, 'Y-m-d (l)');

  // ----------------------------------------------------------------------------------------------------------------------

  echo "<br><br>";

  echo date("d-m-Y H:i:s");
  echo "<br>";
  echo date("l, F j, Y");  //Wednesday, June 4, 2025
  echo "<br>";
  echo time();
  echo "<br>";

  $timestamp = 1749037415;
  echo date("Y-m-d H:i:s", $timestamp);
  echo "<br>";

  echo date("Y-m-d", strtotime("tomorrow"));
  echo '<br>';
  echo date("Y-m-d", strtotime("+1 week"));
  echo "<br>";
  echo date("Y-m-d", strtotime("last Monday"));
  echo "<br>";
  echo date("Y-m-d", strtotime("next Friday"));
  echo "<br>";


  // Format	Meaning	Example
  // Y	4-digit year	2025
  // m	Month (01-12)	06
  // d	Day (01-31)	04
  // H	Hour (00-23)	15
  // i	Minutes (00-59)	42
  // s	Seconds (00-59)	08
  // w  Day of the week (0 for Sunday, 6 for Saturday)	3
  // N  ISO-8601 numeric representation of the day of the week (1 for Monday, 7 for Sunday)	3

  echo "<br>";
  echo date('d-m-Y');
  echo "<br>";
  echo date('H:i:s');
  echo "<br>";
  echo date('Y-m-d H:i:s');
  echo "<br><br>";

  $dayFull = date("l");
  $dayShort = date("D");
  $monthFull = date("F");
  $monthShort = date("M");

  echo "Full day: $dayFull <br>";
  echo "Short day: $dayShort <br>";
  echo "Full month: $monthFull <br>";
  echo "Short month: $monthShort <br>";
  echo "Today is $dayFull, $monthFull ($monthShort)";
  echo "<br><br>";

  echo date("d/m/Y"); // 04/06/2025
  echo "<br>";
  echo date("l, d F Y"); // Wednesday, 04 June 2025
  echo "<br>";
  echo date("l, d F Y - h:i A"); // Wednesday, 04 June 2025 - 04:30 PM

  echo "<br>";
  $timestamp = time();
  echo date("Y-m-d H:i:s", $timestamp);
  echo "<br>";
  $now = time();
  echo "Current Date & Time: " . date("Y-m-d H:i:s", $now) . "<br>";
  echo date('Y-m-d', strtotime('tomorrow')), "<br>";

  $date = new dateTime();

  $date->modify('+10 days');
  echo $date->format('Y-m-d H:i:s A' . "<br><br>");
  echo '<br><br><br>';


  // Step 1: Today
  $today = new DateTime();
  echo "Today: " . $today->format("Y-m-d") . "<br>";

  // Step 2: Add 5 days
  $today->modify("+5 days");
  echo "After 5 days: " . $today->format("Y-m-d") . "<br>";

  // Step 3: Subtract 1 month
  $today->modify("-1 month");
  echo "After subtracting 1 month: " . $today->format("Y-m-d") . "<br>";

  // Step 4: Another date
  $future = new DateTime("2025-12-31");


  // Format Options for diff()
  // Format	Meaning	Example
  // %a	Total number of days	44
  // %y	Years	0
  // %m	Months	1
  // %d	Days	14
  // %R	Adds + or - sign	+44

  // Step 5: Difference
  $diff = $today->diff($future);
  echo "Difference: " . $diff->format("%a days") . "<br>";

  $start = new DateTime("2025-06-01");
  $end = new DateTime("2025-06-15");

  $diff = $start->diff($end);
  echo $diff->days; // Total number of days


  echo "<br>";
  $start = new DateTime("2025-06-01");
  $end = new DateTime("2026-07-15");

  $diff = $start->diff($end);

  echo "Difference: " . $diff->format("%R%a days") . "<br>";
  echo "Years: " . $diff->y . "<br>";
  echo "Months: " . $diff->m . "<br>";
  echo "Days: " . $diff->d . "<br>";


  // Create a $birthday date: "2000-01-01"

  // Calculate the difference between today and the birthday

  // Show:

  // Total number of days

  // Years, months, and days

  // A line like:
  // "You are 25 years, 5 months, and 3 days old."



  $birthday = new DateTime("2003-12-01");
  $today = new DateTime();

  $diff = $birthday->diff($today);

  echo "<br><br>";
  echo 'Today is: ' . $today->format('d-M-Y D ------------------') . "<br>";
  echo "Bhakti total years (DOB🎂 - 01/dec/2003) : <br>";
  echo "Total Days(since today) : " . $diff->format("%a days🎈") . "<br>";
  echo "You are {$diff->y} years, {$diff->m} months, and {$diff->d} days old🎀.";

  $birthday2 = new DateTime("1975-06-01");
  $today = new DateTime();

  $diff = $birthday2->diff($today);

  echo "<br><br>";
  echo "Dhamo total years (DOB🎂 - 31/oct/2003) : <br>";
  echo "Total Days(since today) : " . $diff->format("%a days🎈") . "<br>";
  echo "You are {$diff->y} years, {$diff->m} months, and {$diff->d} days old🐣.";

  $diff2 = $birthday->diff($birthday2);
  echo "<br><br>";
  echo "Difference between Bhakti and Dhamo🤡 <br>";
  echo "Total Days: " . $diff2->format("%a days🎈") . "<br>";

  ?>
</body>

</html>