<?php 
  // MySQL, default port number is 3306
  $servername = "localhost";
  // Database name
  $dbname = "academicrecord";
  // Database user account
  //$dbuser = "root";
  $dbuser = "group27";
  // Database password
  //$dbpassword = "";
  $dbpassword = "350group27";
  
  // Create connection
  $conn = new mysqli($servername, $dbuser, $dbpassword, $dbname);
  //mysqli_set_charset($conn, "utf8");
 
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>