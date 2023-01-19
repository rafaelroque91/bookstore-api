<?php
namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;


class UserService {

    public function register(array $userData) : array {
        try {
            $newUser = UserRepository::create($userData);
            if ($newUser){
                return ["success" => true, "data" => $newUser,"message" => "User registred Successfully"];     
            }     
            return ["success" => false, "message" => "Unable to register."];              
           
        } catch (Exception $e) {    
            return ["success" => false, "message" => "Error when trying to register." . $e->getMessage()];      
        }         
    }

    public function login(array $userData) : array {
        try {
            if(Auth::attempt($userData)){
                $user = UserRepository::getUserByEmail($userData["email"]);

                return ["success" => true, "message" => "User Logged In Successfully", "data" => ["token" => $user->createToken("API TOKEN")->plainTextToken]];                        
            }
            return ["success" => false, "message" => "Wrong email or password"];
        } catch (Exception $e) {    
            return ["success" => false, "message" => "Error when trying to Login." . $e->getMessage()];      
        }
    }

    public function logout(User $user) : array {
        try {
            if ($user->currentAccessToken()->delete()) {         
                return ["success" => true, "message" => "User Logged Off Successfully"]; 
            }          
            return ["success" => false, "message" => "Enable to Logout"];      
        } catch (Exception $e) {    
            return ["success" => false, "message" => "Error when trying to Logout." . $e->getMessage()];      
        }       
    }
    
}
