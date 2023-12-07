<?php 
  // MySQL, default port number is 3306
  $servername = "localhost";
  // Database name
  $dbname = "academicrecord";
  // Database user account
  $dbuser = "group27";
  // Database password
  $dbpassword = "350group27";
  
  // Create connection
  $connect = new mysqli($servername, $dbuser, $dbpassword, $dbname);
  //mysqli_set_charset($conn, "utf8");
 
  // Check connection
  if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
?>