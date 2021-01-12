<?php

use App\Application;

require_once("vendor/autoload.php");


$app = new Application(__DIR__);


$app->getRouter()->get("/", function () {
    return "Hello world";
});

$app->getRouter()->get("/register", function () {
    return "Register";
});

$app->run();