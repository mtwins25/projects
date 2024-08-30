<?php

namespace App\Http\Requests;

use App\Models\supervisor;
use Illuminate\Foundation\Http\FormRequest;

class SupervisorRequest extends FormRequest
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
        $supervisor=supervisor::find($this->S_id);
        if($supervisor)
        {
        if($supervisor->phoneNumber==$this->phoneNumber)
        {
            return [

                'S_name'=>'required|min:2|max:20|alpha',
                'phoneNumber'=>['required','regex:/^(010|011|012|015)\d{8}$/','size:11'],
            ];
        }
        else{
        return [

            'S_name'=>'required|min:2|max:20|alpha',
            'phoneNumber'=>['required','regex:/^(010|011|012|015)\d{8}$/','size:11','unique:supervisors,phoneNumber'],
        ];
    }

    }
    else
    {
        return [

            'S_name'=>'required|min:2|max:20|alpha',
            'phoneNumber'=>['required','regex:/^(010|011|012|015)\d{8}$/','size:11','unique:supervisors,phoneNumber'],
        ];
    }
    }


}
