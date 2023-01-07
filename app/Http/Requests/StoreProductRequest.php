<?php

namespace App\Http\Requests;

use App\Helpers\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class StoreProductRequest extends FormRequest
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
            'product_code' => 'required|unique:product',
            'product_name' => 'required',
            'price' => 'required|alpha_num',
            'image' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'product_code.*' => 'Mã sản phẩm không hợp lệ',
            'product_name.*' => 'Vui lòng nhập tên sản phẩm',
            'price.*' => 'Giá sản phẩm không hợp lệ',
            'image.*' => 'Ảnh sản phẩm không hợp lệ',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Session::flash('message', Message::error('Thêm sản phẩm không thành công'));
        throw (new ValidationValidationException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
    }
}
