<?php


namespace App;


use Framework\router\Router;

class Application
{
    private Router $router;
    public static Application $app;

    /**
     * application constructor.
     * @param string $rootPath
     */
    public function __construct(string $rootPath)
    {
        self::$app = $this;
        $this->router = new Router($rootPath);
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