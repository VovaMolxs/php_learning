<?php
require_once 'vendor/autoload.php';
use Core\Core as Core;

/*Adding of Router */
$core = Core::getInstance();
$core->init();
$router = $core->getSystemObject();
$templater = $core->getSystemObject("template");

$router->FindPath();
$twig = $templater->getTwig();