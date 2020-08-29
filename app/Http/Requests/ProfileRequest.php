<?php

namespace App\Http\Requests;

use App\Rules\Latitude;
use App\Rules\Longitude;
use Illuminate\Support\Facades\Auth;
use SebastiaanLuca\Validator\Validators\Validator;

class ProfileRequest extends Validator
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->sanitize();

        return [
            'available'         => '',

            'name'              => 'required',
            'address'           => '',
            'zipcode'           => '',
            'city'              => '',
            'country'           => '',

            'coordinates_lat'   => ['nullable', new Latitude()],
            'coordinates_lng'   => ['nullable', new Longitude()],

            'website'           => 'nullable|url',
            'emailaddress'      => 'nullable|email',
            'telephone'         => '',
            'mobile'            => '',
            'whatsapp'          => '',

            'company_number'    => '',
            'vat_number'        => '',

            'facebook'          => 'nullable|url',
            'linkedin'          => 'nullable|url',
            'twitter'           => 'nullable|url',
            'googleplus'        => 'nullable|url',

            'intro'             => '',
            'about'             => '',
            'hourly_rate'       => 'nullable|regex:/^\d*(\,\d{1,2})?$/',
            'logo'              => '',
            'founded_at'        => 'nullable|date_format:Y',

        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        foreach ($input as $field => $value) {
            $input[$field] = strip_tags($value);
        }

        $this->replace($input);
    }
}
