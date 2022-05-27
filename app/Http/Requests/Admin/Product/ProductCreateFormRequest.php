<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'product_title' => 'required',
            'product_cat'   => 'required',
            'product_brand' => 'required',
            'product_desc'  => 'required',
            'product_price' => 'required|numeric',
            'product_qty'   => 'required|numeric',
            //'image' => 'required|image',
            'image' => 'image'
        ];
    }

    public function messages(){
        return [
            'product_title.required' => 'Bạn chưa nhập tên product',
            'product_cat.required' => 'Bạn chưa chọn danh mục',
            'product_brand.required' => 'Bạn chưa chọn thương hiệu',
            'product_desc.required' => 'Bạn chưa nhập mô tả',
            'product_price.required' => 'Bạn chưa nhập giá',
            'product_qty.required' => 'Bạn chưa nhập số lượng',
            // 'image.required' => 'Bạn chưa chọn ảnh',

            'product_price.numeric' => 'Gía phải là số',
            'product_qty.numeric' => 'Số lượng phải là số',
            'image.image' => 'Ảnh chưa đúng định dạng',
        ];
    }
}
