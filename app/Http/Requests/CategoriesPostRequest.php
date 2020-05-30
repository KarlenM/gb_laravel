<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoriesPostRequest extends FormRequest
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
            'name_cyr' => 'required|min:1|max:15|unique:categories',
            'name_lat' => 'required|min:1|max:15|unique:categories',
            'updated_user_id' => 'required|numeric',
            'created_user_id' => 'required|numeric',
            'ip' => 'required|ipv4'
        ];
    }
}
