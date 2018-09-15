<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        $unique_rule   = 'required|email|unique:students,email';
        if ($this->student) {
            $unique_rule .= ',' . $this->student->id;
        }
        return [
            'name'     => 'required',
            'address'  => 'required',
            'email'    => $unique_rule,
        ];
    }
    public function messages()
    {
        return [
            'email'    => 'Email chưa đúng định dạng'
        ];
    }
}
