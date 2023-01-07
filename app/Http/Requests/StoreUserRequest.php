<?php

namespace App\Http\Requests;

use App\Helpers\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class StoreUserRequest extends FormRequest
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
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:11',
            'password' => 'required',
            're_password' => 'required_with:password|same:password'
        ];
    }
    public function messages()
    {
        return [
            'username.*' => 'Tên đăng nhập không hợp lệ',
            'email.*' => 'Địa chỉ email không hợp lệ',
            'phone.*' => 'Số điện thoại không hợp lệ',
            'password.*' => 'Vui lòng nhập mật khẩu đăng ký',
            're_password.*' => 'Mật khẩu không hợp lệ'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        Session::flash('message', Message::error('Thêm người dùng không thành công'));
        throw (new ValidationValidationException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
    }
}
