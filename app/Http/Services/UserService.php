<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;

class UserService
{
    protected UserRepository $userRepo;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    function getAll() {
        return $this->userRepo->getAll();
    }
}
