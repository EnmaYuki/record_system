<!-- I want to test the page in html format 
If need to test php please change to .php and test header.php and footer.php



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
    <title>Student Record System</title>
</head>
<body>
    <?php include 'header.php';?>
    <h1>Student</h1>
    <table style="width:100%">
        <tr>
            <th>Student Name</th>
            <th>term GPA</th>
        </tr>
        <tr>
            <!-- <td>Student Name</td> -->
            <td>Temp course title</td>
            <!-- <td>term GPA number</td> -->
            <td>Temp term GPA</td>
        </tr>

        <tr>
            <td></td>
            <td><button onclick="alert('Test button')">Reset Password</button></td>
        </tr>
    </table>
    
    <!--Need to improve when the JS start coding-->
    <td><button onclick="document.location='index.html'">:Logout</button></td>
<?php include 'footer.php';?>
</body>
</html>