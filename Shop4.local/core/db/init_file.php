<?php
/**
 * Created by PhpStorm.
 * User: Vlad
 * Date: 23.06.2018
 * Time: 7:40
 */
//В данном случае этот файл будет содержать массив юзеров и эмитировать БД
namespace Core\DB;

class init_file
{
    private $users = [
        1 => [
            "id"    => 1,
            "email" => "test1@test.com",
            "name"  => "test1",
        ],
        2 => [
            "id"    => 2,
            "email" => "test2@test.com",
            "name"  => "test2",
        ],
        3 => [
            "id"    => 3,
            "email" => "test3@test.com",
            "name"  => "test3",
        ]
    ];

    public function getUsers()
    {
        return $this->users;
    }
}

