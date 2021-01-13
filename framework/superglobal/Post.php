<?php


namespace Framework\superglobal;


class Post
{
    public static function get(string $key) : ?string
    {
        return $_POST[$key] ?? null;
    }

    public static function has(string $key) : bool
    {
        return isset($_POST[$key]);
    }

}