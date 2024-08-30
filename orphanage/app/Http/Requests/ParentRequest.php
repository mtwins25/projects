<?php

namespace App\Http\Requests;

use App\Models\oparent;
use Illuminate\Foundation\Http\FormRequest;

class ParentRequest extends FormRequest
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
       $parent=oparent::findOrFail($this->P_id);

        if($parent->account->email==$this->email)
        {
            if($parent->phoneNumber==$this->phoneNumber)
        {
            return [

                'P_name'=>'required|min:3|max:20|alpha',
                'phoneNumber'=>['required','regex:/^(010|011|012|015)\d{8}$/','size:11'],
                'email'=>'email|required|'

            ];
        }
        else
        {
            return [

                'P_name'=>'required|min:3|max:20|alpha',
                'phoneNumber'=>['required','regex:/^(010|011|012|015)\d{8}$/','size:11','unique:parents,phoneNumber'],
                'email'=>'email|required'

            ];

        }
    }
    elseif($parent->phoneNumber==$this->phoneNumber)
    {
        return [

            'P_name'=>'required|min:3|max:20|alpha',
            'phoneNumber'=>['required','regex:/^(010|011|012|015)\d{8}$/','size:11'],
            'email'=>'email|required|unique:users,email'

        ];

    }
    else
    {
        return [

            'P_name'=>'required|min:3|max:20|alpha',
            'phoneNumber'=>['required','regex:/^(010|011|012|015)\d{8}$/','size:11','unique:parents,phoneNumber'],
            'email'=>'email|required|unique:users,email'

        ];
    }
}
}
