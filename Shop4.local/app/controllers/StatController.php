<?php
namespace App\Controllers;


use App\Models\StatModel;


class StatController extends Controller
{
    private $statModel = null;

    public function __construct()
    {}

    public function index()
    {

        $this->statModel = new StatModel();
        $http = $_SERVER['HTTP_HOST'];
        $maxPrice = $this->statModel->maxPrice();
        $minPrice = $this->statModel->minPrice();
        $avgPrice = $this->statModel->averagePrice();

        if (!empty($_POST)) {

            switch ($_POST['select']) {
                case 'ASC':
                    $products = $this->statModel->orderByMinMax();
                    $this->display('index.html', [
                        'products' => $products,
                        'http' => $http,
                        'maxPrice' => $maxPrice,
                        'minPrice' => $minPrice,
                        'avgPrice' => $avgPrice,
                    ] );
                    break;
                case 'DESC':
                    $products = $this->statModel->orderByMaxMin();
                    $this->display('index.html', [
                        'products' => $products,
                        'http' => $http,
                        'maxPrice' => $maxPrice,
                        'minPrice' => $minPrice,
                        'avgPrice' => $avgPrice,
                    ] );
                    break;

            }

        } else {
            $products = $this->statModel->getProducts();
            //die(var_dump($_SERVER));
            $this->display('index.html', [
                'products' => $products,
                'http' => $http,
                'maxPrice' => $maxPrice,
                'minPrice' => $minPrice,
                'avgPrice' => $avgPrice,
                ] );
        }




    }
}