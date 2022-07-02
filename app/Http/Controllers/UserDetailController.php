<?php

namespace App\Http\Controllers;

use App\Http\Requests\userDetailRequest;
use App\Models\Branch;
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
        $users_list = User::where(['is_active'=>1])->orderBy('id','DESC')->get();
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
        switch ($url){
            case "account-preference":
                $heading = 'Account Preference';
                $tab     = 'account_preference';
                break;
            case 'user-permission':
                $heading = 'User Permission';
                $tab     = 'user_permission';
                break;
            case 'payout-setting':
                $heading = 'Payout Setting';
                $tab     = 'payout_setting';
                break;
            case 'team-membership':
                $heading = 'Team Membership';
                $tab     = 'team_membership';
                break;
            case 'skill':
                $heading = 'Skill';
                $tab     = 'skill';
                break;
            case 'attachments':
                $heading = 'Attachments';
                $tab     = 'attachments';
                break;
            case 'management-notes':
                $heading = 'Management Notes';
                $tab     = 'management_notes';
                break;
            default:
                $heading = 'General Details';
                $tab     = 'general_details';
                break;
        }
        $user_id = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        $branches = Branch::where('status','=',1)->get();
        return view('user.form',compact('heading','tab','branches','user_id'));
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
                    'comments'      => $request->comments
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
    public function edit(UserDetail $userDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDetail $userDetail)
    {
        //
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
//        try {
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
                    'calendar_viewable_by'  => $request->calendar_viewable_by,
                    'calendar_setting'      => $request->calendar_setting,
                    'internal_email'        => $request->internal_email
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
        /*} catch (\Exception $exception){
            flash(trans('general_messages.general_error'));
            return redirect()->back();
        }*/
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
                $message = str_replace(':module','User Permissions',trans('general_messages.create_success_message'));
                flash($message)->success();
                return redirect()->to(\route('payout-setting'));
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

}
