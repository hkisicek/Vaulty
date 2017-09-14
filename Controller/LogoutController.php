<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 9/13/17
 * Time: 6:47 PM
 */

class LogoutController extends Controller
{
    /**
     *logout function
     */
    public function logout()
    {
        Session::destroy();
        Redirect::redirectUrl('/home');
    }
}