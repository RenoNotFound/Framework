<?php


namespace Framework\SuperGlobal;


class Server
{
    public static function getPath()
    {
        $path = $_SERVER["REQUEST_URI"] ?? "/";
        $position = strpos($path, "?");
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public static function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }
}