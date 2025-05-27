<?php

//connect to the database
$servername  =  "localhost";
$username = "root";
$password = "";
$dbname = "db";

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//die if connection fails
if (!$conn) {
  die("connection failed:" . mysqli_connect_error());
} else {
  echo "Connected successfully<br>";
}

echo "Connected to existing database '$dbname' successfully!<br>";

//create database-------------------------------------------
// $sql = "create database db3";
// $result = mysqli_query($conn, $sql);
// if ($result) {
//   echo "database created successfully<br>";
// } else {
//   echo "error creating database: " . mysqli_error($conn);
// }

//create table-------------------------------------
// $sql = "CREATE TABLE `db`.`trip` (`sno` INT(50) NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL , `dob` DATE NOT NULL , `sub` VARCHAR(20) NOT NULL , PRIMARY KEY (`sno`)) ";

// $result = mysqli_query($conn, $sql);
// if ($result) {
//   echo "table created successfully<br>";
// } else {
//   echo "error creating table: " . mysqli_error($conn);
// }


//insert data into table-------------------------------------
//Variables for data
$name = "ABC";
$dob = "2025-07-20";
$sub = "Python";
$sql = "INSERT INTO `trip` ( `name`, `dob`, `sub`) VALUES ('$name', '$dob', '$sub')";

// $sql = "INSERT INTO `trip` ( `name`, `dob`, `sub`) VALUES ('Susi', '2025-07-15', 'C++')";
$result = mysqli_query($conn, $sql);
if ($result) {
  echo "Data inserted successfully<br>";
} else {
  echo "error inserting data: " . mysqli_error($conn);
}
