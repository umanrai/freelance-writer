<?php

namespace App\Http\Requests\Article;


use Illuminate\Support\Str;

class UpdateRequest extends StoreRequest
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
        //
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        if (auth()->user()->isAdmin()) {
            return [
                'writer_id' => 'required',
            ];
        }

        if (auth()->user()->isWriter()) {
            return [
                'description' => 'required|max:9000',
                'is_completed_by_writer' => 'boolean',
            ];
        }

        return array_merge(
            parent::rules(), [
                'title'   =>'required|min:3|max:100|unique:articles,title,' . $this->get('_id'),
            ]
        );
    }
}
