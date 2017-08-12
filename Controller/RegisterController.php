<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:24 AM
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';
class RegisterController
{
    public function RegisterUser($username,$password,$email){

        $db=new Database();
        $hash=new Hash();



    }

    public function sendMail(){

    }
}