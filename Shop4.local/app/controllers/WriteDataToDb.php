<?php

function writeDataToDb($dbConnect, array $data)
{
    $clearTable = function () use ($dbConnect){
        $query = "DELETE FROM products";
        mysqli_query($dbConnect, $query) or die("SQL: insert Error!".__FILE__." ".__LINE__);
    };
    $clearTable();
    $query = "INSERT INTO products (id, name, price) VALUES ";
    $values = getSqlValues($data);
    $query .= $values;
    //die($query);OK
    $result = mysqli_query($dbConnect, $query) or die("SQL: insert Error!".__FILE__." ".__LINE__);

    return 1;
}

function getSqlValues($data)
{
    $values = "(";
    $addQuotes = function ($el) use (&$values){ //очень важно брать по ссыслке т.к иначе теряется первый элемент!
        if(!is_numeric($el)){//т.к нужно обернуть в кавычки строковые значения
            $values .= "'$el'" . ", ";
        }else {
            $values .= $el . ", ";
        }

        return $values;
    };
    foreach ($data as $k => $val){
        if(is_array($val)){
            foreach ($val as $i => $v){
                if($v != end($val)) {
                   $values = $addQuotes($v);
                }else{
                    $values .= $v . " ";
                }
            }
        }
        if($val != end($data)) {
            $values .= "),(";
        }else{
            $values .= ")";
        }
    }

    return $values;
}