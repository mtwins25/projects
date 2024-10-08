<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChildrenUpdateRequest extends FormRequest
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
            'C_name'=>'required|min:3|max:20|alpha',
            'arrivalDate'=>'required|date|after:birthDate',
            'image'=>'image',
            'S_id'=>'required'
        ];
    }
}
