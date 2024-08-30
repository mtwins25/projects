<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:2|max:100',
            'phone'=>['required','regex:/(^010|^011|^012|^015)[0-9]{8}$/'],
            'email'=>'required|email|unique:users',
            'password'=>'required|max:30|min:6'
        ];
    }
}
