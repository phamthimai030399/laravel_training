<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

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
    public function getCreate()
    {
        return view('cms.user.create');
    }
    public function postCreate(Request $request)
    {
        return $this->userService->create($request);
    }
    public function getUpdate($id)
    {
        $data['item'] = $this->userService->getUserById($id);
        return view('cms.user.update', $data);
    }
    public function postUpdate($id, Request $request)
    {
        return $this->userService->update($id, $request);
    }
    public function getDelete($id, Request $request)
    {
        return $this->userService->delete($id);
    }
}
