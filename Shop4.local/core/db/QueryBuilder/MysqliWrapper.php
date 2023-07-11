<?php
namespace Core\DB\QueryBuilder;
/**
 * Обёртка для работы с mysqli 
 * в $instance находится сам экземпляр объекта mysqli 
 * в $wrapper находится экземпляр объекта MySQLiWrapper
 * Для использования,необходима инициализация подключения к БД. Данные, неообходимые для подключения зашиты в
 * env.ini
 * Класс MySQLiWrapper реализует паттерн синглтон.
 * Формирующийся запрос хранится в $this->query
 * В $this->result будет храниться результат запроса (после SELECT)
 * Реализован QueryBuilder (пытался сделать по примеру реализации построителя запросов в Laravel.
 * Сейчас тут основные операции (удаление есть в виде delete и truncate) + оператор where() и его помощники
 *  (and(), or())). 
 * После формирования запроса, его необходимо выполнить с помощью оператора execute 
 * (если запрос не подразумевает ответа с данными) или get() - он обработает ответ и получит ответ в виде
 * mysqli-ответа. Чтобы преобразовать ответ в массив достаточно вызвать метод toArray()
 * Если нужно выполнить запрос, построенный не билдером, а переданный юзером, то достаточно просто вызвать
 * метод query() на прямую
 */
use DB\DbClass as DB;
use \Core\Core as Core;

class MySQLiWrapper extends \Core\AbstractCore
{
    //здесь будет объект mysqli
    private static $instance;
    //а здесь экземпляр MySQLiWrapper
    private static $wrapper;
    private $query        = '';
    private $result       = null;
    private $stat         = [];
    private $core         = null;
    private $db           = null;

