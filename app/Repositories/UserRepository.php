<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function create($value)
    {
        return User::create([
            'email'=> $value['email'],
            'password'=> Hash::make($value['password']),
        ]);
    }



}
