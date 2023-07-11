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
        $products = $this->statModel->getProducts();

        if (!empty($_POST)) {

            if (isset($_POST['name']) && isset($_POST['price'])) {
                $data = [
                    ['NULL', $_POST['name'], $_POST['price']]
                ];

                $products = $this->statModel->addProduct($data);

                $this->display('index.html', [
                    'products' => $products,
                    'http' => $http,
                    'maxPrice' => $maxPrice,
                    'minPrice' => $minPrice,
                    'avgPrice' => $avgPrice,
                ] );
            }
            if (isset($_POST['select'])) {
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
            }


        } else {
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