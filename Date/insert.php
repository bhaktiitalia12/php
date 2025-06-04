<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shipping Availability</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- Air Datepicker CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.css">
  <!-- Air Datepicker JS -->
  <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.js"></script>



  <style>
    body {
      font-family: 'Poppins', sans-serif;
      padding: 20px;
      background-color: #f9f9f9;
    }

    .hidden {
      display: none;
    }

    .section {
      margin-top: 10px;
      margin-left: 20px;
      margin-bottom: 10px;
    }

    label {
      display: block;
      margin: 4px 0;
    }
  </style>
</head>

<body>

  <h3>Shipping availability</h3>

  <label><input type="radio" name="shipping" value="everyday" onclick="handleSelection('none')"> Every Day of the Week</label>
  <label><input type="radio" name="shipping" value="specific-days" onclick="handleSelection('days')"> Specific Days of the Week</label>
  <label><input type="radio" name="shipping" value="specific-dates" onclick="handleSelection('dates')"> Specific Dates of the Year</label>

  <!-- Section for Day Checkboxes -->
  <div id="daysSection" class="section hidden">
    <label><input type="checkbox" name="days[]" value="1" checked> Monday</label>
    <label><input type="checkbox" name="days[]" value="2" checked> Tuesday</label>
    <label><input type="checkbox" name="days[]" value="3" checked> Wednesday</label>
    <label><input type="checkbox" name="days[]" value="4" checked> Thursday</label>
    <label><input type="checkbox" name="days[]" value="5" checked> Friday</label>
    <label><input type="checkbox" name="days[]" value="6" checked> Saturday</label>
    <label><input type="checkbox" name="days[]" value="0" checked> Sunday</label>
  </div>

  <!-- Section for Date Picker -->
  <div id="dateSection" class="section hidden">
    <label>Select Specific Date(s):</label>
    <input type="text" id="datepicker" name="specific_dates" autocomplete="off">
    <button onclick="showDates()">Add Date</button>
    <div id="result" style="margin-top:20px;"></div>
  </div>


  <button type="submit" class="btn btn-primary mt-3">Submit</button>


  <script>
    function handleSelection(type) {
      const days = document.getElementById("daysSection");
      const date = document.getElementById("dateSection");

      days.classList.add("hidden");
      date.classList.add("hidden");

      if (type === 'days') {
        days.classList.remove("hidden");
      } else if (type === 'dates') {
        date.classList.remove("hidden");
      }
    }

    let selectedRange = [];

    new AirDatepicker('#datepicker', {
      multipleDates: true,
      autoClose: true,
      dateFormat: 'yyyy-MM-dd',
      range: true,
      multipleDatesSeparator: ' to ',
      onSelect({
        date
      }) {
        selectedRange = date;
      }
    });

    function showDates() {
      const result = document.getElementById('result');
      result.innerHTML = '';

      if (selectedRange.length === 2) {
        let start = new Date(selectedRange[0]);
        let end = new Date(selectedRange[1]);

        while (start <= end) {
          let y = start.getFullYear();
          let m = String(start.getMonth() + 1).padStart(2, '0');
          let d = String(start.getDate()).padStart(2, '0');
          result.innerHTML += `${y}-${m}-${d}<br>`;
          start.setDate(start.getDate() + 1);
        }
      } else {
        alert("Please select a full date range.");
      }
    }
  </script>

</body>

</html>