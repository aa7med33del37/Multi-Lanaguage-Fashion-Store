<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'name_en' => ['string', 'required'],
            'name_ar' => ['string', 'required'],
            'image' => ['image', 'mimes:png,jpg,jpeg'],
            'parent_id' => ['nullable', 'integer'],
            'meta_title' => ['string', 'nullable'],
        ];
    }
}
