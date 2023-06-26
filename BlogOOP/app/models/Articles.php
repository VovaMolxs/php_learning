<?php

class Articles
{
    private $database;

    public function __construct() {
        //создаем подключение к БД
        $this->database = Database::getInstance()->getConnection();
    }

    public function readAll(){
        $result = $this->database->query('SELECT post.id, title, content, date, description, link_image, categories.name, categories.categories_image,
                                                authors.first_name, authors.last_name FROM post
                                                JOIN categories ON post.category_id = categories.id
                                                JOIN authors ON post.author_id = authors.id 
                                                ORDER BY date DESC LIMIT 5');

        $articles = [];
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }

        return $articles;
    }

    public function create($data) {

        $active = $data['active'];
        $title = $data['title'];
        $content = $data['content'];
        $category_id = $data['category_id'];
        $author_id = $data['author_id'];
        $date = date('Y-m-d H:i:s');
        $description = $data['description'];
        $link_image = $data['link_image'];

        $result = $this->database->query("INSERT INTO `post` (`id`, `active`, `title`, `content`, `category_id`, `author_id`, `date`, `description`, `link_image`) 
                                                VALUES (NULL, '${active}', '${title}', '${content}', '${category_id}', '${author_id}', '${date}', '${description}', '${link_image}')");

    }

    public function read($id) {

    $id = (int) $id;
        $result = $this->database->query("SELECT post.id, title, content, date, description, link_image, categories.name, categories.categories_image,
                                                        authors.first_name, authors.last_name FROM post
                                                        JOIN categories ON post.category_id = categories.id
                                                        JOIN authors ON post.author_id = authors.id WHERE post.id = ${id}");

        $article = [];
        while ($row = $result->fetch_assoc()) {
            $article[] = $row;
        }

        return $article;
    }

    public function update($id, $data) {
        $id = (int) $id;

        $title = $data['title'];
        $content = $data['content'];
        $category_id = $data['category_id'];
        $author_id = $data['author_id'];
        $description = $data['description'];
        $link_image = $data['link_image'];


        $result = $this->database->query("UPDATE `post` SET `title` = '${title}', `content` = '${content}', `category_id` = '${category_id}', 
                  `author_id` = '${author_id}', `description` = '${description}', `link_image` = '${link_image}' WHERE `post`.`id` = ${id}");

    }

    public function delete($id) {
        $result = $this->database->query("DELETE FROM post WHERE id = ${id}");
    }








    /*
    public function readPagination($data) {
        $cathgories = (int) $data['cat'];
        $page = (int) $data['page'];

        $result = $this->database->query("SELECT post.id, title, content, date, description, link_image, categories.name, categories.categories_image,
    authors.first_name, authors.last_name FROM post
    JOIN categories ON post.category_id = categories.id
    JOIN authors ON post.author_id = authors.id WHERE categories.id = ${cathgories}
    ORDER BY date DESC LIMIT 5 OFFSET ${page}");
    }*/




}