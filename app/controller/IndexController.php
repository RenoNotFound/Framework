<?php


namespace App\controller;


use Framework\authorization\Auth;

class IndexController extends Controller
{

    public function index() : string
    {

        $content = self::render("public");
        $layoutVariables = [
            "title" => "Home",
            "content" => $content
        ];

        $tmplName = Auth::check() ? "authbase" : "base";
        return self::render($tmplName, $layoutVariables);
    }

    public function treasure() : string
    {
        $treasureContent = self::render("treasure");
        $forbiddenContent = self::render("forbidden");
        $layoutVariables = [
            "title" => Auth::check() ? "Treasure" : "Forbidden",
            "content" => Auth::check() ? $treasureContent : $forbiddenContent
        ];
        $tmplName = Auth::check() ? "authbase" : "base";
        return self::render($tmplName, $layoutVariables);
    }


}