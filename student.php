<?php
session_start();

// Check if the user is logged in as a teacher
if ($_SESSION['username'][0] != 's') {
    header("Location: login.php");
    exit();
}

// Get the user ID from the session
$userid = substr($_SESSION['username'], 1);
require "database.php";

// Prepare the SQL query to retrieve the teacher's name
$sql = "SELECT * FROM student, course WHERE studentid = '$userid' and course.courseid= student.courseid";

$result = $conn->query($sql);

if ($result->num_rows>0 ) {

    $courses = array();
    while ($row = $result->fetch_assoc()) {
        $studentName = $row["sname"];
        $courseID = $row["courseid"];
        $courseName = $row["title"];
        $courses[$courseID] = $courseName;        
    }
    /*
        // Output data of the first row
        $row = $result->fetch_assoc();
        $teacherName = $row["name"];
        $courseName = $row["title"];
        $courses = array();
        
        // Fetch all the courses the teacher is responsible for
        while ($row = $result->fetch_assoc()) {
            $courseID = $row["courseid"];
            $courseTitle = $row["title"];
            $courses[$courseID] = $courseTitle;
        }
    */
}

//$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Student Record System (Student)</title>
</head>
<body>
    <?php
    echo '<pre>'; print_r($courses); echo '</pre>';
    ?>
    <h1>Student Record System (student)</h1>
    <p>student Name: <?php echo $studentName; ?></p>
    <h3>Course</h3>
    <form action="student.php" method="POST">
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
        $sql = "SELECT distinct student.studentid,assessment_record.aid, assessment_record.score FROM  student INNER JOIN assessment_record ON student.studentid = assessment_record.student_id WHERE assessment_record.course_id = '$selectedCourseID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Student Assessments</h3>";
            echo "<table>";
            echo "<tr><th>Student ID</th><th>Assessment Name</th><th>Assessment Score</th><th>Update Score</th></tr>";

            while ($row = $result->fetch_assoc()) {
                $studentID = $row["studentid"];
                $assessmentName = $row["aid"];
                $assessmentScore = $row["score"];

                echo "<tr>";
                echo "<td>$studentID</td>";
                echo "<td>$assessmentName</td>";
                echo "<td>$assessmentScore</td>";
                echo "<td><form action='update_score.php' method='POST'><input type='hidden' name='course' value='$selectedCourseID'><input type='hidden' name='assessment' value='$assessmentName'><input type='hidden' name='student' value='$studentID'><input type='number' name='score' value='$assessmentScore'><input type='submit' value='Update'></form></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No student assessments found for the selected course.";
        }
    }
    ?>

    <br>
    <a href="reset_password.php">Reset Password</a>
    <br><a href="../index.php">Logout</a>
</body>
</html>
