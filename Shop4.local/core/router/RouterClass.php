<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 07.05.2018
 * Time: 12:49
 */
namespace Core\Router;


use Core\AbstractCore;
use Core\Router\web_routes\web_routes as w_b;
use Auryn\Injector;
/**
 * Class RouterClass
 * @package router
 */
class RouterClass extends AbstractCore
{
    private static $instance = null;

    private $path = null;

    private $file_info = null;

    const VIEW_PATH = 'app/views/';

    private function __construct(){}

    private function __clone(){}

    /**
     * @param $param
     * @throws Ex
     */
    private function IsViewExist($param)
    {
        //$param['view'] = AC::PATH_TO_TEMPLATES.$param['view'];
        if (!file_exists(self::VIEW_PATH.$param['view'])){
            throw new \Exception("Файл представлений не найден!");
        }
    }

    /**
     * @param $param
     */
    private function CheckFile($param)
    {
        if (!file_exists($param['file'])){
            //header("Location: 404");

            return null;
        }
        require_once $param['file'];
    }

    /**
     * @param $param
     * @return mixed
     * @throws Ex
     */
    private function CheckClass($param)
    {
        $injector = new Injector();
        if (!class_exists($param['class']) ){
            throw new \Exception($param['class']." does not exist");
        }
        if (!$param['view']){
            return $injector->make($param['class']);
        }
        
        return $injector->make($param['class']);
    }

    /**
     * @param $object
     * @param $method
     * @param null $params
     * @param null $redirect
     * @throws Exception
     */
    private function CheckMethod($object, $method, $params = null, $redirect = null )
    {
        if (!method_exists($object, $method)){
            die("with method: $method");
        }
        $object->$method($params, $redirect);
    }

    /**
     * @param $param
     * @throws Ex
     */
    private function CheckSession($param)
    {
        $session = CoreClass::getInstance();
        $session = $session->getSystemObject();
        if ($param["middleware"] == "user"){
            $session->CheckSession();
        }
        elseif( $param["middleware"] == "guest" ){
            $session->DeleteSession();
        }
    }

    private function CheckMethodOfSendingData($param)
    {
        if( $param['method'] == "get" ){
            $this->IsViewExist($this->file_info);
            $obj = $this->CheckClass($this->file_info);
            //die('CheckMethodOfSendingData');
            $this->CheckMethod($obj, $this->file_info["function"]);
        }
        else if($param['method'] == "post" ){
            if ($_POST){
                $obj = $this->CheckClass($this->file_info);
                $request = new RequestClass();
                $request->setData($_POST);
                $this->CheckMethod($obj, $this->file_info["function"], $request, $param['redirect']);
            }
            else throw new \Exception('Пустой POST массив!');
        }
        else die("Непонятный метод передачи данных!");
    }

    /**
     * @return null|RouterClass
     */
    public static function getInstance()
    {
        if ( !self::$instance ){
            return new RouterClass();
        }
        else return self::$instance;
    }

    /**
     *
     */
    public function init()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $this->path = $routes;
    }

    public function FindPath()
    {
        $this->file_info = w_b::FindRoute($this->path);
		//die(var_dump($this->file_info));
        $this->CheckFile($this->file_info);
        //$this->CheckSession($this->file_info);
        $this->CheckMethodOfSendingData($this->file_info);
    }
} 