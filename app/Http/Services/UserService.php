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
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
      //  $user->group_id = $request->group_id;
        $roles = $request->role_id;
        $this->userRepo->store($user, $roles);
    }
}
