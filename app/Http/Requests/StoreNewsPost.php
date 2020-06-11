<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreNewsPost extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            'updated_user_id' => \Auth::id(),
            'created_user_id' => \Auth::id(),
            'ip' => Request::ip()
        ]);
    }

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
            'author' => 'required|min:3|max:30',
            'category_id' => 'required|numeric',
            'resource_id' => 'required|numeric',
            'title' => 'required|min:3|max:191',
            'img' => 'required',
            'text' => 'required|min:10',
            'updated_user_id' => 'required|numeric',
            'created_user_id' => 'required|numeric',
            'ip' => 'required|ipv4',
        ];
    }
}