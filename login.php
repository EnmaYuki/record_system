<?php
if(isset($_POST["submit"])){
    $role=$_POST["userid"].; 
    $userid = $_POST["uid"];
    $password =  $_POST["pwd"];

    require_once './database.php';
    require_once './functions.php';

    if (emptyLogin($userid,$role, $password) !== false) {
        alert("error=emptyinput");
        exit();
    }
    loginUser($conn, $username,$role, $password);
} else {
    window.alert("error=emptyinput");
    exit();
}
   
