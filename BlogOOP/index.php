<?php
require_once 'app/controllers/articles/ArticlesController.php';
require_once 'app/controllers/HomeController.php';
require_once 'app/models/Articles.php';
require_once 'app/models/Database.php';
require_once 'app/models/Category.php';
require_once 'app/models/Authors.php';
require_once 'app/router.php';

$router = new Router();
$router->run();