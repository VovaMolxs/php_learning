<?php

class Router {
    public function run() {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 'home';
        }

        switch ($page) {
            case '':
                break;
            case 'home':
                $controller = new HomeController();
                $controller->index();
                break;
            case 'articles':
                $controller = new ArticlesController();
                if (isset($_GET['action'])) {
                    switch ($_GET['action']) {
                        case 'create':
                            $controller->create();
                            break;
                        case 'store':
                            $controller->store();
                            break;
                        case'delete':
                            $controller->delete();
                            break;
                        case 'article':
                            $controller->article();
                            break;
                        case 'edit':
                            $controller->edit();
                            break;
                        case'update':
                            $controller->update();
                            break;
                    }
                } else {
                    $controller->index();
                    break;
                }

                break;

            default:
                http_response_code(404);
                echo "page not found";
                break;
        }
    }
}