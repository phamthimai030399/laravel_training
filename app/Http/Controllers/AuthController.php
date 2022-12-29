<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $result = $this->userService->register($request);
        if ($result['status']) {
            return redirect('admin/login')->with('message', $result);
        } else {
            return back()->withInput()->withErrors($result['content']);
        }
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
        $token = $this->userService->verifyToken($token);
        return view('verify_register', ['token' => $token]);
    }
    public function verifyChangePassword($token)
    {
        $token = $this->userService->verifyToken($token);
        return view('verify_change_password', ['token' => $token]);
    }
    public function postVerifyChangePassword($token, Request $request)
    {
        return $this->userService->postVerifyChangePassword($token, $request);
    }
    public function confirmEmail()
    {
        return view('change_password');
    }
    public function forgotPassword(Request $request)
    {
        $result = $this->userService->forgotPassword($request);
        if ($result['status']) {
            return view('fotgot_password_success', $result);
        } else {
            return back()->withErrors($result['message']);
        }
    }
    
}
