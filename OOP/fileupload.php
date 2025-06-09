<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload</title>
</head>

<body>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <label>Select file to upload:</label><br>
    <input type="file" name="myFile"><br><br>
    <input type="submit" value="Upload">
  </form>

  <?php
  if (isset($_FILES['myFile'])) {
    $file = $_FILES['myFile'];

    // File properties
    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // Allowed file types
    $allowed = ['jpg', 'jpeg', 'png', 'pdf'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (in_array($fileExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 2 * 1024 * 1024) {
          $newName = uniqid('', true) . "." . $fileExt;
          $uploadPath = 'uploads/' . $newName;

          move_uploaded_file($fileTmp, $uploadPath);
          echo "✅ File uploaded successfully: $newName";
        } else {
          echo "❌ File is too large.";
        }
      } else {
        echo "❌ Error uploading file.";
      }
    } else {
      echo "❌ Invalid file type.";
    }
  } else {
    echo "❌ No file selected.";
  }
  ?>


</body>

</html>