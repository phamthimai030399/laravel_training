<?php

namespace App\Http\Controllers;

use App\Helpers\Message;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyChangePasswordRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function postRegister(RegisterRequest $request)
    {
        $data = $request->only('username', 'email', 'phone', 'password');
        $result = $this->userService->register($data);
        if ($result) {
            return redirect('admin/login')->with('message', Message::success('Đăng ký tài khoản thành công. Vui lòng xác thực email trước khi đăng nhập.'));
        } else {
            return back()->withInput()->with('message', Message::error('Đăng ký tài khoản không thành công'));
        }
    }
    public function getLogin()
    {
        return view('cms.layout.login');
    }
    public function postLogin(LoginRequest $request)
    {
        $data = $request->only('username', 'password');
        $result = $this->userService->checkLogin($data);
        if ($result['type'] && $result['active']) {
            return redirect(route('user.index'))->with('message', Message::success('Đăng nhập thành công'));
        } elseif ($result['type'] && empty($result['active'])) {
            return back()->withInput()->with('message', Message::error('Tài khoản chưa xác thực. Vui lòng xác thực email trước khi đăng nhập.'));
        }
        return back()->withInput()->with('message', Message::error('Đăng nhập không thành công'));
    }
    public function logout()
    {
        $this->userService->logout();
        return redirect('admin/login');
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
    public function postVerifyChangePassword($token, VerifyChangePasswordRequest $request)
    {
        $result = $this->userService->postVerifyChangePassword($token, $request);
        if ($result['status']) {
            return redirect('admin/login')->with('message', Message::success('Thay đổi mật khẩu thành công'));
        } elseif(!empty($result['type']) && $result['type'] == 'expried') {
            return redirect(route('admin.forgot_password'))
            ->withErrors('Token đã hết hạn. Vui lòng thao tác lại');
        } else {
            return back()->withInput()->with('message', Message::error('Thay đổi mật khẩu không thành công'));
        }
    }
    public function confirmEmail()
    {
        return view('change_password');
    }
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $result = $this->userService->forgotPassword($request);
        if ($result) {
            return view('fotgot_password_success');
        } else {
            return back()->withErrors('Thao tác không thành công');
        }
    }
    public function changePassword()
    {
        $data['item'] = $this->userService->getUserById(Auth::user()->id);
        return view('user_change_password', $data);
    }
    public function postChangePassword(ChangePasswordRequest $request)
    {
        $result = $this->userService->postChangePassword($request->only('password'));
        if ($result) {
            return redirect(route('user.index'))->with('message', Message::success('Đổi mật khẩu thành công'));
        } else {
            return back()->withInput()->with('message', Message::error('Đổi mật khẩu không thành công'));
        }
    }
    
}
