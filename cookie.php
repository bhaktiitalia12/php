<?php
setcookie("category", "Books", time() + 86400, '/');
?>
<html>

<body>

  <?php
  if (count($_COOKIE) > 0) {
    echo "Cookies are enabled.";
  } else {
    echo "Cookies are disabled.";
  }
  $cat = $_COOKIE['category'] ?? 'Not set';
  echo "<br>Category: " . $cat;
  echo "<br>Cookie 'category' is set to: " . $_COOKIE['category'];
  ?>

</body>

</html>