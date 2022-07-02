<?php

namespace App\Http\Requests;

use App\Models\Attatchment;
use App\Models\ManagementNote;
use App\Models\PayoutSetting;
use App\Models\User;
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
            \App\Models\UserDetail::account_preference_rules;
        } elseif ($this->request->has('user_permission')){
            User::user_permission_rules;
        } elseif ($this->request->has('payout_setting')){
            PayoutSetting::user_permission_rules;
        } elseif ($this->request->has('team_membership')){
            User::team_membership_rule;
        } elseif ($this->request->has('skills')){
            User::skill_rule;
        } elseif ($this->request->has('attachments')){
            Attatchment::user_attachment_rules;
        } elseif ($this->request->has('management_notes')){
            ManagementNote::user_management_note_rules;
        } else{
            User::user_rules;
        }
    }
}
