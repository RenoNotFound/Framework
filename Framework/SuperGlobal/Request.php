<?php


namespace Framework\SuperGlobal;


class Request
{
    public static function get(string $key) : ?string
    {
        return $_REQUEST[$key] ?? null;
    }

    public static function has(string $key) : bool
    {
        return isset($_REQUEST[$key]);
    }

}