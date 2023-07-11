<?php
namespace Core\Template;


use Core\AbstractCore;

class TemplateClass extends AbstractCore
{
    private static $instance = null;
    private $twig            = null;

    public static function getInstance()
    {
        if(!self::$instance){
            return self::$instance = new self();
        }

        return self::$instance;
    }

    public function init()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/views/');
        $twig = new \Twig\Environment($loader, [
            //'cache' => 'core/template/cache',
            'cache' => false,
        ]);
        $this->twig = $twig;
    }

    public function getTwig()
    {
        return $this->twig;
    }
}