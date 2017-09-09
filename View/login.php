<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';

Session::startSession();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['ajaxLogin'])) {
    $usr = $_POST['username'];
    $pass = $_POST['password'];

    $login=new AuthController();
    if($login->loginAction($usr,$pass)==true) {

        $db=new Database();
        $result=$db->execute_query("select * from user where username=:username", array('username'=>$usr));

        $_SESSION["username"] = $usr;
        $_SESSION["role"] = $result["role"];
        $_SESSION["user_ID"]=$result["user_ID"];

        echo json_encode(array(
            'status'=>1,
            'url'=>'http://vaulty.loc/View/upload.php'
        ));
        return;
    }
    else {
        return "Error in logging in";
    }
} else {
    $vw=new View();
    $vw->getView('login');

    if(isset($_POST['username'])&&($_POST['password'])){

        $username=htmlentities($_POST['username']);
        $password=htmlentities($_POST['password']);

        $login=new AuthController();
        if($login->loginAction($username,$password)==true) {

            $db=new Database();
            $result=$db->execute_query("select * from user where username=:username", array('username'=>$username));

            $_SESSION["username"] = $username;
            $_SESSION["role"] = $result["role"];
            $_SESSION["user_ID"]=$result["user_ID"];

            Redirect::redirectUrl('upload.php');

            //setcookie('username', $username, time() + (86400 * 30), "/");
        }
        else{
            echo "<div class=\"alert alert-danger\"><strong>Inputs are not valid! Try again!</strong></div>";
        }

    } else if (isset($_POST['usernameR'])&&($_POST['passwordR'])&&($_POST['emailR'])){

        $usernameR=htmlentities($_POST['usernameR']);
        $passwordR=htmlentities($_POST['passwordR']);
        $passwordRP=htmlentities($_POST['passwordRP']);
        $emailR=htmlentities($_POST['emailR']);

        if(Validation::validUsername($usernameR) && Validation::validPassword($passwordR) && Validation::validEmail($emailR) && Validation::matchPassword($passwordR,$passwordRP)) {

            $register = new RegisterController();
            $register->RegisterUser($usernameR, $passwordR, $emailR);
            $register->sendMail();

        }else{

            echo "<div class=\"alert alert-danger\"><strong>Inputs are not valid! Try again!</strong></div>";
        }
    }
}



?>