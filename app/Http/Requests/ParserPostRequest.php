<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class ParserPostRequest extends FormRequest
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
            'rss' => 'required|url'
        ];
    }
}
