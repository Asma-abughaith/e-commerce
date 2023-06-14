<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_ar' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags_en' => 'required',
            'product_tags_ar' => 'required',
            'product_size_en' =>'required',
            'product_size_ar' => 'required',
            'product_color_en' => 'required',
            'product_color_ar' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
            'short_descp_en' => 'required',
            'short_descp_ar' =>'required',
            'long_descp_en' => 'required',
            'long_descp_ar' => 'required',
            'product_thambnail' => 'required',
            'multi_img'=>'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $notification = [
            'message' => $validator->errors()->first(),
            'alert-type' => 'error'
        ];

        throw new HttpResponseException(
            redirect()->back()->withInput()->withErrors($validator)->with($notification)
        );
    }
}