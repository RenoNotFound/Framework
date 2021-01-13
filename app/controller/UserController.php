<?php


namespace App\controller;


use App\queries\UserQueries;
use Framework\authorization\Auth;
use Framework\superglobal\Post;
use Framework\superglobal\Request;
use Framework\superglobal\Session;
use http\Header;

class UserController extends Controller
{
    public function register()
    {
        if (Request::isPost()) {
            header("Location: /login");
        }
        $content = self::render("register");
        $layoutVariables = [
            "title" => "Sign up",
            "content" => $content
        ];
        return self::render("base", $layoutVariables);
    }

    public function login()
    {
        $content = self::render("public");
        $layoutVariables = [
            "title" => "Home",
            "content" => $content
        ];

        if (Request::isPost()) {
            $username = Post::get("username");
            $password = Post::get("password");
            $user = UserQueries::getPassByUsername(self::pdo(), $username);
            if ($password === $user["password"]) Auth::login($user["id"]);
            if (Auth::check()) header("Location: /");
        }

        $content = self::render("login");
        $layoutVariables = [
            "title" => "Login",
            "content" => $content
        ];

        return self::render("base", $layoutVariables);
    }

    public function logout()
    {
        Auth::logout();
        header("Location: /");
    }


}