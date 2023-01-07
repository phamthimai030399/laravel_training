<?php

namespace App\Http\Requests;

use App\Helpers\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class ForgotPasswordRequest extends FormRequest
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
            'email' => 'required|email',
        ];
    }
    public function messages()
    {
        return [
            'email.*' => 'Địa chỉ email không hợp lệ',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Session::flash('message', Message::error('Thác tác không thành công'));
        throw (new ValidationValidationException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
    }

}
