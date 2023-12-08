<?php
ob_start();
session_start();
// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Extract the role from the username
$role = $username[0];

// Remove the role character from the username
$userid = substr($username, 1);

require "database.php";

// Prepare the SQL query to check the user credentials
$sql = "SELECT * FROM user WHERE userid = '$userid' AND role = '$role' AND password = '$password'";
$result = $conn->query($sql);
print("1");
// Check if the user exists and the password is correct
if ($result->num_rows == 1) {
    // User authentication successful
    print("1");
    $_SESSION['username'] = $username;

    // Redirect to the appropriate page based on the role and user ID
    if ($role == 's') {
        print("3");
        header("location: student.php");
        print("3");
    } elseif ($role == 't') {
        print("4");
        header("location: teacher.php");
    } elseif ($role == 'a') {
        print('5');
        header("location: admin.php");
    } else {
        // Invalid role
        echo "Invalid role!";
    }
} else {
    // Invalid username or password
    print("2");
    echo "Invalid username or password!";
}

// Close the database connection
$conn->close();
?>