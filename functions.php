<?php
function emptyLogin($id,$role,$password){
    $result;
    if(empty($id)||empty($role)||empty($password)){
        if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
    }
}

function loginUser($connect, $userid, $role,$password)
{
    $uidExists = uidExists($connect, $userid, $role, $password);

    if ($uidExists == false) {
        echo"<script> window.alert(\"can't find user\")";
    }
    

    $checkPwd = ($password == $uidExists["usersPwd"]);
    if($uidExists["usersStatus"]==-99){
        if($role == "T"){
            //---------test-------------
            header("teacher.php");
        } else if($role == "S"){
            //----------test-----------
            header("student.php");
        }
        //---------pop error------------
        //header("location:../login-register.php?error=acessdeny");
    }
    else{

        if ($checkPwd === false) {
            header("login.php?error=wrongPassword");
        } else if ($checkPwd === true) {
            session_start();
            //--------store userid in session-------
            //$_SESSION["userid"] = $uidExists["usersId"];
            //$_SESSION["useruid"] = $uidExists["usersUid"];
            //$_SESSION["userstatus"] = $uidExists["usersStatus"];
            header("location:../profile/profile.php");
            exit();
        }
    }
}

function uidExists($connect, $username, $role)
{
    //-----------pls get user, pw and role-------------
    $sql = "SELECT * FROM users WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //-----------alert?-----------
        //header("location:../login-register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

