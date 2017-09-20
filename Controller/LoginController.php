<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 9/13/17
 * Time: 5:52 PM
 */
include_once $_SERVER['DOCUMENT_ROOT'].'/Core/Autoload.php';
/**
 * Class LoginController
 *
 * Handles register action
 */
class LoginController
{
    /**
     *Retrieves view
     */
    public function index()
    {
        Session::startSession();
        View::getView('login');
    }
    /**
     *Adds new user to db
     */
    public function registerAction()
    {
        $usernameR=htmlentities($_POST['usernameR']);
        $passwordR=htmlentities($_POST['passwordR']);
        $passwordRP=htmlentities($_POST['passwordRP']);
        $emailR=htmlentities($_POST['emailR']);

        //server side validation
        if(Validation::validUsername($usernameR) && Validation::validPassword($passwordR) && Validation::validEmail($emailR) && Validation::matchPassword($passwordR,$passwordRP)) {

            $hashedPass=Hash::createHash($passwordR);
            Hash::generateCode(15);

            Database::insert_row("insert into user (user_id,email,password,username,active,role) values (default,:email,:password,:username,'1','2')", array(
                'email'=>$emailR,
                'password'=>$hashedPass,
                'username'=>$usernameR));

            $parameter="";
            Redirect::redirectUrl('/home',$parameter);

        }else{
            $parameter="";
            Redirect::redirectUrl('/home',$parameter);
        }
    }
}