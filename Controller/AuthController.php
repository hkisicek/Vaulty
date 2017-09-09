<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:23 AM
 */

include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
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
    public function loginAction($username, $password)
    {
        $db=new Database();
        $result=$db->execute_query("select * from user where username=:username", array('username'=>$username));

        if(!empty($result)) {

            $hashedPass=$result['password'];

            if(Hash::verifyHash($password,$hashedPass)) {

                AuthController::$logged=true;

            }else{

                AuthController::$logged=false;
            }
        }
        return AuthController::$logged;
    }

    /**
     * Function for destroying session
     */
    public function logoutAction()
    {
        if (AuthController::$logged==true){

            session_destroy();
            AuthController::$logged=false;

        }else{

            echo "You're not logged in.";
        }
    }

    public static function getData()
    {
        if(isset($_GET['username']) && isset($_GET['password'])) {
            $db = new Database();
            $result = $db->query_execute("select username,password from user");

            return json_encode($result);
        }
    }
}
