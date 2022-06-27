<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
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
