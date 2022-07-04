<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsurerRequest extends FormRequest
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
        if(in_array($this->method(),['PUT','PATCH']))
        {
            return [
                'company_name'=>'required|unique:insurers,company_name,'.$this->id,
                'phone'=>'required'
            ];
        }else{
            return [
                'company_name'=>'required|unique:insurers',
                'phone'=>'required'
            ];
        }
    }
}
