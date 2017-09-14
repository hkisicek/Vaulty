<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';

Session::startSession();

if(isset($_POST["username"]) && isset($_POST["password"])) {

    $username=$_POST["username"];
    $password=$_POST["password"];

    $result=Database::execute_query("select * from user where username=:username", array('username'=>$username));

    if($result) {

        $hash=$result["password"];
        if(Hash::verifyHash($password,$hash)){

            $data["flag"]="true";

            $_SESSION["username"] = $username;
            $_SESSION["role"] = $result["role"];
            $_SESSION["user_ID"]=$result["user_ID"];
        }
        else{
            $data["flag"]="wrong";
        }
    }
    else{
        $data["flag"]="false";
    }
    echo json_encode($data);
}
?>