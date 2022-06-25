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
        $route = route('save-claim');
    }

@endphp

@section('content')



@endsection
