<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $unique_rule = 'required|email|unique:users,email';
        if($this->user){
            $unique_rule .= ',' . $this->user->id;
        }
        return [
            'name'     => 'required',
            'email'    => $unique_rule,
            'password' => 'required',
            'image'    => 'image'
        ];
    }
    public function messages()
    {
        return [
            'email.email' => 'Email không đúng định dạng'
        ];
    }
}
