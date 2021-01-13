<?php


namespace Framework\Router;


use Framework\SuperGlobal\Server;
use Framework\View\View;

class Router
{
    private View $view;
    protected array $routes = [];

    /**
     * Router constructor.
     * @param $rootPath
     */
    public function __construct($rootPath)
    {
        $this->view = new View($rootPath);
    }


    public function get($path, $callback)
    {
        $this->routes["get"][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes["post"][$path] = $callback;
    }

    public function resolve()
    {
        $path = Server::getPath();
        $method = Server::getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return "Page not found";
        }

        if (is_string($callback)) {
            return $this->view($callback);
        }

        return call_user_func($callback);
    }

    /**
     * @return View
     */
    public function getView() : View
    {
        return $this->view;
    }

    public function view(string $template, array $variables = []) : string
    {
        return $this->view->render($template, $variables);
    }




}