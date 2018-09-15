<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
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
        $unique_rule = 'required|email|unique:newsletter,email';
        if ($this->newsletter) {
            $unique_rule .= ',' . $this->newsletter->id;
        }
        return [
            'email' => $unique_rule,
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Email không đúng định dạng',
        ];
    }
}
