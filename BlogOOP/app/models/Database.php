<?php

class Database
{
    private static $instance = null;
    private $connection;
    private $hostname = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'blog';

    private function __construct() {
        $this->connection = new mysqli($this->hostname, $this->user, $this->pass, $this->name);
        if ($this->connection->connect_error) {
            die("Connection Filed: " . $this->connection->connect_error);
        }
    }

    /**
     * @return mysqli
     */
    public function getConnection(): mysqli
    {
        return $this->connection;
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

}