<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 9/13/17
 * Time: 6:47 PM
 */

class LogoutController extends Controller
{
    public function logout()
    {
        if (AuthController::$logged==true){

            session_destroy();
            AuthController::$logged=false;

        }else{
            echo "You're not logged in.";
        }
    }
}