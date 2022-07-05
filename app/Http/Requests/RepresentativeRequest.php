<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepresentativeRequest extends FormRequest
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
        if (in_array($this->method(), ['PUT', 'PATCH'])) 
        {
            return [
                'name'      =>'required',
                'title'     =>'required',
                'phone'     =>'required|unique:representatives,phone,'.$this->id,
                'cell'      =>'required',
                'email'     =>'required|unique:representatives,email,'.$this->id,
                'status'    =>'required',
                'notes'     =>'required',
                'insurer_id'=>'required'
            ];
        }
        else
        {
            return [
                'name'      =>'required',
                'title'     =>'required',
                'phone'     =>'required|unique:representatives',
                'cell'      =>'required',
                'email'     =>'required|unique:representatives',
                'status'    =>'required',
                'notes'     =>'required',
                'insurer_id'=>'required'
            ];
        }
    }
}
