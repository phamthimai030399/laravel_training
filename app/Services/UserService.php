<?php

namespace App\Services;

use App\Jobs\SendEmail;
use App\Mail\MailNotify;
use App\Models\User;
use App\Repositories\Token\TokenRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class UserService
{
    protected $userRepository;
    protected $tokenRepository;
    public function __construct(
        UserRepositoryInterface $userRepository,
        TokenRepositoryInterface $tokenRepository
    ) {
        $this->userRepository = $userRepository;
        $this->tokenRepository = $tokenRepository;
    }

    public function checkLogin($request)
    {
        $messageSuccess = [
            'type'    => 'success',
            'content' => 'Đăng nhập tài khoản thành công.'
        ];
        $rules = [

            'username' => 'required',
            'password' => 'required',
        ];
        $messages = [
            'username.required' => 'Vui lòng nhập tên tài khoản',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        $input = $request->only('username', 'password');
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->first());
        }

        if (Auth::attempt($input)) {
            if (Auth::user()->is_active == User::USER_ACTIVE) {
                return redirect(route('admin.user'))->with('message', $messageSuccess);
            } else {
                $message = [
                    'content' => 'Tài khoản chưa xác thực. Vui lòng xác thực trước khi đăng nhập.'
                ];
            }
        } else {
            $message = [
                'content' => 'Đăng nhập không thành công.'
            ];
        }
        return back()->withInput()->with('message', $message);
    }

    public function register($request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|max:255', //unique:users Dữ liệu nhập phải là duy nhất trong bảng users
            'email' => 'required|unique:users|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
            'password' => 'required', //Dữ liệu bắt buộc phải được nhập, không được để trống.
            're_password' => 'required_with:password|same:password' //Dữ liệu nhập là bắt buộc và phải chứa ít nhất các giá trị password => sai rồi, phải là nó bắt buộc nếu tồn tại password
            //Dữ liệu nhập phải trùng khớp với password. //
        ], [
            'username.*' => 'Tên đăng nhập không hợp lệ',
            'email.*' => 'Địa chỉ email không hợp lệ',
            'phone.*' => 'Số điện thoại không hợp lệ',
            'password.*' => 'Vui lòng nhập mật khẩu đăng ký',
            're_password.*' => 'Mật khẩu không hợp lệ'
        ]);

        if ($validator->fails()) {
            $result = [
                'status' => false,
                'content' => $validator->errors()->first()
            ];
        } else {
            DB::beginTransaction();
            try {
                //code...
                $data = $request->only('username', 'email', 'phone','password');
                $data['password'] = Hash::make($data['password']);
                $user =  $this->userRepository->create($data);
                $dataToken = [
                    'value' => Str::random(10),
                    'user_id' => $user->id,
                    'type' => 'register'
                ];
                $token = $this->tokenRepository->create($dataToken);
                Mail::to($user->email)->send(new MailNotify([
                    'url' => route('admin.verify', $token->value),
                ]));
                if ($user && $token) {
                    $result = [
                        'status' => true,
                        'content' => 'Đăng kí tài khoản thành công. Vui lòng xác thực email trước khi đăng nhập.'
                    ];
                } else {
                    $result = [
                        'status' => false,
                        'content' => 'Đăng kí tài khoản không thành công.'
                    ];
                }
                DB::commit();
                return $result;
            } catch (\Throwable $th) {
                DB::rollBack();
                $result = [
                    'status' => false,
                    'content' => $th->getMessage() 
                ];
            }
        }
        return $result;
    }

    public function getUser()
    {
        return $this->userRepository->getList();
    }

    public function getUserById($id)
    {

        return $this->userRepository->getById($id);
    }

    public function create($request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
            'password' => 'required',
            're_password' => 'required_with:password|same:password'
        ], [
            'username.*' => 'Tên đăng nhập không hợp lệ',
            'email.*' => 'Địa chỉ email không hợp lệ',
            'phone.*' => 'Số điện thoại không hợp lệ',
            'password.*' => 'Vui lòng nhập mật khẩu đăng ký',
            're_password.*' => 'Mật khẩu không hợp lệ'
        ]);
        if ($validator->fails()) {
            $message = [
                'type'    => 'error',
                'content' => 'Thêm tài khoản không thành công.'
            ];
            return back()->withInput()->withErrors($validator->errors()->first())->with('message', $message);
        } else {
            $data = $request->only('username', 'password', 'email', 'phone');
            $data['password'] = Hash::make($data['password']);
            $user =  $this->userRepository->create($data);
            $message = [
                'type'    => 'success',
                'content' => 'Thêm tài khoản thành công.'
            ];
            if ($user) {
                return redirect(route('admin.user'))->with('message', $message);
            } else {
                // Session::flash('message', 'Thêm tài khoản không thành công. Vui lòng kiểm tra lại thông tin nhập vào.');
            }
        }
        return back()->withInput();
    }

    public function update($id, $request)
    {
        $rules = [
            'email' => 'required|email|unique:users,email,'. $id,
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
        ];
        $messages = [
            'email.*' => 'Địa chỉ email không hợp lệ',
            'phone.*' => 'Số điện thoại không hợp lệ',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        $messageError = [
            'type'    => 'error',
            'content' => 'Update tài khoản không thành công.'
        ];
        $messageSuccess = [
            'type'    => 'success',
            'content' => 'Update tài khoản thành công.'
        ];
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->first())->with('message', $messageError);
        } else {
            $result = $this->userRepository->update($id, $request->only('email', 'phone'));
            if ($result) {
                return redirect(route('admin.user'))->with('message', $messageSuccess);
            } else {
                return back()->withInput()->with('message', $messageError);
            }
        }
    }

    public function delete($id)
    {
        $messageError = [
            'type'    => 'error',
            'content' => 'Xóa tài khoản không thành công.'
        ];
        $messageSuccess = [
            'type'    => 'success',
            'content' => 'Xóa tài khoản thành công.'
        ];
        $result = $this->userRepository->delete($id);
        if ($result) {
            return redirect(route('admin.user'))->with('message', $messageSuccess);
        } else {
            return back()->with('message', $messageError);
        }
    }

    public function logOut()
    {
        Auth::logout();
        $messageSuccess = [
            'type'    => 'success',
            'content' => 'Đăng xuất thành công.'
        ];
        return redirect()->route('admin.login')->with('message', $messageSuccess);
    }

    public function verifyToken($token)
    {
        $tokenObj = $this->tokenRepository->getOneByField('value', $token);
        if (!empty ($tokenObj)) {
            $timeToken = time() - strtotime($tokenObj->created_at);
            $tokenObj->is_expried = $timeToken > 60 * 10 ? true : false;
            $this->userRepository->update($tokenObj->user_id, ['is_active' => 1]);
        }
        return $tokenObj;
    }

    public function forgotPassword($request)
    {
        $rules = [
            'email' => 'required|email',
        ];
        $messages = [
            'email.*' => 'Địa chỉ email không hợp lệ',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $result = [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        } else {
            $user = $this->userRepository->getOneByField('email', $request->email);
            if ($user) {
                $dataToken = [
                    'value' => Str::random(10),
                    'user_id' => $user->id,
                    'type' => 'change_password'
                ];
                $token = $this->tokenRepository->create($dataToken);
                Mail::to($user->email)->send(new MailNotify([
                    'url' => route('admin.verify_change_password', $token->value),
                ]));
                $result = [
                    'status' => true,
                    'message' => 'Quên mật khẩu thành công',
                ];
            } else {
                $result = [
                    'status' => false,
                    'message' => 'Quên mật khẩu thất bại',
                ];
            }
        }
        return $result;
    }

    public function postVerifyChangePassword($token, $request)
    {
        $rules = [
            'password' => 'required',
            're_password' => 'required_with:password|same:password',
        ];
        $messages = [
            'password.*' => 'Vui lòng nhập mật khẩu',
            're_password.*' => 'Mật khẩu không khớp. Vui lòng kiểm tra lại.',
        ];
        $messageError = [
            'content' => 'Thay đổi mật khẩu không thành công. Vui lòng kiểm tra lại.'
        ];
        $messageSuccess = [
            'content' => 'Thay đổi mật khẩu thành công.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->errors()->first());
        }
        $data = $request->only('password');
        $tokenObj = $this->tokenRepository->getOneByField('value', $token);
        $timeToken = time() - strtotime($tokenObj->created_at);
        if ($timeToken > 10 * 60) {
            return redirect(route('admin.forgot_password'))->withErrors('Token đã hết hạn. Vui lòng thao tác lại');
        }
        $user = $this->userRepository->getById($tokenObj->user_id);
        $data['password'] = Hash::make($data['password']);
        $result = $this->userRepository->update($user['id'], ['password' => $data['password']]);
        if ($result) {
            return redirect(route('admin.login'))->with('message', $messageSuccess);
        } else {
            return back()->withInput()->with('message', $messageError);
        }
    }

    public function postChangePassword($request)
    {
        $rules = [
            'password' => 'required',
            're_password' => 'required_with:password|same:password',
        ];
        $messages = [
            'password.*' => 'Vui lòng nhập mật khẩu',
            're_password.*' => 'Mật khẩu không khớp. Vui lòng kiểm tra lại.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        $messageError = [
            'type'    => 'error',
            'content' => 'Thay đổi mật khẩu không thành công.'
        ];
        $messageSuccess = [
            'type'    => 'success',
            'content' => 'Thay đổi mật khẩu thành công.'
        ];
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->first())->with('message', $messageError);
        }
        $data = $request->only('password');
        $data['password'] = Hash::make($data['password']);
        $result = $this->userRepository->update(Auth::user()->id, ['password' => $data['password']]);
        if ($result) {
            return redirect(route('admin.user'))->with('message', $messageSuccess);
        } else {
            return back()->withInput()->with('message', $messageError);
        }
    }
}
