<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 8/11/17
 * Time: 2:07 PM
 */

class Validation
{
    /**
     * @param $username
     * @return bool
     */
    public static function validUsername($username){

        if(preg_match('/^[a-zA-Z0-9]*_?[a-zA-Z0-9]*$/',$username)){
            return true;
        }
    }

    /**
     * @param $email
     * @return bool
     */
    public static function validEmail($email){

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
    }

    /**
     * @param $password
     * @return bool
     */
    public static function validPassword($password){

        if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$password)){
            return true;
        }
    }

    /**
     * @param $password
     * @param $passwordRepeat
     * @return bool
     */
    public static function matchPassword($password, $passwordRepeat){

        if($password===$passwordRepeat){
            return true;
        }
    }
}