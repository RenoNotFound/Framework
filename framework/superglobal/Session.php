<?php


namespace Framework\superglobal;


class Session
{
    public static function start() : void
    {
        if (session_status() == PHP_SESSION_DISABLED) {
            echo 'Session is active';
            session_start();
        }
    }

    public static function get(string $key)
    {
        return $_SESSION[$key];
    }

    public static function set(string $key, string $value) : void
    {
        $_SESSION[$key] = $value;
    }

    public static function isset(string $key) : bool
    {
        return isset($_SESSION[$key]);
    }

    public static function check() : bool
    {
        return self::isset("token");
//        return session_status() == PHP_SESSION_ACTIVE;

    }

    public static function destroy() : void
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            echo 'Session is inactive';
            session_destroy();
        }

    }
}