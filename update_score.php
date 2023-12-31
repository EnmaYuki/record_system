<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if ($_SESSION['username'][0] != 't') {
    header("Location: record_system/index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseID = $_POST['course'];
    $studentID = $_POST['student'];
    $assessmentName = $_POST['assessment'];
    $newScore = $_POST['score'];

    require "database.php";

    $sql = "UPDATE assessment_record 
            SET score = '$newScore' 
            WHERE course_id = '$courseID' AND student_id = '$studentID' AND aid = '$assessmentName'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.alert('Score updated successfully.');</script>";
        header("location: teacher.php");
        exit();
    } else {
        echo "Error updating score: " . $conn->error;
    }

    $conn->close();
}
?>