<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
             'first_name'   => 'required|min:3|max:25',
             'middle_name'   => 'sometimes|nullable|min:3|max:25',
             'last_name'   => 'required|min:3|max:25',
             'email'        => 'required|email|unique:users,email,' . $this->get('_id'),
             'phone' => 'required|unique:users,phone,' . $this->get('_id'),
             'password' => 'sometimes|nullable|min:6|max:25|confirmed',
        ];
    }
}
