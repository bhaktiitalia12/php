 <?php
 
  $myfile = fopen("file.txt", "r");
  if (!$myfile) {
    die("Unable to open file!");
  }
  $data = fread($myfile, filesize("file.txt"));
  echo $data;
  fclose($myfile);
  ?> 

