@extends('layouts.app')
@php
    if (!empty($user_details)){
        $id                     = $user_details->id;
        $name                   = $user_details->name;
        $email                  = $user_details->email;
        $is_active              = $user_details->is_active;
        $password               = $user_details->password;
        $rights                 = json_decode($user_details->rights, true);
        $first_name             = $user_details->first_name;
        $last_name              = $user_details->last_name;
        $title                  = $user_details->title;
        $phone_number           = $user_details->phone_number;
        $mobile_number          = $user_details->mobile_number;
        $branch_id              = $user_details->branch_id;
        $dob                    = $user_details->dob;
        $ssn                    = $user_details->ssn;
        $external_link          = $user_details->external_link;
        $preferred_for          = json_decode($user_details->preferred_for,true) ?? [];
        $rating                 = $user_details->rating;
        $languages              = $user_details->languages;
        $comments               = $user_details->comments;
        $ledes_billing_id       = $user_details->ledes_billing_id;
        $claim_access           = $user_details->claim_access;
        $analytics_view         = $user_details->analytics_view;
        $interface_theme        = $user_details->interface_theme;
        $calendar_viewable_by   = json_decode($user_details->calendar_viewable_by,true) ?? [];
        $calendar_setting       = $user_details->calendar_setting;
        $internal_email         = $user_details->internal_email;
        $file_name              = $user_details->file_name;
        $description            = $user_details->description;
        $note                   = $user_details->note;
        $is_urgent              = $user_details->is_urgent;
        $disbursement_type      = $user_details->disbursement_type;
        $amount                 = $user_details->amount;
        $license_expiry         = date('Y-m-d',strtotime($user_details->license_expiry));
        $emergency_contact      = $user_details->emergency_contact;
    } else{
        $id                     = '';
        $name                   = '';
        $email                  = '';
        $is_active              = '';
        $password               = '';
        $rights                 = '';
        $first_name             = '';
        $last_name              = '';
        $title                  = '';
        $phone_number           = '';
        $mobile_number          = '';
        $branch_id              = '';
        $dob                    = '';
        $ssn                    = '';
        $external_link          = '';
        $preferred_for          = [];
        $rating                 = '';
        $languages              = '';
        $comments               = '';
        $ledes_billing_id       = '';
        $claim_access           = '';
        $analytics_view         = '';
        $interface_theme        = '';
        $calendar_viewable_by   = '';
        $calendar_setting       = '';
        $internal_email         = '';
        $file_name              = '';
        $description            = '';
        $note                   = '';
        $is_urgent              = '';
        $disbursement_type      = '';
        $amount                 = '';
        $license_expiry         = '';
        $emergency_contact      = '';
    }
@endphp
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{config('app.name','Laravel')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('users-list')}}">Users</a></li>
                        <li class="breadcrumb-item active">{{$heading}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content started -->
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                @include("flash::message")
                @include('user.user_form_header')
                {{-- Different tabs view start from here --}}
                <div class="tab-content">
                    <div class="tab-pane @if($tab == 'general_details') active @else show @endif" id="general_details">
                        @include('user.general_details_form')
                    </div>
                    <div class="tab-pane  @if($tab == 'account_preference') active @else show @endif" id="account_preference">
                        @include('user.account_preference')
                    </div>
                    <div class="tab-pane  @if($tab == 'user_permission') active @else show @endif" id="user_permission">
                        @include('user.user_permission')
                    </div>
                    <div class="tab-pane  @if($tab == 'payout_setting') active @else show @endif" id="payout_setting">
                        @include('user.payout_setting')
                    </div>
                    <div class="tab-pane  @if($tab == 'team_membership') active @else show @endif" id="team_membership">
                        @include('user.team_membership')
                    </div>
                    <div class="tab-pane  @if($tab == 'skill') active @else show @endif" id="skill">
                        @include('user.skill')
                    </div>
                    <div class="tab-pane  @if($tab == 'attachments') active @else show @endif" id="attachments">
                        @include('user.attachments')
                    </div>
                    <div class="tab-pane  @if($tab == 'management_notes') active @else show @endif" id="management_notes">
                        @include('user.management_notes')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
