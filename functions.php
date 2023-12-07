<?php
function emptyLogin($id,$role,$password){
    $result;
    if(empty($id)||emply($role)||empty($password)){
        if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
    }
}

function loginUser($conn, $userid, $role,$password)
{
    $uidExists = uidExists($conn, $userid, $role,$password);

    if ($uidExists == false) {
        echo"<script> window.alert(\"can't find user\")"
    }
    

    $checkPwd = ($pwd == $uidExists["usersPwd"]);
    if($uidExists["usersStatus"]==-99){
        header("location:../login-register.php?error=acessdeny");
    }
    else{

    if ($checkPwd === false) {
        header("location:../login-register.php?error=wrongPassword");
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
//        $_SESSION["useremail"] = $uidExists["usersEmail"];
        $_SESSION["userstatus"] = $uidExists["usersStatus"];
        header("location:../profile/profile.php");
        exit();
    }
}
}
