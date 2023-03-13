<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'title_en'          => ['string', 'required'],
            'title_ar'          => ['string', 'required'],
            'category_id'       => ['integer', 'nullable'],
            'brand'             => ['string', 'nullable'],
            'original_price'    => ['integer', 'required'],
            'selling_price'     => ['integer', 'required'],
            'quantity'          => ['integer', 'nullable'],
            'small_desc_en'     => ['string', 'required'],
            'long_desc_en'      => ['string', 'nullable'],
            'small_desc_ar'     => ['string', 'required'],
            'long_desc_ar'      => ['string', 'nullable'],
            'meta_title'        => ['string', 'nullable'],
        ];
    }
}
