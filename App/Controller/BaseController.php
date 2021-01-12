<?php


namespace App\Controller;


use Framework\Database\Connection\Connection;
use Framework\View\View;
use Exception;
use PDO;

abstract class BaseController
{
    protected static array $dbConfig;
    protected static View $view;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        try{
            $this->configureApp();
        } catch (Exception $exception) {
            echo "Could not load configuration";
        }
    }

    private function configureApp() : void
    {
        $configurationContent = file_get_contents(__DIR__ . "../Config/config.json");
        $config = json_decode($configurationContent, true);;

        self::$dbConfig = $config["database_connection"];

        $templatesDirectory = __DIR__ . "../../Templates";
        self::$view = new View($templatesDirectory);
    }


    protected function getConnection() : PDO
    {
        return Connection::getConnection(self::$dbConfig);
    }

    protected function view(string $template, array $variables) : void
    {
        self::$view->render($template, $variables);
    }

}