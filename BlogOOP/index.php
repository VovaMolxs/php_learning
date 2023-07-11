<?php

use Core\Core;

require_once 'vendor/autoload.php';
/*
$router = new Router();
$router->run();
*/

$core = Core::getInstance();
$core->init();

$router =$core->getSystemObject('router');
$router->findPath();

