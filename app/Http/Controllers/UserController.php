<?php

namespace App\Http\Controllers;

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
    public function postCreate(Request $request)
    {
        return $this->userService->create($request);
    }
    public function update($id)
    {
        $data['item'] = $this->userService->getUserById($id);
        return view('cms.user.update', $data);
    }
    public function postUpdate($id, Request $request)
    {
        return $this->userService->update($id, $request);
    }
    public function delete($id, Request $request)
    {
        return $this->userService->delete($id);
    }
    public function changePassword()
    {
        $data['item'] = $this->userService->getUserById(Auth::user()->id);
        return view('user_change_password', $data);
    }
    public function postChangePassword(Request $request)
    {
        return $this->userService->postChangePassword($request);
    }
}
