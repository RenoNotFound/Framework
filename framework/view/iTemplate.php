<?php


namespace Framework\view;


interface iTemplate
{
    public function render(string $tmplName, array $tmplVariables);
}