<?php


namespace App\controller;


use App\Application;
use Framework\database\Database;
use PDO;

abstract class Controller
{
    public static Database $database;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->setUpDatabase();
    }



    protected function pdo() : PDO
    {
        return self::$database->getPdo();
    }

    protected static function render(string $tmplName, array $variables = []) : string
    {
        return Application::$app->getRouter()->getView()->render($tmplName, $variables);
    }
}

function setUpDatabase() : Database
{
//    $configurationContent = file_get_contents(__DIR__ . "../config/config.json");
//    $config = json_decode($configurationContent, true);;
    $config = [
        "host" => "localhost",
        "name" => "prioris",
        "user" => "reno",
        "password" => "qwer"
    ];
    return new Database($config);
}

Controller::$database = setUpDatabase();