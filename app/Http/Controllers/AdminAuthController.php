<?php

namespace App\Http\Controllers;

use App\Helpers\Message;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyChangePasswordRequest;
use App\Services\AdminService;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    protected $adminService;
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    public function getRegister()
    {
        return view('cms.layout.register');
    }
    public function postRegister(RegisterRequest $request)
    {
        $data = $request->only('username', 'email', 'phone', 'password');
        $result = $this->adminService->register($data);
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
        $result = $this->adminService->checkLogin($data);
        if ($result['type'] && $result['active']) {
            return redirect(route('admin.user.index'))->with('message', Message::success('Đăng nhập thành công'));
        } elseif ($result['type'] && empty($result['active'])) {
            return back()->withInput()->with('message', Message::error('Tài khoản chưa xác thực. Vui lòng xác thực email trước khi đăng nhập.'));
        }
        return back()->withInput()->with('message', Message::error('Đăng nhập không thành công'));
    }
    public function logout()
    {
        $this->adminService->logout();
        return redirect('admin/login');
    }
    public function verifyRegister($token)
    {
        $token = $this->adminService->verifyToken($token);
        return view('verify_register', ['token' => $token]);
    }
    public function verifyChangePassword($token)
    {
        $token = $this->adminService->verifyToken($token);
        return view('verify_change_password', ['token' => $token]);
    }
    public function postVerifyChangePassword($token, VerifyChangePasswordRequest $request)
    {
        $result = $this->adminService->postVerifyChangePassword($token, $request);
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
        $result = $this->adminService->forgotPassword($request);
        if ($result) {
            return view('fotgot_password_success');
        } else {
            return back()->withErrors('Thao tác không thành công');
        }
    }
    public function changePassword()
    {
        $data['item'] = Auth::guard('admin')->user();
        return view('user_change_password', $data);
    }
    public function postChangePassword(ChangePasswordRequest $request)
    {
        $result = $this->adminService->postChangePassword($request->only('password'));
        if ($result) {
            return redirect(route('admin.user.index'))->with('message', Message::success('Đổi mật khẩu thành công'));
        } else {
            return back()->withInput()->with('message', Message::error('Đổi mật khẩu không thành công'));
        }
    }
    
}
