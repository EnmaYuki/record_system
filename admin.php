<!-- I want to test the page in html format 
If need to test php please change to .php and test header.php and footer.php

<?php include 'header.php';?>
<?php include 'footer.php';?>
-->

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
    
<!-- HTML form to select a teacher for deletion -->
<?php
// Check if the form is submitted for deleting a teacher
if (isset($_POST['delete_teacher'])) {
    // Retrieve the selected teacher ID from the form data
    $teacherID = $_POST['teacher_id'];

    // Establish a connection to the MySQL database
    $conn = mysqli_connect("localhost", "username", "password", "academicrecord");

    // Check if the connection was successful
    if ($conn) {
        // Execute the DELETE query to remove the selected teacher from the "teacher" table
        $query = "DELETE FROM teacher WHERE teacherid = '$teacherID'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Deletion successful
            echo "Teacher deleted successfully.";
        } else {
            // Error occurred during deletion
            echo "Error deleting teacher: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        // Connection error
        echo "Failed to connect to the database.";
    }
}

// Check if the form is submitted for adding a teacher
if (isset($_POST['add_teacher'])) {
    // Retrieve the teacher details from the form data
    $teacherID = $_POST['teacher_id'];
    $teacherName = $_POST['teacher_name'];
    $teacherMobile = $_POST['teacher_mobile'];

    // Establish a connection to the MySQL database
    $conn = mysqli_connect("localhost", "username", "password", "academicrecord");

    // Check if the connection was successful
    if ($conn) {
        // Execute the INSERT query to add a new row in the "teacher" table
        $query = "INSERT INTO teacher (teacherid, name, mobile) VALUES ('$teacherID', '$teacherName', '$teacherMobile')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Addition successful
            echo "Teacher added successfully.";
        } else {
            // Error occurred during addition
            echo "Error adding teacher: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        // Connection error
        echo "Failed to connect to the database.";
    }
}

// Check if the form is submitted for deleting a student
if (isset($_POST['delete_student'])) {
    // Retrieve the selected student ID from the form data
    $studentID = $_POST['student_id'];

    // Establish a connection to the MySQL database
    $conn = mysqli_connect("localhost", "username", "password", "academicrecord");

    // Check if the connection was successful
    if ($conn) {
        // Execute the DELETE query to remove the selected student from the "student" table
        $query = "DELETE FROM student WHERE studentid = '$studentID'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Deletion successful
            echo "Student deleted successfully.";
        } else {
            // Error occurred during deletion
            echo "Error deleting student: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        // Connection error
        echo "Failed to connect to the database.";
    }
}

// Check if the form is submitted for adding a student
if (isset($_POST['add_student'])) {
    // Retrieve the student details from the form data
    $studentID = $_POST['student_id'];
    $studentName = $_POST['student_name'];

    // Establish a connection to the MySQL database
    $conn = mysqli_connect("localhost", "username", "password", "academicrecord");

    // Check if the connection was successful
    if ($conn) {
        // Execute the INSERT query to add a new row in the "student" table
        $query = "INSERT INTO student (studentid, name) VALUES ('$studentID', '$studentName')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Addition successful
            echo "Student added successfully.";
        } else {
            // Error occurred during addition
            echo "Error adding student: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        // Connection error
        echo "Failed to connect to the database.";
    }
}
?>

<!-- HTML form to delete a teacher -->
<h2>Delete Teacher</h2>
<form method="POST">
    <label for="teacher_id">Select Teacher:</label>
    <select name="teacher_id">
        <!-- Populate the dropdown list with teacher IDs from the database -->
        <?php
        require "database.php";
        $query = "SELECT teacherid FROM teacher";
        $result = mysqli_query($conn, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['teacherid'] . "'>" . $row['teacherid'] . "</option>";
            }
        }

        mysqli_close($conn);
        ?>
    </select>
    <button type="submit" name="delete_teacher">Delete Teacher</button>
</form>

<!-- HTML form to add a teacher -->
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

<!-- HTML form to delete a student -->
<h2>Delete Student</h2>
<form method="POST">
    <label for="student_id">Select Student:</label>
    <select name="student_id">
        <!-- Populate the dropdown list with student IDs from the database -->
        <?php
        require "database.php";
        $query = "SELECT studentid FROM student";
        $result = mysqli_query($conn, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['studentid'] . "'>" . $row['studentid'] . "</option>";
            }
        }

        mysqli_close($conn);
        ?>
    </select>
    <button type="submit" name="delete_student">Delete Student</button>
</form>

<!-- HTML form to add a student -->
<h2>Add Student</h2>
<form method="POST">
    <label for="student_id">Student ID:</label>
    <input type="text" name="student_id" required><br>

    <label for="student_name">Student Name:</label>
    <input type="text" name="student_name" required><br>

    <button type="submit" name="add_student">Add Student</button>
</form>
    <button onclick="document.location='index.html'">Logout</button>
</body>
</html>