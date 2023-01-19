<?php
namespace App\Http\Repositories;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserRepository {

    public static function create(array $userData) : User {

        $userData['password'] = Hash::make($userData['password']);
        return User::create($userData);        
    }

    public static function getUserByEmail(String $email) : User {

        return User::where("email", $email)->first(); 
    }
}
