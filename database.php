<?php 
  // MySQL, default port number is 3306
  $servername = "localhost";
  // Database name
  $dbname = "academicrecord";
  // Database user account
  //$dbuser = "root";
  $dbuser = "root";
  // Database password
  //$dbpassword = "";
  $dbpassword = "";
  
  // Create connection
  $conn = new mysqli($servername, $dbuser, $dbpassword, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>