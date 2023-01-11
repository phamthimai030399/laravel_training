<?php

namespace App\Services;

use App\Mail\MailNotify;
use App\Repositories\Token\TokenRepositoryInterface;
use App\Repositories\Admin\AdminRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AdminService
{
    protected $adminRepository;
    protected $tokenRepository;
    public function __construct(
        AdminRepositoryInterface $adminRepository,
        TokenRepositoryInterface $tokenRepository
    ) {
        $this->adminRepository = $adminRepository;
        $this->tokenRepository = $tokenRepository;
    }

    public function checkLogin($data)
    {
        if (Auth::guard('admin')->attempt($data)) {
            if (Auth::guard('admin')->user()->is_active) {
                $result = [
                    'type' => true,
                    'active'=> true,
                ];
            } else {
                $result = [
                    'type' => true,
                    'active'=> false,
                ];
            }
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
            $user =  $this->adminRepository->create($data);
            $dataToken = [
                'value' => Str::random(10),
                'user_id' => $user->id,
                'type' => 'register'
            ];
            $token = $this->tokenRepository->create($dataToken);
            Mail::to($user->email)->send(new MailNotify([
                'url' => route('admin.verify', $token->value),
            ]));
            $result = true;
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $result = false;
        }
        return $result;
    }

    public function logOut()
    {
        Auth::guard('admin')->logout();
    }

    public function verifyToken($token)
    {
        $tokenObj = $this->tokenRepository->getOneByField('value', $token);
        if (!empty($tokenObj)) {
            $timeToken = time() - Carbon::parse($tokenObj->created_at)->unix();
            $tokenObj->is_expried = $timeToken > 60 * 10;
            $this->adminRepository->update($tokenObj->user_id, ['is_active' => 1]);
        }
        return $tokenObj;
    }

    public function forgotPassword($request)
    {

        $user = $this->adminRepository->getOneByField('email', $request['email']);
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
        $user = $this->adminRepository->getById($tokenObj->user_id);
        $data['password'] = Hash::make($data['password']);
        $result = $this->adminRepository->update($user['id'], ['password' => $data['password']]);
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
        return $this->adminRepository->update(Auth::guard('admin')->user()->id, ['password' => $data['password']]);
    }
}
