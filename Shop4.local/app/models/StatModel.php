<?php
namespace App\Models;


class StatModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProducts() {
        $result = $this->queryBuilder->select('products', ['*'])
            ->get()
            ->toArray();
        return $result;
    }

    public function orderByMinMax() {
        $result = $this->queryBuilder->select('products', ['*'])
            ->order(['price'])
            ->get()
            ->toArray();
        return $result;
    }
    public function orderByMaxMin() {
        $result = $this->queryBuilder->select('products', ['*'])
            ->order(['price'], 'DESC')
            ->get()
            ->toArray();
        return $result;
    }
    public function minPrice() {
        $result = $this->queryBuilder->select('products', ['MIN(price)'])
            ->get()
            ->toArray();
        return $result;
    }
    public function maxPrice() {
        $result = $this->queryBuilder->select('products', ['MAX(price)'])
            ->get()
            ->toArray();
        return $result;
    }

}
