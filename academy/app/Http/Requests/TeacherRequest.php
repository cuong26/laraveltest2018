<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        $unique_rule = 'required|email|unique:teacher,email';
        if ($this->teacher) {
            $unique_rule .= ',' . $this->teacher->id;
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
