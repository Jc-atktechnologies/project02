<?php

namespace App\Http\Controllers;

use App\Http\Requests\userDetailRequest;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $heading = 'General Details';
        $tab     = 'general_details';
        return view('user.form',compact('heading','tab'));
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
                'name'  => $request->full_name,
                'email' => $request->email,
                'created_at'    => date('Y-m-d H:i:s')
            ];
            $user_id = User::getInsertId($user_data);
            if ($user_id){
                $user_detail = [
                    'user_id'       => $user_id,
                    'title'         => $request->title,
                    'phone_number'  => $request->phone_number,
                    'mobile_number' => $request->mobile_number,
                    'branch_id'     => $request->branch_id,
                    'dob'           => $request->dob,
                    'ssn'           => $request->ssn,
                    'emergency_contact' => $request->emergency_contact,
                    'external_link' => $request->external_link,
                    'license_expiry'    => $request->license_expiry,
                    'preferred_for' => $request->preferred_for,
                    'rating'        => $request->rating,
                    'languages'     => $request->language_spoken,
                    'comments'      => $request->comments
                ];
                $save_user_details = UserDetail::insert($user_detail);
                if ($save_user_details){
                    DB::commit();
                    $message = str_replace(':module','User',trans('general_messages.create_success_message'));
                    flash($message)->success();
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

    public function account_preference(){
        $heading = 'Account Preference';
        $tab     = 'account_preference';
        return view('user.form',compact('heading','tab'));
    }
    public function user_permission(){
        $heading = 'User Permission';
        $tab     = 'user_permission';
        return view('user.form',compact('heading','tab'));
    }
    public function payout_setting(){
        $heading = 'Payout Setting';
        $tab     = 'payout_setting';
        return view('user.form',compact('heading','tab'));
    }
    public function team_membership(){
        $heading = 'Team Membership';
        $tab     = 'team_membership';
        return view('user.form',compact('heading','tab'));
    }
    public function skill(){
        $heading = 'Skill';
        $tab     = 'skill';
        return view('user.form',compact('heading','tab'));
    }
    public function attachments(){
        $heading = 'Attachments';
        $tab     = 'attachments';
        return view('user.form',compact('heading','tab'));
    }
    public function management_notes(){
        $heading = 'Management Notes';
        $tab     = 'management_notes';
        return view('user.form',compact('heading','tab'));
    }
}
