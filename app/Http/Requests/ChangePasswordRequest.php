<?php

namespace App\Http\Requests;

use App\Helpers\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required',
            're_password' => 'required_with:password|same:password',
        ];
    }
    public function messages()
    {
        return [
            'password.*' => 'Vui lòng nhập mật khẩu',
            're_password.*' => 'Mật khẩu không khớp. Vui lòng kiểm tra lại.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Session::flash('message', Message::error('Thay đổi mật khẩu thất bại'));
        throw (new ValidationValidationException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
    }

}
