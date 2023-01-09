<?php

namespace App\Http\Controllers;

use App\Helpers\Message;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = $this->userService->getUser();
        $data['condition'] = [];
        return view('cms.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->only('username', 'password', 'email', 'phone', 'is_active');
        $result = $this->userService->create($data);
        if ($result) {
            return redirect('admin/user')->with('message', Message::success('Thêm người dùng thành công'));
        } else {
            return back()->withInput()->with('message', Message::error('Thêm người dùng không thành công'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['item'] = $this->userService->getUserById($id);
        return view('cms.user.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->only('email', 'phone');
        $result = $this->userService->update($id, $data);
        if ($result) {
            return redirect('admin/user')->with('message', Message::success('Update người dùng thành công'));
        } else {
            return back()->withInput()->with('message', Message::error('Update người dùng không thành công'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->userService->delete($id);
        $message = $result ? Message::success('Xóa người dùng thành công') : Message::error('Xóa người dùng không thành công');
        return back()->with('message', $message);
    }
}
