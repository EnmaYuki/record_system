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
    <table style="width:100%">
        <tr>
            <td>Reset Password</td>
            <td><button onclick="alert('Test button')">Reset Password</button></td>
        </tr>
        <tr>
            <td>Remove Student</td>
            <td><button>Remove Student</button></td>
        </tr>

        <tr>
            <td>Remove Teacher</td>
            <td><button>Remove Teacher</button></td>
        </tr>
    </table>
    <br>
    
    <!--Need to improve when the JS start coding-->
    <td><button onclick="document.location='index.html'">Logout</button></td>
</body>
</html>