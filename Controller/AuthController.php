<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:23 AM
 */

include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';

/**
 * Class AuthController
 */
class AuthController
{
    public static $logged=null;

    /**
     * @param $username
     * @param $password
     * @return null
     */
    public function loginAction($username, $password){

        $db=Database::getInstance();
        $result=$db->execute_query("select * from user where username=:username", array('username'=>$username));

        if(!empty($result)) {

            $hashedPass=$result['password'];
            $role=$result['role'];
            $userID=$result['user_ID'];

            if(Hash::verifyHash($password,$hashedPass)) {

                AuthController::$logged=true;

            }else{

                AuthController::$logged=false;
                echo "Username or password are incorrect";
            }
        }
        return AuthController::$logged;
    }

    /**
     * Function for destroying session
     */
    public function logoutAction(){

        if (AuthController::$logged==true){

            session_destroy();
            AuthController::$logged=false;

        }else{
            echo "You're not logged in.";
        }
    }
}
