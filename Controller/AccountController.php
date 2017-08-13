<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 1:54 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once $_SERVER['DOCUMENT_ROOT'].'/Vaulty/Core/Autoload.php';

class AccountController
{
    public function Activate($email){

        $code=Hash::generateCode(15);

    }
}