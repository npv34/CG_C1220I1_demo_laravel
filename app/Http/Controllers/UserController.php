<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    function index() {
        $users = $this->userService->getAll();
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
