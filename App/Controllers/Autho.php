<?php

    namespace App\Controllers;

    use App\Models\User;
    use \Core\View;
    use mysql_xdevapi\Exception;

    /**
     * Home controller
     *
     * PHP version 7.0
     */
    class Autho extends \Core\Controller
    {

        /**
         * Show the index page
         *
         * @return void
         */
        public function loginAction()
        {
            if(isset($_POST['login']))
            {
                $text = "password incorrect";
                $userInput = $_POST['login'];
                $login = $userInput[0];
                $pass = $userInput[1];

                $baseuser = User::getOne($login);
                if(empty($baseuser[0])){
                    $text = "user not found";
                } else {
                    $userinfo = $baseuser[0];
                    if($pass == $userinfo['pass']){
                        $text = "Password correct, welcome";
                    }
                }
            }

            View::renderTemplate('UserPage/userpage.html', ['login'=>$login, 'pass'=>$pass, 'text'=>$text]);
        }
        public function registerAction()
        {
            if(isset($_POST['register']))
            {
                $regist = $_POST['register'];
                $login = $regist[0];
                $pass = $regist[1];
                $userExist = "";
                if(User::getOne($login)){
                    $userExist = "user already exist";
                } else {
                    $userExist = User::addUser($login, $pass);
                }
            }
            View::renderTemplate('UserPage/register.html', ['login'=>$login, 'pass'=>$pass, 'registered'=>$userExist]);
        }
    }
