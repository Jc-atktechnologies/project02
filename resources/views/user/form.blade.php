@extends('layouts.app')

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
