<?php
session_start();

// Check if the user is logged in as a teacher
if ($_SESSION['username'][0] != 't') {
    header("Location: login.php");
    exit();
}

// Get the user ID from the session
$userid = substr($_SESSION['username'], 1);
require "database.php";

// Prepare the SQL query to retrieve the teacher's name
$sql = "SELECT * FROM student, course WHERE studentid = '$userid' and course.courseid= student.courseid";

$result = $conn->query($sql);

if ($result->num_rows ) {

    $courses = array();
    while ($row = $result->fetch_assoc()) {
        $studentName = $row["name"];
        $courseID = $row["courseid"];
        $courseName = $row["title"];
        $courses[$courseID] = $courseName;        
    }
}

//$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table, th, td {
          border:1px solid black;
        }
        </style>
    <title>Student Record System</title>
</head>
<body>
    <h1>student record System</h1>
    <p>student name: <?php echo $studentName; ?></p>
    <h3>Course</h3>
    <?php include 'header.php';?>
    <h1>Student</h1>
    <table style="width:100%">
        <tr>
            <th>Student Name</th>
            <th>GPA</th>
        </tr>
        <tr>
            <!-- <td>Student Name</td> -->
            <td>Temp course title</td>
            <!-- <td>term GPA number</td> -->
            <td>Temp term GPA</td>
        </tr>

        
    </table>
    <br>
    <a href="reset_password.php">Reset Password</a>
    <br><a href="../index.php">Logout</a>
</body>
</html>