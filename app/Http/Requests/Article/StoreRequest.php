<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->get('title')),
            'client_id' => auth()->id(),
            'is_completed_by_writer' => 0,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' =>  'required|min:3|max:100|unique:articles,title',
            'body' =>  'required|min:5|max:700',
            'status' => 'required|boolean',
            'wages' => 'required|integer',
            'category_id' => 'required',
            'tag_id' => 'required',
        ];
    }
}
