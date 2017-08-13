<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:23 AM
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';

class AuthController
{
    public static $logged=null;

    public function loginAction($username, $password){

        $db=new Database();
        $result=$db->execute_query("select * from user where username=:username", array('username'=>$username));

        if(!empty($result)) {

            $hashedPass=$result['password'];
            if(Hash::verifyHash($password,$hashedPass)) {

                AuthController::$logged=true;

                Session::startSession();
                Session::set('username', $username);
                echo "Welcome!";

            }else{
                AuthController::$logged=false;
                echo "Username or password are incorrect";

            }
        }
        return AuthController::$logged;
    }

    public function logoutAction(){
        if (AuthController::$logged==true){
            session_destroy();
            AuthController::$logged=false;
        }else{
            echo "You're not logged in.";
        }
    }
}
