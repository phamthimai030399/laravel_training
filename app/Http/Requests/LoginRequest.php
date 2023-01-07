<?php

namespace App\Http\Requests;

use App\Helpers\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Vui lòng nhập tên tài khoản',
                'password.required' => 'Vui lòng nhập mật khẩu',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        Session::flash('message', Message::error('Đăng nhập không thành công'));
        throw (new ValidationValidationException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
    }
}
