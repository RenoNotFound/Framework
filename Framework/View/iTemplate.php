<?php


namespace Framework\View;


interface iTemplate
{
    public function render(string $templateName, array $templateVariables);
}