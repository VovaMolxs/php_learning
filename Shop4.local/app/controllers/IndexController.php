<?php
namespace App\Controllers;


use App\Models\ProductModel as ProductModel;

class IndexController extends Controller
{
    private $productModel = null;

    public function __construct()
    {}

    public function index()
    {
        /**Добавьте сюда код, для получения всех продуктов из таблицы. 
         * Реализуйте это через соответствующую модель
         */
        $this->productModel = new ProductModel();
        $products = $this->productModel->getProducts();
        
         //Сейчас этот массив пуст. Вам нужно в него получить продукты

        $request = $_SERVER['REQUEST_URI'];
        $http = $_SERVER['HTTP_HOST'];
        $this->display('index.html', ['products' => $products,
                                                'request' => $request],
        );
    }
}