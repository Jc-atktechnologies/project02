<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Claims extends FormRequest
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
            //
            'date_time_loss' => 'date_format:d/m/Y H:i:s',
            'date_time_reported' => 'date_format:d/m/Y H:i:s',
            'gross_loss_value' => 'regex:/^(\d+(\.\d*)?)|(\.\d+)$/',
            'actual_cash_value' => 'regex:/^(\d+(\.\d*)?)|(\.\d+)$/',
            'replacement_cost' => 'regex:/^(\d+(\.\d*)?)|(\.\d+)$/', 
        ];
    }
}
