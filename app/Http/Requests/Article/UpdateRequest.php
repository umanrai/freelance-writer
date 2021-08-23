<?php

namespace App\Http\Requests\Article;

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
            'title'   =>'required|min:3|max:20|unique:articles,title,' . $this->get('_id'),
            'body' =>'required|min:5|max:400',
            'status' => 'required|boolean',
        ];
    }
}
