<?php


namespace Framework\authorization;


use Framework\superglobal\Session;

class Auth
{
    public static function login(int $id) : void
    {
        session_start();
        $token = tokenGenerator::generateToken(23);
        Session::set("id", $id);
        Session::set("token", $token);
    }

    public static function check() : bool
    {
        return Session::check();
    }

    public static function logout() : void
    {
        Session::destroy();
    }
}

