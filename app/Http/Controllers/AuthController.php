<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function getRegister()
    {
        return view('cms.layout.register');
    }
    public function postRegister(Request $request)
    {
        return $this->userService->register($request);
    }
    public function getLogin()
    {
        return view('cms.layout.login');
    }
    public function postLogin(Request $request)
    {
        return $this->userService->checkLogin($request);
    }
    public function logout()
    {
        return $this->userService->logout();
    }
    public function verifyRegister($token)
    {
        $token = $this->userService->getToken($token);
        if (!empty($token)) {
            
        }
        //kiem tra neu token khong empty thì update cho user is_Active = 1;
        return view('verify_register', ['token' => $token]);
    }
}
