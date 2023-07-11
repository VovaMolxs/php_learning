<?php
namespace App\Models;


use Core\Core;

class Model
{

    protected $db = null;
    protected $pdo = null;
    protected $queryBuilder = null;
    
    public function __construct()
    {
        $core = Core::getInstance();
        $this->queryBuilder = $core->getSystemObject('queryBuilder');
        $this->db = $core->getSystemObject('db');
        $this->pdo = $this->db->getDbConnection();
        /**
         * Хорошо, что вы сюда заглянули. Не правда ли, класс Model напоминает какой-то другой класс?
         * Вам нужно понять какой (опирайтесь на нашу архитектуру) и выполнить здесь похожие действия
         * (смотрите свойства, которые здесь есть)   
         */
    }
}