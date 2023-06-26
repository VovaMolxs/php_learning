<?php

class Category
{
private $database;

public function __construct() {
    $this->database = Database::getInstance()->getConnection();
}

public function readAll() {
    $result = $this->database->query('SELECT * FROM categories');

    $category = [];
    while ($row = $result->fetch_assoc()) {
        $category[] = $row;
    }

    return $category;
}



}