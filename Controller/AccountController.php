<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 1:54 PM
 */


include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';

class AccountController
{
    /**
     * @param $email
     */
    public static function activateAccount($email)
    {
        $code=Hash::generateCode(15);
    }

    public static function activate(){


    }

    public static function deactivate(){

    }

}