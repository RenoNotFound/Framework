<?php


namespace Framework\Router;


use Framework\SuperGlobal\Server;

class Router
{
    protected array $routes = [];

    public function get($path, $callback)
    {
        $this->routes["get"][$path] = $callback;
    }

    public function resolve()
    {
        $path = Server::getPath();
        $method = Server::getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return "Not found";
        }

        return call_user_func($callback);
    }
}