<?php
namespace App\Controllers;


use App\Models\TestModel as TestModel;
use App\Models\ProductModel as ProductModel;

class TestController extends Controller
{
    private $testModel    = null;
    private $productModel = null;

    public function __construct()
    {}

    public function index()
    {
        $this->testModel = new TestModel();

        //Аналогичное задание. Получить все продукты из базы через соответствующую модель.
        $products = $this->testModel->getProducts();
        $this->display('test.html', $products);
    }
}