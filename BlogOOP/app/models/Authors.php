<?php

class Authors
{
    private $database;

    public function __construct() {
        $this->database = Database::getInstance()->getConnection();
    }

    public function readAll() {
        $result = $this->database->query("SELECT * FROM authors");
        $authors = [];

        while ($row = $result->fetch_assoc()) {
            $authors[] = $row;
        }

        return $authors;
    }

}