<?php


namespace Framework\superglobal;


class Request
{
    public static function method()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public static function isGet()
    {
        return self::method() === "get";
    }

    public static function isPost()
    {
        return self::method() === "post";
    }
}