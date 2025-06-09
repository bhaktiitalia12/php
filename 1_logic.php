<?php
//Check if a number is positive, negative, or zero.

$number = -0;
if ($number > 0) {
  echo "The number is positive.";
} elseif ($number < 0) {
  echo "The number is negative.";
} else {
  echo "The number is zero.";
}


$num = 1;
for ($i = $num; $i <= 50; $i++) {
  echo 'Number : ' . $i . "<br>";
}


$numm = 1;




$randomNumber = rand(1, 10); // Generates a new number every refresh
$result = "";

if (isset($_POST['guess'])) {
  $userGuess = $_POST['guess'];

  if ($userGuess == $randomNumber) {
    $result = "🎉 Correct! You guessed the number $randomNumber.";
  } else {
    $result = "❌ Wrong! The correct number was $randomNumber.";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Guessing Game</title>
</head>

<body>
  <h2>Guess a number between 1 and 10</h2>

  <form method="post">
    <input type="number" name="guess" min="1" max="10" required>
    <input type="submit" value="Guess">
  </form>

  <p><?php echo $result; ?></p>
</body>

</html>