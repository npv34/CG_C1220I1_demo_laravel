<?php


namespace App\Http\Repositories;


class UserRepository extends Repository
{
    function getAll() {
        return [
            "1" => [
                "name" => "Dao",
                "email" => "Dao@gmail.com",
                "address" => "Hn"
            ],
            "2" => [
                "name" => "Tuan",
                "email" => "tuan@gmail.com",
                "address" => "Hn"
            ],
            "3" => [
                "name" => "Minh",
                "email" => "minh@gmail.com",
                "address" => "Hn"
            ]
        ];
    }
}
