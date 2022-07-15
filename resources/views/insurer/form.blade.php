@extends ('layouts.v2.app')
@php
    if (!empty($detail)){
        $id             = $detail->id;
        $company_name   = $detail->company_name;
        $branch_id      = $detail->branch_id;
        $address        = $detail->insurer_address;
        $city           = $detail->insurer_city;
        $state          = $detail->insurer_province;
        $country        = $detail->insurer_country;
        $zipcode        = $detail->insurer_postal;
        $phone          = $detail->insurer_phone;
        $fax            = $detail->insurer_fax;
        $email          = $detail->insurer_email;
        $alt_email      = $detail->insurer_altemail;
        $alt_phone      = $detail->insurer_altphone;
        $notes          = $detail->insurer_notes;
        $put_input      = '<input type="hidden" name="_method" value="PUT">';
        $heading        = "Update Insurer";
        $route          = route('edit-insurer',['id'=>$detail->id]);
    } else{
        $id             = '';
        $company_name   = '';
        $branch_id      = '';
        $address        = '';
        $city           = '';
        $state          = '';
        $country        = '';
        $zipcode        = '';
        $phone          = '';
        $fax            = '';
        $email          = '';
        $alt_email      = '';
        $alt_phone      = '';
        $notes          = '';
        $put_input      = '';
        $heading        = "Create Insurer";
        $route          = route('save-insurer');
    }
@endphp
@section('content')
<!-- start page title -->

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{config('app.name','Laravel')}}</a></li>
      <li class="breadcrumb-item active" > <a href="{{route('claims-list') }}">Insurers</a></li>
      <li class="breadcrumb-item active">{{ $heading }}</li>
    </ol>
</nav>

<div class="page-title-box pb-1">
<h4 class="page-title">{{ $heading }}</h4>
</div>

{{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{ config('app.name', 'Laravel') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('claims-list')}}">Insurers</a></li>
                        <li class="breadcrumb-item active">{{ $heading }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $heading }}</h4>
            </div>
        </div>
    </div> --}}

    <!-- Page content started -->
<div class="card">
    <div class="card-body">

    
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                @include("flash::message")
                <form action="{{ $route }}" method="post">
                    @csrf
                    {!! $put_input !!}
                    <!-- insurer section -->
                    <div class="alert-primary alert">Insurer Detail</div>
                    <!-- row start -->
                    <div class="row">
                          <!-- col-6 start -->
                          <div class="col-6 pb-2">
                            <div class="form-group">
                                <label>Company Name <span class="text-danger">*</span></label>
                                <input type="text"class="form-control" name="company_name" id="company_name" value="@if(old('company_name')){{old('company_name')}}@else{{$company_name}}@endif">
                                @error('company_name')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Branch : </label>
                                <select name="branch_id" id="branch_id" class="form-control">
                                    <option value="">Select Branch</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}" @if($branch_id && $branch_id == $branch->id) selected @endif>{{ $branch->title }}</option>
                                    @endforeach
                                </select>
                                @error('branch_id')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6 pb-2">
                            <div class="form-group">
                                <label> Address :</label>
                                <textarea row="3" class="form-control" name="address" id="address">@if(old('address')){{old('address')}}@else{{$address}}@endif</textarea>
                                @error('address')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text"class="form-control" name="city" id="city" value="@if(old('city')){{old('city')}}@else{{$city}}@endif">
                                @error('city')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6 pb-2">
                            <div class="form-group">
                                <label> Prov/state :</label>
                                <input type="text"class="form-control" name="state" id="state" value="@if(old('state')){{old('state')}}@else{{$state}}@endif">
                                @error('state')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text"class="form-control" name="country" id="country" value="@if(old('country')){{old('country')}}@else{{$country}}@endif">
                                @error('country')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                     <!-- row start -->
                     <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6 pb-2">
                            <div class="form-group">
                                <label> Postal/zip :</label>
                                <input type="text"class="form-control" name="zipcode" id="zipcode" value="@if(old('zipcode')){{old('zipcode')}}@else{{$zipcode}}@endif">
                                @error('zipcode')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input type="text"class="form-control" name="phone" id="phone" value="@if(old('phone')){{old('phone')}}@else{{$phone}}@endif">
                                @error('phone')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                      <!-- row start -->
                      <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6 pb-2">
                            <div class="form-group">
                                <label> Fax :</label>
                                <input type="text"class="form-control" name="fax" id="fax" value="@if(old('fax')){{old('fax')}}@else{{$fax}}@endif">
                                @error('fax')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"class="form-control" name="email" id="email" value="@if(old('email')){{old('email')}}@else{{$email}}@endif">
                                @error('email')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                     <!-- row start -->
                     <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6 pb-2">
                            <div class="form-group">
                                <label> Alt Email :</label>
                                <input type="text"class="form-control" name="alt_email" id="alt_email" value="@if(old('alt_email')){{old('alt_email')}}@else{{$alt_email}}@endif">
                                @error('alt_email')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Alt Phone</label>
                                <input type="text"class="form-control" name="alt_phone" id="alt_phone" value="@if(old('alt_phone')){{old('alt_phone')}}@else{{$alt_phone}}@endif">
                                @error('alt_phone')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-12 ">
                            <div class="form-group">
                                <label> Notes :</label>
                                <textarea row="3" class="form-control" name="notes" id="notes">@if(old('notes')){{old('notes')}}@else{{$notes}}@endif</textarea>
                                @error('notes')
                                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                                        <li class="parsley-required">{{ $message }}</li>
                                    </ul>
                                @enderror
                            </div>
                        </div>
                        <!-- col-12 end -->
                    </div>
                    <!-- row end -->
                    <!-- insurer section end -->
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="d-flex flex-row justify-content-center pt-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@push('customejs')
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNXNhr4HCbfCYEoo37DQ1TrAsL60VS63A&libraries=places&callback=initialize">
</script>
<script src="{{asset('assets/js/ajax.js')}}"></script>
@endpush
@endsection