    public static function getInstance()
    {
        if (!self::$instance) {
            return self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Реализация Singleton pattern
     */
    public function init($file = 'env.ini')
    {
        $this->db = $this->core->getSystemObject('db')->getDbConnection();
        //var_dump($this->db);
        if (!isset(self::$instance)) {
            return self::$instance = new self();
        }
 
        return $this->db;//self::$wrapper;// = $db;
    }
 
    /**
     * Строит основу select-запроса
     *
     * @param string  $table (имя таблицы в бд)
     * @param array    $data здесь перечислены поля для запроса (или *)
     * @return array
     */
    public function select($table, array $data)
    {
        $this->query = "SELECT ";
        $this->query .= implode(',', $data);
        $this->query .= " FROM $table";
        
        return self::$instance;
    }

    /**
     * Строит insert-запрос
     *
     * @param string  $table (имя таблицы в бд)
     * @param array    $data здесь перечислены данные для вставки в бд
     * @return array
     */
    public function insertData($table, array $data)
    {
        $query = "INSERT INTO $table VALUES ";
        $strData = '';
        $addQuotes = function ($el){
            return "'$el'";
        };
        $func = (function ($val) use(&$strData, $addQuotes){
            $lastElementKey = array_key_last($val);
            $strData .= '(';
            foreach($val as $k => $v){
                if(is_string($v)){
                    $v = $addQuotes($v);
                }
                if($k == $lastElementKey){
                    $strData .= $v.'),';
                }else{
                   $strData .= $v.', ';
                }
            }
            
            return $strData;
        });
        $values = array_map($func, $data);
        $query = $query . $values[count($values) - 1];
        $this->query = mb_substr($query, 0, strlen($query) - 1);
        $msc = $this->startTimer();
        self::query($this->query);
        $this->endTimer($msc);
    }

    /**
     * Строит update-запрос
     *
     * @param string  $table (имя таблицы в бд)
     * @param array    $data здесь перечислены данные для обновления в формате [поле => значение]
     * @return array
     */
    public function update($table, array $data)
    {
        $this->query = "UPDATE $table SET ";
        foreach($data as $i => $v){
            if(array_key_last($data) != $i){
                $this->query .= "$i = ";//
                $this->query .= is_string($v) ?   "'$v'," : "$v,";
            }else{
                $this->query .= "$i = ";//
                $this->query .= is_string($v) ?   "'$v'" : "$v";
            }
        }
        //die($this->query);
        return self::$wrapper;
    }
    
    public function delete($table)
    {
        $this->query = "DELETE FROM $table ";

        return self::$wrapper;
    }

    //-----------------------------------------------

    public function where(array $data)
    {
        $this->query .= " WHERE ";
        foreach($data as $i => $v){
            if(is_string($v) && (!in_array($v, ['>','<', '=', '>=', '<=', '<>'] )) && ($i != 0)) {
                $v = "'$v' ";
            }
            $this->query .= $v;
        }

        return self::$instance;
    }

    public function and(array $data)
    {
        if($data){
            $addQuotes = function ($el){
                return "'$el'";
            };
            $this->query .= ' AND ';
            foreach($data as $i => $v){
                if(is_string($v)
                   && 
                   (!in_array($v, ['>','<', '=', '>=', '<=', '<>'] ))
                   &&
                   ($i !=0)
                ) {
                    $v = "'$v'";
                }
                $this->query .= $v;
            }
            //die($this->query);
            return self::$instance;
        }
    }

    public function or(array $data)
    {
        if($data){
            $addQuotes = function ($el){
                return "'$el'";
            };
            $this->query .= ' OR ';
            foreach($data as $i => $v){
                if(is_string($v)
                   && 
                   (!in_array($v, ['>','<', '=', '>=', '<=', '<>'] ))
                   &&
                   ($i !=0)
                ) {
                    $v = "'$v'";
                }
                $this->query .= $v;
            }
            //die($this->query);
            return self::$instance;
       }
    }

    public function order(array $fields, $sort = 'ASC')
    {
        if($fields){
            $orderFields = implode(',', $fields);
            $this->query .= " ORDER BY $orderFields $sort";
        
            return self::$instance;
       }
    }

    public function limit($limit)
    {
        if(is_numeric($limit)){
            $this->query .= " LIMIT $limit";
        
            return self::$instance;
       }
    }

    //------------------ Служебный мметод ----------------
    //Посмотреть получившийся запрос
    public function getSQL()
    {
        return $this->query;
    }
    //----------------- Конец -----------------------

    //------------------------ Выполнение запроса------------------
    //Выполняет запрос и кладет его результат в свойство $result
    public function get()
    {
        $msc = $this->startTimer();
        $this->result = self::$instance->query($this->query);// or die("Error2: $this->query");   
        $this->endTimer($msc);

        return self::$instance;//self::$wrapper;
    }

    //Просто выполняет запрос. Можно продолжать строить следующий запрос
    public function execute()
    {
        
        $this->query .= ';';
        $msc = $this->startTimer();
        self::$instance->query($this->query) or die("Error: $query");
        $this->endTimer($msc);
        
        return self::$instance;
    }
 
    //Выполнение запроса
    public function query($query)
    {
        $this->result = $this->db->query($query) or die("Error33: $query");

        return  $this->result;//self::$wrapper; 
    }

    public function truncate($table)
    {
        $this->query = "TRUNCATE $table";
        self::$instance->query($this->query) or die("Error: $query");
    }

    //--------------Методы для разбора коллекции-----------------

    public function toArray($assoc = true)
    {
        $response = [];
        if($this->result){
            if($assoc){
                while ($row = $this->result->fetch(\PDO::FETCH_ASSOC)) {
                    $response[] = $row;
                }
            } else{
                while ($row = $this->result->fetch()) {
                    $response[] = $row;
                }
            }
        }

        return $response;
    }

    //--------------------------конец---------------------------------

    //--------------Методы для получения статистики-----------------

    public function getStat()
    {
        return $this->printStat();
    }

     //Сбор статистики по запросам
     private function printStat()
     {
         $stat = "<table style='border:1px solid;'>";
         $stat .= "<tr style=' tr:nth-child(even){background-color: #f2f2f2;'><th>Query</th> <th>Time</th></tr>";
         foreach($this->stat as $val){
             if(is_array($val)){
                 $stat .= "<tr>";
                 foreach($val as $i => $v){
                    $stat .= "<td>$v</td>";
                 }
                 $stat .= "</tr>";
             }
         }
         $stat .= "</table>";
 
         return $stat;
     }
 
     private function startTimer()
     {
         return $msc = microtime(true);
     }
 
     private function endTimer($msc)
     {
         $this->stat[] = ['query' => $this->query, 'time' => microtime(true) - $msc];
     }

    //--------------------------конец---------------------------------

    private function __construct()
    {
        $this->core = Core::getInstance();
    }

    private function __clone()
    {}

   
}