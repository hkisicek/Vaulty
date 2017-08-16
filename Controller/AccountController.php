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
    public function Activate($email){

        $code=Hash::generateCode(15);
    }
}