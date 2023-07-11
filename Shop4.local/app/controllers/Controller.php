<?php
namespace App\Controllers;


use Core\Core as Core;

class Controller
{
    public function display($template = "index.html", array $params = null)
    {
        $core      = Core::getInstance();
        $templater = $core->getSystemObject("template");
        $twig      = $templater->getTwig();
        echo $twig->render($template, $params);
    }
}