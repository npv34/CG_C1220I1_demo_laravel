<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index() {
        $users = [
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
        return view('admin.users.list', compact('users'));
    }

    function create() {
        return view('admin.users.add');
    }

    function store() {
        // them csdl

        // quay tro lai tranh d/s user
        return redirect()->route('users.index');
    }

    function edit($id) {
        dd($id);
    }
}
