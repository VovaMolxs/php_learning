<?php

function parseData($fileName)
{
    $response = file_get_contents($fileName);
    //transform response in array
    $response = explode("---", $response);
    $response = array_map(function($el){
        $output = [];
        $r = (explode("\n", $el));
        for ($i=0; $i < count($r); $i++) {
            if($r[$i]){//очищаю от Null
                list($key,$value) = explode(":", $r[$i]);//дроблю на ключ:значение
                $output[$key] = $value;
            }
        }

        return $output;
    }, $response);
    //die(var_dump($response)); //ok
    return $response;
}

