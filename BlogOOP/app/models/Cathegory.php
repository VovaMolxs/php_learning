<?php

class Category
{
private $database;

public function __construct() {
    $this->database = Database::getInstance()->getConnection();
}

public function readAll() {
    $result = $this->database->query('SELECT * FROM categories');

    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }

    return $categories;
}

}