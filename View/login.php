<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 12:34 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';
session_start();

$vw=new View();
$vw->getView('login');

if(isset($_POST['username'])&&($_POST['password'])){

    $username=htmlentities($_POST['username']);
    $password=htmlentities($_POST['password']);

    $login=new AuthController();
    $login->loginAction($username,$password);

    if($login){
        echo "asdhgdahs";
        $_SESSION['username']=$username;
        if(isset($_SESSION['username'])){
            echo "sesija je postavljena";
        }

    }

}
elseif (isset($_POST['usernameR'])&&($_POST['passwordR'])&&($_POST['emailR'])){

    $usernameR=htmlentities($_POST['usernameR']);
    $passwordR=htmlentities($_POST['passwordR']);
    $emailR=htmlentities($_POST['emailR']);

    $register=new RegisterController();
    $register->RegisterUser($usernameR,$passwordR,$emailR);
    $register->sendMail();
}