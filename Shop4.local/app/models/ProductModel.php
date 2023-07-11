<?php

namespace App\Models;


class ProductModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
/*
    public function getProducts()
    {
        $query = "SELECT * FROM products";
        $stmt = $this->pdo->query($query);
        $response = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }
*/
    public function getProducts() {
        $result = $this->queryBuilder->select('products', ['*'])
            ->get()
            ->toArray();
        return $result;
    }

}
