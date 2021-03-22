<?php


namespace App\Http\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    function store($user, $roles)
    {
        DB::beginTransaction();
        try {
            $user->save();
            $user->roles()->sync($roles);
            DB::commit();
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }

    }

}
