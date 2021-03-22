<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = $this->userService->getAll();
        return view('admin.users.list', compact('users'));
    }

    function create() {
        $groups = Group::all();
        $roles = Role::all();
        return view('admin.users.add', compact('groups', 'roles'));
    }

    function store(Request $request) {
        // them csdl
        $this->userService->store($request);
        // quay tro lai tranh d/s user
        return redirect()->route('users.index');
    }

    function edit($id) {
        $groups = Group::all();
        $user = $this->userService->getById($id);
        return view('admin.users.edit', compact('groups','user'));
    }

    function delete($id) {
        $user = $this->userService->getById($id);
        $user->delete();
        return redirect()->route('users.index');

    }
}
