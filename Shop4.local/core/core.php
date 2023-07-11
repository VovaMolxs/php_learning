<?php
namespace Core;


use Core\AbstractCore;
use Core\RouterClass;
use Core\DB\DBClass as DB;
use Core\DB\QueryBuilder\MySQLiWrapper as QueryBuilder;

class Core extends AbstractCore
{
    private $system_objects = [];

    private static $instance = null;

    /**
     * CoreClass constructor.
     */
    private function __construct(){}

    /**
     *
     */
    private function __clone(){}

    /**
     * @return Core|null
     */
    public static function getInstance(){
        if (!Core::$instance){
            return Core::$instance = new Core();
        }
        else
            return Core::$instance;
    }

    /**
     *
     */
    public function init()
    {
        if (empty($this->system_objects)){
            $this->system_objects["router"] = Router\RouterClass::getInstance();
            $this->system_objects["db"] = DB::getInstance();
            $this->system_objects['template'] = Template\TemplateClass::getInstance();
            $this->system_objects['queryBuilder'] = QueryBuilder::getInstance();
        }

        foreach ($this->system_objects as $obj){
            $obj->init();
        }
    }

    public function getSystemObject($request = "router")
    {
        switch ($request){
            case "db": return $this->system_objects['db'];
            case "router":   return $this->system_objects['router'];
            case "template": return $this->system_objects['template'];
            case "queryBuilder": return $this->system_objects['queryBuilder'];
            default: throw new \Exception("Can`t find such system object!");
        }
    }  
}