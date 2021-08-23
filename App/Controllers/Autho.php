<?php

    namespace App\Controllers;

    use App\Models\User;
    use \Core\View;

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
                $user = $_POST['login'];
                $login = $user[0];
                $pass = $user[1];
                $user = User::getOne($login);
                $out = var_dump($user);
                $userinfo = $user[0];

            }
            View::renderTemplate('UserPage/userpage.html', ['login'=>$userinfo['login'], 'pass'=>$userinfo['pass']]);
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
