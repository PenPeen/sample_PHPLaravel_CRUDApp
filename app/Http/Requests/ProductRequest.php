<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * True  認証許可
     * False 認証NG（403）
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
            //
            'name' => 'required|min:3|unique:products.name',
            'type_id' => 'required|gt:0',
            'price' => 'numeric|gt:0'
        ];
    }
}
