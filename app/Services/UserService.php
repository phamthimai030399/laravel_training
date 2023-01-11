<?php

namespace App\Services;

use App\Mail\MailNotify;
use App\Models\User;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Repositories\Token\TokenRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class UserService
{
    protected $userRepository;
    protected $tokenRepository;
    protected $cartRepository;
    public function __construct(
        UserRepositoryInterface $userRepository,
        TokenRepositoryInterface $tokenRepository,
        CartRepositoryInterface $cartRepository 
    ) {
        $this->userRepository = $userRepository;
        $this->tokenRepository = $tokenRepository;
        $this->cartRepository = $cartRepository;
    }

    public function checkLogin($data)
    {
        if (Auth::attempt($data)) {
                $result = [
                    'type' => true,
                    'active'=> true,
                ];
        } else {
            $result = [
                'type' => false,
                'active'=> false,
            ];
        }
        return $result;
    }

    public function register($data)
    {
        DB::beginTransaction();
        try {
            $data['password'] = Hash::make($data['password']);
            $user =  $this->userRepository->create($data);
            $dataToken = [
                'value' => Str::random(10),
                'user_id' => $user->id,
                'type' => 'register'
            ];
            // $token = $this->tokenRepository->create($dataToken);
            // Mail::to($user->email)->send(new MailNotify([
            //     'url' => route('admin.verify', $token->value),
            // ]));
            $result = true;
            DB::commit();
            return $result;
        } catch (\Throwable $th) {
            DB::rollBack();
            $result = false;
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

    public function create($data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['is_active'] = ASSERT_ACTIVE;
        return  $this->userRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }

    public function logOut()
    {
        $this->cartRepository->emptyCart();
        Auth::logout();
    }

    public function verifyToken($token)
    {
        $tokenObj = $this->tokenRepository->getOneByField('value', $token);
        if (!empty($tokenObj)) {
            $timeToken = time() - Carbon::parse($tokenObj->created_at)->unix();
            $tokenObj->is_expried = $timeToken > 60 * 10;
            $this->userRepository->update($tokenObj->user_id, ['is_active' => 1]);
        }
        return $tokenObj;
    }

    public function forgotPassword($request)
    {

        $user = $this->userRepository->getOneByField('email', $request['email']);
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
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function postVerifyChangePassword($token, $data)
    {
        $tokenObj = $this->tokenRepository->getOneByField('value', $token);
        $timeToken = time() - strtotime($tokenObj->created_at);
        if ($timeToken > 10 * 60) {
                return [
                    'status' => false,
                    'type' => 'expried' 
                ];
        }
        $user = $this->userRepository->getById($tokenObj->user_id);
        $data['password'] = Hash::make($data['password']);
        $result = $this->userRepository->update($user['id'], ['password' => $data['password']]);
        if ($result) {
            return [
                'status' => true
            ];
        } else {
            return [
                'status' => false
            ];
        }
    }

    public function postChangePassword($data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->update(Auth::user()->id, ['password' => $data['password']]);
    }
}
