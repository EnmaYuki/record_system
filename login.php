<?php
ob_start();
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$role = $username[0];

$userid = substr($username, 1);

require "database.php";

$sql = "SELECT * FROM user WHERE userid = '$userid' AND role = '$role' AND password = '$password'";
$result = $conn->query($sql);
//print("1");
if ($result->num_rows == 1) {
    //print("1");
    $_SESSION['username'] = $username;

    if ($role == 's') {
        //print("3");
        header("location: student.php");
        //print("3");

    } elseif ($role == 't') {
        //print("4");
        header("location: teacher.php");
    } elseif ($role == 'a') {
        //print('5');
        header("location: admin.php");
    } else {
        echo "<script>alert(\"Invalid role!\");history.go(-1);</script>";
    }
} else {
    echo "<script>alert(\"Invalid username or password!\");history.go(-1);</script>";
}

$conn->close();
?>