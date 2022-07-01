@extends ('layouts.app')

@php
if (!empty($claims_details)){
        $id    = $claims_details->id;
        $claimnumber = $claims_details->claim_number;
        $date_time_loss = $claims_details->date_time_loss;
        $date_time_reported = $claims_details->date_time_reported;
        $gross_loss_value = $claims_details->gross_loss_value;
        $actual_cash_value = $claims_details->actual_cash_value;
        $replacement_cost = $claims_details->replacement_cost;
        $loss_type = $claims_details->loss_type;
        $loss_cause = $claims_details->loss_cause;
        $line_of_business = $claims_details->line_of_business;
        $treaty_year = $claims_details->treaty_year;
        $treaty_type = $claims_details->treaty_type;
        $stat_limitations = $claims_details->stat_limitations;
        $cat_code = $claims_details->cat_code;
        $loss_location = $claims_details->loss_location;
        $loss_city = $claims_details->loss_city;
        $loss_province = $claims_details->loss_province;
        $loss_postal = $claims_details->loss_postal;
        $loss_description = $claims_details->loss_description;
        $notes = $claims_details->notes;
        $put_input              = '<input type="hidden" name="_method" value="PUT">';
        $heading = "Update Claim";
        $route   = route('edit-claim');
    } else{
        $id    = '';
        $claimnumber = '';
        $date_time_loss = '';
        $date_time_reported = '';
        $gross_loss_value = '';
        $actual_cash_value = '';
        $replacement_cost = '';
        $loss_type = '';
        $loss_cause = '';
        $line_of_business = '';
        $treaty_year = '';
        $treaty_type = '';
        $stat_limitations = '';
        $cat_code = '';
        $loss_location = '';
        $loss_city = '';
        $loss_province = '';
        $loss_postal = '';
        $loss_description = '';
        $notes = '';
        $put_input = '';
        $heading = "Create Claim";

        $title='';
        $status='';
        $route = route('save-claims');
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
                        <li class="breadcrumb-item"><a href="{{route('branch-list')}}">Claims</a></li>
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
                @include('claims.claim_form_header')
                <div class="tab-content">
                    <div class="tab-pane @if($tab == 'insurer_details') active @else show @endif" id="insurer_details">
                        @include('claims.insurer_details_form')
                    </div>
                    <div class="tab-pane @if($tab == 'insured_details') active @else show @endif" id="insured_details">
                        @include('claims.insured_details_form')
                    </div>
                    <div class="tab-pane @if($tab == 'loss_details') active @else show @endif" id="loss_details">
                        @include('claims.loss_details_form')
                    </div>
                    <div class="tab-pane @if($tab == 'assignment_information') active @else show @endif" id="assignment_information">
                        @include('claims.assignment_information_form')
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
