<?php

namespace App\Http\Requests;

use App\Models\child;
use Illuminate\Foundation\Http\FormRequest;

class AdoptionRequest extends FormRequest
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
        $selectedChild=child::find($this->C_id);
        $arrivalDate=$selectedChild->arrivalDate;
        return [
            //

            'adoptionDate'=>'required|date|after:' . $arrivalDate,
            'C_id'=>'required',
            'P_id'=>'required'
        ];
    }
}
