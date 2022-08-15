<?php

namespace app\controllers;

use app\models\User;

class AuthController extends Controller
{
    //action="/auth/login"
    public function actionLogin() {
        //TODO использовать request
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        if (User::Auth($login, $pass)) {
            header("Location: /");
            die();
        } else {
            die("Не верный логин пароль");
        }
    }

    public function actionLogout()
    {
        session_regenerate_id();
        session_destroy();
        header("Location: /");
        die();
    }
}