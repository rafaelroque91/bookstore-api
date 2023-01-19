<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\LogoutUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Services\UserService;
use Illuminate\Http\JsonResponse;

class AuthController extends BaseController
{
    public $userService;

    protected $redirectTo = false;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function login(LoginUserRequest $request) : JsonResponse 
    {
        $validatedRequest = $request->validated();

        $loginData = $this->userService->login($validatedRequest);

        return $this->responseData($loginData);         
    } 

    public function logout(LogoutUserRequest $request) : JsonResponse 
    {       
        $logoutData = $this->userService->logout($request->user());
    
        return $this->responseData($logoutData);                
    } 
    
    public function register(RegisterUserRequest $request) : JsonResponse
    {     
        $validatedRequest = $request->validated();
                           
        $registerData = $this->userService->register($validatedRequest);

        return $this->responseData($registerData);         
    }
}
