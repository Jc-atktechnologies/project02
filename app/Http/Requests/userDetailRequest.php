<?php

namespace App\Http\Requests;

use App\Models\Attatchment;
use App\Models\ManagementNote;
use App\Models\PayoutSetting;
use App\Models\User;
use App\Models\UserDetail;
use App\Rules\isValidPassword;
use Illuminate\Foundation\Http\FormRequest;

class userDetailRequest extends FormRequest
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
        if ($this->request->has('account_preference')){
          $rules = UserDetail::account_preference_rules;
          $rules['password'] = ['required','string',new isValidPassword()];
          return $rules;
        } elseif ($this->request->has('user_permission')){
            return User::user_permission_rules;
        } elseif ($this->request->has('payout_setting')){
            return PayoutSetting::user_permission_rules;
        } elseif ($this->request->has('team_membership')){
            return User::team_membership_rule;
        } elseif ($this->request->has('skills')){
            return User::skill_rule;
        } elseif ($this->request->has('attachments')){
            return Attatchment::user_attachment_rules;
        } elseif ($this->request->has('management_notes')){
            return ManagementNote::user_management_note_rules;
        } else{
            return User::user_rules;
        }
    }
}
