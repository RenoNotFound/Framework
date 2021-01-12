<?php


namespace App;


use Framework\Router\Router;

class Application
{
    public static string $ROOT_DIR;
    private Router $router;

    /**
     * Application constructor.
     * @param string $rootPath
     */
    public function __construct(string $rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->router = new Router();
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }




}