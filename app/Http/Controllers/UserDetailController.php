<?php

namespace App\Http\Controllers;

use App\Http\Requests\userDetailRequest;
use App\Models\Attatchment;
use App\Models\Branch;
use App\Models\ManagementNote;
use App\Models\PayoutSetting;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users_list = User::orderBy('id','DESC')->get();
        return view('user.index',compact('users_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $url = Route::current()->uri;
        $type = '';
        switch ($url){
            case "account-preference":
                $heading = 'Account Preference';
                $tab     = 'account_preference';
                $type    = '<input type="hidden" name="_method" value="PUT"> <input type="hidden" name="create_preference" value="1">';
                $route   = \route('save-account-preference');
                break;
            case 'user-permission':
                $heading = 'User Permission';
                $tab     = 'user_permission';
                $type    = '<input type="hidden" name="_method" value="PUT">';
                $route   = \route('save-user-permissions');
                break;
            case 'payout-setting':
                $heading = 'Payout Setting';
                $tab     = 'payout_setting';
                $route   = \route('save-payout');
                break;
            case 'team-membership':
                $heading = 'Team Membership';
                $tab     = 'team_membership';
                $route   = \route('team-membership');
                break;
            case 'skill':
                $heading = 'Skill';
                $tab     = 'skill';
                $route   = \route('skill');
                break;
            case 'attachments':
                $heading = 'Attachments';
                $tab     = 'attachments';
                $route   = \route('save-attachment');
                break;
            case 'management-notes':
                $heading = 'Management Notes';
                $tab     = 'management_notes';
                $route   = \route('save-management-notes');
                break;
            default:
                $heading = 'General Details';
                $tab     = 'general_details';
                $route   = \route('save-user-information');
                break;
        }
        $user_id = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        $branches = Branch::where('status','=',1)->get();
        return view('user.form',compact('heading','tab','branches','user_id','type','route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userDetailRequest $request)
    {
        //
        try {
            DB::beginTransaction();
            $user_data = [
                'email'         => $request->email,
                'name'          => $request->first_name,
                'password'      => Hash::make(time()),
                'created_at'    => date('Y-m-d H:i:s')
            ];
            $user_id = User::insertGetId($user_data);
            if ($user_id){
                $user_detail = [
                    'user_id'       => $user_id,
                    'first_name'    => $request->first_name,
                    'last_name'     => $request->last_name,
                    'title'         => $request->title,
                    'phone_number'  => $request->phone_number,
                    'mobile_number' => $request->mobile_number,
                    'branch_id'     => $request->branch_id,
                    'dob'           => $request->dob,
                    'ssn'           => $request->ssn,
                    'emergency_contact' => $request->emergency_contact,
                    'external_link' => $request->external_link,
                    'license_expiry'    => $request->license_expiry,
                    'preferred_for' => json_encode($request->preferred_for),
                    'rating'        => $request->rating,
                    'languages'     => $request->language_spoken,
                    'comments'      => $request->comments,
                    'address'       => $request->get('address',null),
                    'city'          => $request->get('city',null),
                    'state'         => $request->get('state',null),
                    'country'       => $request->get('country',null),
                    'zip_code'      => $request->get('zip_code',null)
                ];
                $save_user_details = UserDetail::insert($user_detail);
                if ($save_user_details){
                    DB::commit();
                    $message = str_replace(':module','User',trans('general_messages.create_success_message'));
                    flash($message)->success();
                    session()->put('user_id',$user_id);
                    return redirect(route('account-preference'));
                } else{
                    DB::rollBack();
                    flash(trans('general_messages.general_error'));
                    return redirect()->back();
                }
            } else{
                DB::rollBack();
                flash(trans('general_messages.general_error'));
                return redirect()->back();
            }
        } catch (\Exception $exception){
            flash(trans('general_messages.general_error'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $userDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user_id = $id;
        $user_details = User::join('user_details as detail','detail.user_id','=','users.id')
                            ->join('attatchments as attachment','attachment.user_id','=','users.id')
                            ->join('management_notes as notes','notes.user_id','=','users.id')
                            ->join('payout_settings as payout','payout.user_id','=','users.id')
                            ->select('users.id','users.name','users.email','users.is_active','users.rights','users.password','detail.first_name','detail.last_name','detail.title','detail.phone_number','detail.mobile_number','detail.branch_id','detail.dob','detail.license_expiry','detail.ssn','detail.external_link','detail.preferred_for','detail.emergency_contact','detail.rating','detail.languages','detail.comments','detail.ledes_billing_id','detail.claim_access','detail.analytics_view','detail.interface_theme','detail.calendar_viewable_by','detail.calendar_setting','detail.internal_email','attachment.file_name','attachment.description','notes.note','notes.is_urgent','payout.disbursement_type','payout.amount')
                            ->where(['users.id'=>$id])
                            ->first();
        $url = Route::currentRouteName();
        $type    = '<input type="hidden" name="_method" value="PUT">';
        $payouts = $attachments = $management_notes = [];
        $next    = '';
        $tabs_url = [
            'general_details'   => \route('update-user',['id'=>$user_id]),
            'preferences'       => \route('change-account-preference',['id'=>$user_id]),
            'permissions'       => \route('change-user-permission',['id'=>$user_id]),
            'payout'            => \route('change-payout-setting',['id'=>$user_id]),
            'attachment'        => \route('change-attachments',['id'=>$user_id]),
            'notes'             => \route('change-management-notes',['id'=>$user_id])
        ];
        switch ($url){
            case "change-account-preference":
                $heading = 'Account Preference';
                $tab     = 'account_preference';
                $route   = \route('update-account-preference');
                $next    = \route('change-user-permission',['id'=>$user_id]);
                break;
            case 'change-user-permission':
                $heading = 'User Permission';
                $tab     = 'user_permission';
                $route   = \route('update-user-permissions');
                $next    = \route('change-payout-setting',['id'=>$user_id]);
                break;
            case 'change-payout-setting':
                $heading = 'Payout Setting';
                $tab     = 'payout_setting';
                $route   = \route('update-payout');
                $next    = \route('change-attachments',['id'=>$user_id]);
                $payouts = PayoutSetting::where(['user_id'=>$user_id])->orderBy('id','DESC')->get();
                $type    = '';
                break;
            case 'change-team-membership':
                $heading = 'Team Membership';
                $tab     = 'team_membership';
                $route   = \route('team-membership');
                break;
            case 'change-skill':
                $heading = 'Skill';
                $tab     = 'skill';
                $route   = \route('skill');
                break;
            case 'change-attachments':
                $heading = 'Attachments';
                $tab     = 'attachments';
                $route   = \route('update-attachment');
                $next    = \route('change-attachments',['id'=>$user_id]);
                $attachments = Attatchment::where('user_id','=',$user_id)->orderBy('id','DESC')->get();
                $type    = '';
                break;
            case 'change-management-notes':
                $heading = 'Management Notes';
                $tab     = 'management_notes';
                $route   = \route('update-management-notes');
                $next    = \route('change-management-notes',['id'=>$user_id]);
                $management_notes = ManagementNote::where('user_id','=',$user_id)->orderBy('id','DESC')->get();
                $type    = '';
                break;
            default:
                $heading = 'General Details';
                $tab     = 'general_details';
                $route   = \route('update-user-information');
                $next    = \route('change-account-preference',['id'=>$user_id]);
                break;
        }

        $branches = Branch::where('status','=',1)->get();
        return view('user.form',compact('user_details','branches','heading','tab','route','type','user_id','payouts','management_notes','attachments','next','tabs_url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(userDetailRequest $request)
    {
        //
//        try{
            DB::beginTransaction();
            $user_id = $request->get('user_id');
            if ($user_id){
                $user_detail = [
                    'first_name'    => $request->first_name,
                    'last_name'     => $request->last_name,
                    'title'         => $request->title,
                    'phone_number'  => $request->phone_number,
                    'mobile_number' => $request->mobile_number,
                    'branch_id'     => $request->branch_id,
                    'dob'           => $request->dob,
                    'ssn'           => $request->ssn,
                    'emergency_contact' => $request->emergency_contact,
                    'external_link' => $request->external_link,
                    'license_expiry'    => $request->license_expiry,
                    'preferred_for' => json_encode($request->preferred_for),
                    'rating'        => $request->rating,
                    'languages'     => $request->language_spoken,
                    'comments'      => $request->comments
                ];
                $update_user_details = UserDetail::where('user_id','=',$user_id)->update($user_detail);
                if ($update_user_details){
                    DB::commit();
                    $message = str_replace(':module','User',trans('general_messages.update_success_message'));
                    flash($message)->success();
                    return redirect(route('change-account-preference',['id'=>$user_id]));
                } else{
                    DB::rollBack();
                    flash(trans('general_messages.general_error'));
                    return redirect()->back();
                }
            } else{
                DB::rollBack();
                flash(trans('general_messages.general_error'));
                return redirect()->back();
            }
        /*} catch (\Exception $exception){
            flash(trans('general_messages.general_error'));
            return redirect()->back();
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {
        //
    }

    /**
    * store the user account preferences
     */
    public function store_account_preferences(userDetailRequest $request){
        try {
            DB::beginTransaction();
            $user_data = [
                'is_active' => $request->get('is_active',0),
                'name'      => $request->user_name,
                'password'  => Hash::make($request->password),
            ];
            $user_id = $request->user_id;
            $update_user = User::where(['id'=>$user_id])->update($user_data);
            if ($update_user){
                $user_detail_data = [
                    'ledes_billing_id'      => $request->ledes_billing_id,
                    'claim_access'          => $request->claim_access,
                    'analytics_view'        => $request->analytics_view,
                    'interface_theme'       => $request->interface_theme,
                    'calendar_viewable_by'  => json_encode($request->calendar_viewable_by),
                    'calendar_setting'      => $request->get('calendar_setting',0),
                    'internal_email'        => $request->get('internal_email',0)
                ];
                $update_user_data = UserDetail::where(['user_id'=>$user_id])->update($user_detail_data);
                if ($update_user_data){
                    DB::commit();
                    $message = str_replace(':module','User Account Preferences',trans('general_messages.create_success_message'));
                    flash($message)->success();
                    return redirect(route('user-permission'));
                } else{
                    DB::rollBack();
                    flash(trans('general_messages.general_error'));
                    return redirect()->back();
                }
            } else{
                DB::rollBack();
                flash(trans('general_messages.general_error'));
                return redirect()->back();
            }
        } catch (\Exception $exception){
            flash(trans('general_messages.general_error'));
            return redirect()->back();
        }
    }

    /**
     * To store the user rights in user table
     * data will be stored as json
    */
    public function store_user_permissions(userDetailRequest $request){
        try {
            $permissions_data = [
                'standard_permissions'      => $request->standard_permissions,
                'administrative_permission' => $request->administrative_permission

            ];
            $update_data = [
                'rights'    => json_encode($permissions_data),
                'updated_at'    => date('Y-m-d H:i:s')
            ];
            $user_id    = $request->get('user_id');
            DB::beginTransaction();
            $add_permissions = User::where(['id'=>$user_id])->update($update_data);
            if ($add_permissions){
                DB::commit();
                if (Route::currentRouteName() == 'update-user-permissions'){
                    $message = str_replace(':module','User Permissions',trans('general_messages.update_success_message'));
                    flash($message)->success();
                    return redirect()->to(\route('change-payout-setting',['id'=>$user_id]));
                } else{
                    $message = str_replace(':module','User Permissions',trans('general_messages.create_success_message'));
                    flash($message)->success();
                    return redirect()->to(\route('payout-setting'));
                }
            } else{
                DB::rollBack();
                flash(trans('general_messages.general_error'))->error();
                return redirect()->back();
            }
        } catch (\Exception $exception){
            flash(trans('general_messages.general_error'));
            return redirect()->back();
        }
    }

    public function update_account_preferences(userDetailRequest $request){
        try {
            DB::beginTransaction();
            $user_data = [
                'is_active' => $request->get('is_active',0),
                'name'      => $request->user_name,
            ];
            if (!empty($request->password)){
                $user_data['password']  = Hash::make($request->password);
            }
            $user_id = $request->user_id;
            $update_user = User::where(['id'=>$user_id])->update($user_data);
            if ($update_user){
                $user_detail_data = [
                    'ledes_billing_id'      => $request->ledes_billing_id,
                    'claim_access'          => $request->claim_access,
                    'analytics_view'        => $request->analytics_view,
                    'interface_theme'       => $request->interface_theme,
                    'calendar_viewable_by'  => json_encode($request->calendar_viewable_by),
                    'calendar_setting'      => $request->get('calendar_setting',0),
                    'internal_email'        => $request->get('internal_email',0)
                ];
                $update_user_data = UserDetail::where(['user_id'=>$user_id])->update($user_detail_data);
                if ($update_user_data){
                    DB::commit();
                    $message = str_replace(':module','User Account Preferences',trans('general_messages.update_success_message'));
                    flash($message)->success();
                    return redirect(route('change-user-permission',['id'=>$user_id]));
                } else{
                    DB::rollBack();
                    flash(trans('general_messages.general_error'));
                    return redirect()->back();
                }
            } else{
                DB::rollBack();
                flash(trans('general_messages.general_error'));
                return redirect()->back();
            }
        } catch (\Exception $exception){
            flash(trans('general_messages.general_error'));
            return redirect()->back();
        }
    }
}
