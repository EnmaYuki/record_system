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
    <title>Student Record System (Teacher)</title>
</head>
<body>
    <h1>Teacher</h1>
    <table style="width:100%">
        <tr>
            <th>Teacher Name:</th>
            <th> Chris Wong</th>
        </tr>
        <tr>
            <td><button onclick="alert('Test button')">Info</button></td>
            <td><button onclick="alert('Test button')">Reset Password</button></td>
        </tr>

        <tr>
            
        </tr>
    </table>
    <br>
    <form action="/submit" method="post">
        <label for="courseID">Course ID:</label><br>
        <input type="text" id="courseID" name="courseID"><br>
        <label for="score">Score:</label><br>
        <input type="number" id="score" name="score"><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <!--Need to improve when the JS start coding-->
    <td><button onclick="document.location='index.html'">Logout</button></td>
</body>
</html>