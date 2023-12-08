<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table, th, td {
          border:1px solid black;
        }
        </style>
    <title>Student Record System (Admin)</title>
</head>
<body>
    <h1>Admin</h1>
    
<?php
if (isset($_POST['delete_teacher'])) {
    $teacherID = $_POST['teacher_id'];

    require "database.php";

    if ($conn) {
        $query = "DELETE FROM user,teacher WHERE userid='$teacherID' and teacherid = '$teacherID'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Teacher deleted successfully.";
        } else {
            echo "Error deleting teacher: " . mysqli_error($conn);
        }
    mysqli_close($conn);
    } else {
        echo "Failed to connect to the database.";
    }
}

if (isset($_POST['add_teacher'])) {
    $teacherID = $_POST['teacher_id'];
    $teacherName = $_POST['teacher_name'];
    $teacherMobile = $_POST['teacher_mobile'];

    require "database.php";

    if ($conn) {
        $query = "INSERT INTO user (userid, role,password) VALUES ('$teacherID', 't', reverse('$teacherID'))";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $query = "INSERT INTO teacher (teacherid, name, mobile) VALUES ('$teacherID', '$teacherName', '$teacherMobile')";
            $result = mysqli_query($conn, $query);
            echo "Teacher added successfully.";
        } else {
            echo "Error adding teacher: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "Failed to connect to the database.";
    }
}

if (isset($_POST['delete_student'])) {
    $studentID = $_POST['student_id'];
    require "database.php";
    if ($conn) {
        $query = "DELETE FROM user WHERE user.userid='$studentID' ";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $query = "DELETE FROM student WHERE studentid = '$studentID'";
            $result = mysqli_query($conn, $query);
            echo "Student deleted successfully.";
        } else {
            echo "Error deleting student: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo "Failed to connect to the database.";
    }
}

if (isset($_POST['add_student'])) {
    $studentID = $_POST['student_id'];
    $studentName = $_POST['student_name'];
    $studentCourse = $_POST['student_course'];

    require "database.php";

    if ($conn) {
        $query = "INSERT INTO user (userid, role,password) VALUES ('$studentID', 's', reverse('$studentID'))";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            $query = "INSERT INTO student (studentid, sname,courseid) VALUES ('$studentID', '$studentName','$studentCourse')";
            $result = mysqli_query($conn, $query);
            echo "Student added successfully.";
        } else {
            echo "Error adding student: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    } else {
        echo "Failed to connect to the database.";
    }
}

if (isset($_POST['add_course'])) {
    $courseID = $_POST['course_id'];
    $courseTitle = $_POST['course_title'];
    $courseCredit = $_POST['course_credit'];

    require "database.php";

    if ($conn) {
        $query = "INSERT INTO course (courseid, title,credit) VALUES ('$courseID', '$courseTitle', '$courseCredit')";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            echo "Course added successfully.";
        } else {
            echo "Error adding course: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "Failed to connect to the database.";
    }
}
?>

<h2>Delete Teacher</h2>
<form method="POST">
    <label for="teacher_id">Select Teacher:</label>
    <select name="teacher_id">
        <?php
        require "database.php";
        $query = "SELECT userid FROM user where role='t'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['userid'] . "'>" . $row['userid'] . "</option>";
            }
        }

        mysqli_close($conn);
        ?>
    </select>
    <button type="submit" name="delete_teacher">Delete Teacher</button>
</form>

<h2>Add Teacher</h2>
<form method="POST">
    <label for="teacher_id">Teacher ID:</label>
    <input type="text" name="teacher_id" required><br>

    <label for="teacher_name">Teacher Name:</label>
    <input type="text" name="teacher_name" required><br>

    <label for="teacher_mobile">Mobile Number:</label>
    <input type="text" name="teacher_mobile"><br>

    <button type="submit" name="add_teacher">Add Teacher</button>
</form>

<h2>Delete Student</h2>
<form method="POST">
    <label for="student_id">Select Student:</label>
    <select name="student_id">
        <?php
        require "database.php";
        $query = "SELECT userid FROM user where role='s'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['userid'] . "'>" . $row['userid'] . "</option>";
            }
        }

        mysqli_close($conn);
        ?>
    </select>
    <button type="submit" name="delete_student">Delete Student</button>
</form>

<h2>Add Student</h2>
<form method="POST">
    <label for="student_id">Student ID:</label>
    <input type="text" name="student_id" required><br>
    <label for="student_name">Student Name:</label>
    <input type="text" name="student_name" required><br>
    <label for="student_course">Course code:</label>
    <input type="text" name="student_course"><br>

    <button type="submit" name="add_student">Add Student</button>
</form>

<h2>Add Course</h2>
<form method="POST">
    <label for="course_id">course ID:</label>
    <input type="text" name="course_id" required><br>
    <label for="course_title">course title:</label>
    <input type="text" name="course_title" required><br>
    <label for="course_credit">course credit:</label>
    <input type="number" name="course_credit" min=3 max=10><br>
    <button type="submit" name="add_course">add course</button>
</form>

    <button onclick="document.location='index.html'">Logout</button>
</body>
</html>