<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaimsRequest extends FormRequest
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

        }else{

            return [
                'insurer_id'        =>  'required',
                // 'representative_id' =>  'required',
                // 'insured'           =>  'required',
                // 'state'             =>  'required',
                // 'address'           =>  'required',
                // 'country'           =>  'required',
                // 'city'              =>  'required',
                // 'zip_code'          =>  'required',
                // 'email'             =>  'required',
                // 'phone'             =>  'required',
                // 'cell'              =>  'required',
                // 'date_of_loss'      =>  'required',
                // 'time_of_loss'      =>  'required',
                // 'loss_type'         =>  'required',
                // 'reported_date'     =>  'required',
                // 'loss_location'     =>  'required',
                // 'loss_description'  =>  'required',
                // 'loss_country'      =>  'required',
                // 'claim_category'    =>  'required',
                'assignment_method' =>  'required'
            ];
        }
    }
}
