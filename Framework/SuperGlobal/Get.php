<?php


namespace Framework\SuperGlobal;


class Get
{
    public static function get(string $key) : ?string
    {
        return $_GET[$key] ?? null;
    }

    public static function has(string $key) : bool
    {
        return isset($_GET[$key]);
    }

}