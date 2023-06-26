<?php
require_once 'app/models/Articles.php';

class ArticlesController
{
    public function index() {
        $articlesModel = new Articles();
        $articles = $articlesModel->readAll();

        include 'app/views/articles/index.php';
    }

    public function create() {
        $category = new Category();
        $category = $category->readAll();
        $authors = new Authors();
        $authors = $authors->readAll();
        include 'app/views/articles/create.php';
    }

    public function delete() {
        $articles = new Articles();
        $articles->delete($_GET['id']);
        header("Location: index.php?page=articles");
    }

    public function edit() {
        $articleModel = new Articles();
        $article = $articleModel->read($_GET['id']);
        $category = new Category();
        $category = $category->readAll();
        $authors = new Authors();
        $authors = $authors->readAll();

        include 'app/views/articles/edit.php';
    }

    public function update() {
        $articalModel = new Articles();
        $articalModel->update($_GET['id'], $_POST);
        header('Location: index.php?page=articles');
    }

    public function store() {
        if (
            isset($_POST['active']) &&
            isset($_POST['title']) &&
            isset($_POST['content']) &&
            isset($_POST['category_id']) &&
            isset($_POST['author_id']) &&
            isset($_POST['description']) &&
            isset($_POST['link_image'])
        ) {
            $articlesModel = new Articles();
            $articlesModel->create($_POST);
        }

        header("Location: index.php?page=articles");
    }

    public function article() {
        $articlesModel = new Articles();
        $article = $articlesModel->read($_GET['id']);

        include 'app/views/articles/article.php';
    }
}

