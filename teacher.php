<?php
session_start();

if ($_SESSION['username'][0] != 't') {
    header("Location: login.php");
    exit();
}
$userid = substr($_SESSION['username'], 1);
require "database.php";

$sql = "SELECT * FROM teacher, course WHERE teacherid = '$userid' and course.courseid= teacher.courseid";

$result = $conn->query($sql);

if ($result->num_rows ) {

    $courses = array();
    while ($row = $result->fetch_assoc()) {
        $teacherName = $row["name"];
        $courseID = $row["courseid"];
        $courseName = $row["title"];
        $courses[$courseID] = $courseName;        
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Student Record System (Teacher)</title>
</head>
<body>
    <h1>Student Record System (Teacher)</h1>
    <p>Teacher Name: <?php echo $teacherName; ?></p>
    <h3>Course</h3>
    <form action="teacher.php" method="POST">
        <select name="course" onchange="this.form.submit()">
            <option value="">Select a course</option>
            <?php
            foreach ($courses as $courseID => $courseTitle) {
                $selected = '';
                if (isset($_POST['course']) && $_POST['course'] == $courseID) {
                    $selected = 'selected';
                }
                echo "<option value='$courseID' $selected>$courseTitle</option>";
            }
            ?>
        </select>
    </form>

    <?php
    if (isset($_POST['course'])) {
        $selectedCourseID = $_POST['course'];
       $sql = "SELECT distinct student.studentid,assessment_record.aid, assessment_record.score, total_score FROM  (student INNER JOIN assessment_record ON student.studentid = assessment_record.student_id),assessment WHERE assessment_record.course_id = '$selectedCourseID' AND assessment.aid=assessment_record.aid and assessment.courseid=assessment_record.course_id;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Student Assessments</h3>";
            echo "<table>";
            echo "<tr><th>Student ID</th><th>Name</th><th>Total Score</th><th>Update Score</th></tr>";

            while ($row = $result->fetch_assoc()) {
                $studentID = $row["studentid"];
                $assessmentName = $row["aid"];
                $assessmentTotal = $row["total_score"];
                $assessmentScore = $row["score"];

                echo "<tr>";
                echo "<td>$studentID</td>";
                echo "<td>$assessmentName</td>";
                echo "<td>$assessmentTotal</td>";
                echo "<td><form action='update_score.php' method='POST'><input type='hidden' name='course' value='$selectedCourseID'><input type='hidden' name='assessment' value='$assessmentName'><input type='hidden' name='student' value='$studentID'><input type='number' name='score' value='$assessmentScore'><input type='submit' value='Update'></form></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No student assessments found for the selected course.";
        }
    }

    /*
    if (isset($_POST['add_assessment'])) {
    $assessmentName = $_POST['a_id'];
    $assessmentWeighting = $_POST['weighting'];
    $assessmentTotal = $_POST['total'];

    require "database.php";

    if ($conn) {
        $query = "INSERT INTO `assessment` (`id`, `courseid`, `aid`, `weighting`, `total_score`) VALUES ('$selectedCourseID', '$assessmentName', '$assessmentWeighting', '$assessmentTotal'";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            echo "Teacher added successfully.";
        } else {
            echo "Error adding teacher: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "Failed to connect to the database.";
    }
}*/
    ?>
    <!--
<h2>Add assessment</h2>
<form method="POST">
    <label for="a_id">assessment ID:</label>
    <input type="text" name="a_id" required><br>
    <label for="weighting">weighting:</label>
    <input type="number" name="weighting" min=1 max=100 require><br>
    <label for="total">total score:</label>
    <input type="number" name="total" min=20 max=200 require><br>
    <button type="submit" name="add_assessment">add assessement</button>
</form>
-->
    <br>
    <a href="reset_password.php">Reset Password</a>
    <br><a href="../index.php">Logout</a>
</body>
</html>
