<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 11:24 AM
 */

include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';

class RegisterController
{
    /**
     * @param $username
     * @param $password
     * @param $email
     */
    public function RegisterUser($username, $password, $email)
    {
        $hashedPass=Hash::createHash($password);
        Hash::generateCode(15);

        $db=new Database();
        $db->insert_row("insert into user (user_id,email,password,username,active,role) values (default,:email,:password,:username,'1','2')", array(
            'email'=>$email,
            'password'=>$hashedPass,
            'username'=>$username));
    }
    /**
     * Function for mail sending
     */
    public function sendMail(){

    }
}