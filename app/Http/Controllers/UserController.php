<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Services\UserService;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    function store(CreateUserRequest $request) {
        // them csdl
       // dd($request);
        $this->userService->store($request);
        toastr()->success('Have fun storming the castle!', 'Miracle Max Says');

        // quay tro lai tranh d/s user
        return redirect()->route('users.index');
    }

    function edit($id) {
        $groups = Group::all();
        $user = $this->userService->getById($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('groups',
                                'user', 'roles'));
    }

    function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = $this->userService->getById($id);
        $this->userService->update($user, $request);
        return redirect()->route('users.index');
    }

    function delete($id): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            $user = $this->userService->getById($id);
            Storage::disk('public')->delete($user->image);
            $user->roles()->detach();
            $user->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error('chung nang bi loi. Lien he vs admin!', 'Loi he thong');
        }
        return redirect()->route('users.index');
    }
}
