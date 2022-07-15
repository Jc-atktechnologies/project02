@extends ('layouts.v2.app')
@php
    if (!empty($detail)){
        $id             = $detail->id;
        $insurer_id     = $detail->insurer_id;
        $name           = $detail->name;
        $title          = $detail->title;
        $city           = $detail->city;
        $phone          = $detail->phone;
        $cell           = $detail->cell;
        $email          = $detail->email;
        $is_active      = $detail->is_active;
        $notes          = $detail->notes;
        $put_input      = '<input type="hidden" name="_method" value="PUT">';
        $heading        = "Update Insurer";
        $route          = route('edit-representative',['id'=>$id]);
    } else{
        $id             = '';
        $insurer_id     = $insurer_id;
        $name           = '';
        $title          = '';
        $city           = '';
        $phone          = '';
        $cell           = '';
        $email          = '';
        $is_active      = '';
        $notes          = '';
        $put_input      = '';
        $heading        = "Create Representative";
        $route          = route('save-representative');
    }
@endphp
@section('content')
<!-- start page title -->

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">{{config('app.name','Laravel')}}</a></li>
      <li class="breadcrumb-item"><a href="{{route('insurer-list')}}">Insurers</a></li>
      <li class="breadcrumb-item"><a href="{{route('representative-list',['id',$insurer_id])}}">Representative List</a></li>
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
                        <li class="breadcrumb-item"><a href="{{route('insurer-list')}}">Insurers</a></li>
                        <li class="breadcrumb-item"><a href="{{route('representative-list',['id',$insurer_id])}}">Representative List</a></li>
                        <li class="breadcrumb-item active">{{ $heading }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $heading }}</h4>
            </div>
        </div>
    </div>
     --}}

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
                    <div class="alert-primary alert">Representative Form</div>
                    <!-- row start -->
                    <div class="row">
                          <!-- col-6 start -->
                          <div class="col-6 pb-2">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text"class="form-control" name="name" id="name" value="@if(old('name')){{old('name')}}@else{{$name}}@endif">
                                @error('name')
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
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text"class="form-control" name="title" id="title" value="@if(old('title')){{old('title')}}@else{{$title}}@endif">
                                @error('title')
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
                                <label> Phone : <span class="text-danger">*</span></label>
                                <input type="text"class="form-control" name="phone" id="phone" value="@if(old('phone')){{old('phone')}}@else{{$phone}}@endif">
                                @error('phone')
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
                                <label>Cell : <span class="text-danger">*</span></label>
                                <input type="text"class="form-control" name="cell" id="cell" value="@if(old('cell')){{old('cell')}}@else{{$cell}}@endif">
                                @error('cell')
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
                                <label> Email : <span class="text-danger">*</span></label>
                                <input type="text"class="form-control" name="email" id="email" value="@if(old('email')){{old('email')}}@else{{$email}}@endif">
                                @error('email')
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
                            <label>Status : <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1" @if($is_active && $is_active == 'Active') selected @endif>Active</option>
                                    <option value="0" @if($is_active && $is_active == 'Inactive') selected @endif>Inactive</option>
         
                                </select>
                                @error('status')
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
                        <div class="col-12 pb-2">
                            <div class="form-group">
                                <label> Notes :<span class="text-danger">*</span></label>
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
                    <input type="hidden" name="insurer_id" value="{{$insurer_id}}">
                    <div class="d-flex flex-row justify-content-center">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@push('customejs')
<script async
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places&callback=initialize">
</script>
<script src="{{asset('assets/js/ajax.js')}}"></script>
@endpush
@endsection
