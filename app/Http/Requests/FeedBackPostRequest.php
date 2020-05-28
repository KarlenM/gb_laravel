<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class FeedBackPostRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
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
            'firstname' => 'required|min:3|max:30',
            'message' => 'required|min:10',
            'ip' => 'required|ipv4'
        ];
    }
}
