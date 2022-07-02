@extends('layouts.app')

@section('content')
    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name', 'Laravel') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">System Administration</a></li>
                        <li class="breadcrumb-item active">Custom List</li>
                    </ol>
                </div>
                <h4 class="page-title"></h4>System Administration
            </div>
        </div>
    </div>
    {{-- Table Content --}}
    <div class="row">
        <div class="col-12">
        @include('flash::message')
            <div class="card">
                <h5 class="card-header bg-primary text-white">Customizable Lists</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <a href="{{ route('loss-types') }}"> Loss Types</a>
                        </div>
                        <div class="col-10">
                            <p>Loss Types allow you to tailor the types of files and tabs available within each loss type so that they reflect your current line of business. You have the ability to create the Loss Type Name and select the specific tabs to be displayed within that loss type. This allows for you to display only the tabs and information that pertains to each specific loss type.</p>
                        </div>
                   </div>
                   <hr>
                   <div class="row">
                        <div class="col-2">
                            <a href="{{ route('claim-categories-list') }}"> Claim Categories</a>
                        </div>
                        <div class="col-10">
                            <p>Custom Claim Categories gives you the ability to capture data that is specific to your day-to-day process which may not be readily available within KM. You can create both the field label and the corresponding dropdown menu items.</p>
                        </div>
                   </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
