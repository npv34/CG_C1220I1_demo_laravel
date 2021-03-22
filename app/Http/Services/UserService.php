<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserService
{
    protected UserRepository $userRepo;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->userRepo->getAll();
    }

    function getById($id) {
        return $this->userRepo->findById($id);
    }

    function store($request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $this->userRepo->store($user);
    }
}
