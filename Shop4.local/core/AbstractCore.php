<?php
namespace Core;


abstract class AbstractCore
{
    public abstract function init();

    public function displayView()
    {
        $core = Core::getInstance();
        $template = $core->getSystemObject("template");
        $twig = $template->getTwig();

        return $twig;
    }
}