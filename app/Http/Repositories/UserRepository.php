<?php


namespace App\Http\Repositories;


use App\Models\User;

class UserRepository extends Repository
{
    function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::all();
    }

    function findById($id)
    {
        return User::findOrFail($id);
    }

    function store($user) {
        $user->save();
    }

}
