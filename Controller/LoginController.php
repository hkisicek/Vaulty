<?php
/**
 * Created by PhpStorm.
 * User: helena
 * Date: 9/13/17
 * Time: 5:52 PM
 */

class LoginController
{
    /**
     *retrieving view
     */
    public function index()
    {
        Session::startSession();
        View::getView('login');
    }
    /**
     *adding new user to database
     */
    public function register()
    {
        $usernameR=htmlentities($_POST['usernameR']);
        $passwordR=htmlentities($_POST['passwordR']);
        $passwordRP=htmlentities($_POST['passwordRP']);
        $emailR=htmlentities($_POST['emailR']);

        if(Validation::validUsername($usernameR) && Validation::validPassword($passwordR) && Validation::validEmail($emailR) && Validation::matchPassword($passwordR,$passwordRP)) {

            $register = new RegisterController();
            $register->RegisterUser($usernameR, $passwordR, $emailR);
            $register->sendMail();

            $hashedPass=Hash::createHash($passwordR);
            Hash::generateCode(15);

            Database::insert_row("insert into user (user_id,email,password,username,active,role) values (default,:email,:password,:username,'1','2')", array(
                'email'=>$emailR,
                'password'=>$hashedPass,
                'username'=>$usernameR));

        }else{
            Redirect::redirectUrl('/home');
            echo "<div class=\"alert alert-danger\"><strong>Inputs are not valid! Try again!</strong></div>";
        }
    }
}