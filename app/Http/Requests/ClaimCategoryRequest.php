<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaimCategoryRequest extends FormRequest
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
        if(in_array($this->method(),['PUT','Patch'])){

            return [
                'title'=>'required|unique:claim_categories,title,'.$this->id
            ];
        }
        return \App\Models\ClaimCategory::CREATE_VALIDATION_RULES;
    }
}
