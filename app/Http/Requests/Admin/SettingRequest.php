<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'website_name'  => ['string', 'nullable'],
            'website_url'   => ['string', 'nullable'],
            'logo'          => ['image', 'mimes:png,jpg,jpeg','nullable'],
            'favicon'       => ['image', 'mimes:png,jpg,jpeg','nullable'],
            'page_title'    => ['string', 'nullable'],
            'phone'         => ['string', 'nullable'],
            'phone2'        => ['string', 'nullable'],
            'email'         => ['string', 'nullable'],
            'email2'        => ['string', 'nullable'],
            'address_en'    => ['string', 'nullable'],
            'address_ar'    => ['string', 'nullable'],
            'facebook'      => ['string', 'nullable'],
            'twitter'       => ['string', 'nullable'],
            'instagram'     => ['string', 'nullable'],
            'youtube'       => ['string', 'nullable'],
            'about_en'      => ['string', 'nullable'],
            'about_ar'      => ['string', 'nullable'],
        ];
    }
}
