<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 9/13/17
 * Time: 6:47 PM
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';
/**
 * Class LogoutController
 */
class LogoutController extends Controller
{
    /**
     *Logout function
     */
    public function logoutAction()
    {
        $parameter="";

        Session::destroy();
        Redirect::redirectUrl('/home',$parameter);
    }
}