<?php
$result = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];
  $operator = $_POST['operator'];

  switch ($operator) {
    case '+':
      $result = $num1 + $num2;
      break;
    case '-':
      $result = $num1 - $num2;
      break;
    case '*':
      $result = $num1 * $num2;
      break;
    case '/':
      if ($num2 != 0) {
        $result = $num1 / $num2;
      } else {
        $result = "Cannot divide by zero";
      }
      break;
    default:
      $result = "Invalid operator";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Simple Calculator</title>
</head>
<body>
  <h2>PHP Calculator using switch</h2>
  <form method="post">
    <input type="number" name="num1" step="any" required placeholder="First Number">
    <select name="operator">
      <option value="+">+</option>
      <option value="-">−</option>
      <option value="*">×</option>
      <option value="/">÷</option>
    </select>
    <input type="number" name="num2" step="any" required placeholder="Second Number">
    <input type="submit" value="Calculate">
  </form>

  <p><strong>Result:</strong> <?php echo $result; ?></p>
</body>
</html>
