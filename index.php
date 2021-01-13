<?php

use App\Application;
use App\controller\IndexController;
use App\controller\UserController;
use Framework\authorization\Auth;

require_once("vendor/autoload.php");
session_start();

$app = new Application(__DIR__);

$app->getRouter()->get("/", [IndexController::class, "index"]);
$app->getRouter()->get("/treasure", [IndexController::class, "treasure"]);

$app->getRouter()->get("/sign-up", [UserController::class, "register"]);
$app->getRouter()->post("/sign-up", [UserController::class, "register"]);

$app->getRouter()->get("/login", [UserController::class, "login"]);
$app->getRouter()->post("/login", [UserController::class, "login"]);
$app->getRouter()->get("/logout", [UserController::class, "logout"]);



$app->run();