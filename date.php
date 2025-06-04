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

echo "After add 10 days(except Sunday-Saturday) : " . date_format($date, 'Y-m-d (l)')
?>

