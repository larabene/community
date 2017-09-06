<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (bool) $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->user()->id;

        return [
            'name'     => 'required|string|max:191',
            'email'    => 'required|string|email|max:191|unique:users,email,'.$id,
            'password' => 'min:8|confirmed|nullable',
        ];
    }
}
