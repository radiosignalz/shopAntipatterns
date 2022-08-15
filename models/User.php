<?php

namespace app\models;


use app\engine\Session;

class User extends Repository
{
    protected $id;
    protected $login;
    protected $pass;

    protected $props = [
        'login' => false,
        'pass' => false
    ];

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public static function Auth($login, $pass) {
        $user = User::getWhere('login', $login);
        //TODO  проверять пароль только если $user не false
        //и захешируйте пароль в БД используя password_hash() password_verify()

        if ($pass == $user->pass) {
            //TODO* переделать на Session
           // $session = new Session();
           // $session->set('login', $login);
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public static function isAuth() {
        return isset($_SESSION['login']);
    }



    public static function getName() {
        return $_SESSION['login'];
    }


    protected static function getTableName()
    {
        return 'users';
    }
}