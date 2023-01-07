<?php

namespace App\Http\Requests;

use App\Helpers\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class StoreCategoryRequest extends FormRequest
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
            'category_code' => 'required|unique:category',
            'category_name' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'category_code.required' => 'Vui lòng nhập mã danh mục',
            'category_name.required' => 'Vui lòng nhập tên danh mục',
            'category_code.unique' => 'Mã danh mục đã tồn tại',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Session::flash('message', Message::error('Thêm danh mục thất bại'));
        throw (new ValidationValidationException($validator))
                    ->errorBag($this->errorBag)
                    ->redirectTo($this->getRedirectUrl());
    }

}
