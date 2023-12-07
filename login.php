<?php
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

// Check if the user exists and the password is correct
if ($result->num_rows == 1) {
    // User authentication successful
    session_start();
    $_SESSION['userids'] = $username;

    // Redirect to the appropriate page based on the role and user ID
    if ($role == 's') {
        header("Location: student/id_" . $userid . ".php");
    } elseif ($role == 't') {
        header("Location: teacher/id_" . $userid . ".php");
    } elseif ($role == 'a') {
        header("Location: admin.php");
    } else {
        // Invalid role
        echo "Invalid role!";
    }
} else {
    // Invalid username or password
    echo "Invalid username or password!";
}

// Close the database connection
$conn->close();
?>