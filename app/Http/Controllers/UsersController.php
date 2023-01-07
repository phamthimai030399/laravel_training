<?php

namespace App\Http\Controllers;

use App\Helpers\Message;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function list()
    {
        $data['users'] = $this->userService->getUser();
        return view('cms.user.index', $data);
    }
    public function create()
    {
        return view('cms.user.create');
    }
    public function postCreate(StoreUserRequest $request)
    {
        $data = $request->only('username', 'password', 'email', 'phone', 'is_active');
        $result = $this->userService->create($data);
        if ($result) {
            return redirect('admin/user')->with('message', Message::success('Thêm người dùng thành công'));
        } else {
            return back()->withInput()->with('message', Message::error('Thêm người dùng không thành công'));
        }
    }
    public function update($id)
    {
        $data['item'] = $this->userService->getUserById($id);
        return view('cms.user.update', $data);
    }
    public function postUpdate($id, UpdateUserRequest $request)
    {
        $data = $request->only('email', 'phone');
        $result = $this->userService->update($id, $data);
        if ($result) {
            return redirect('admin/user')->with('message', Message::success('Update người dùng thành công'));
        } else {
            return back()->withInput()->with('message', Message::error('Update người dùng không thành công'));
        }
    }
    public function delete($id, Request $request)
    {
        $result = $this->userService->delete($id);
        $message = $result ? Message::success('Xóa người dùng thành công') : Message::error('Xóa người dùng không thành công');
        return back()->with('message', $message);
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
