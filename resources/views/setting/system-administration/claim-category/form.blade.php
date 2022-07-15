@extends('layouts.v2.app')
@php
    if (!empty($detail)){
        $id             = $detail->id;
        $title          = $detail->title;
        $put_input      = '<input type="hidden" name="_method" value="PUT">';
        $heading        = "Update Claim Category";
        $route          = route('edit-claim-category',['id'=>$detail->id]);
    } else{
        $id             = '';
        $title          = '';
        $put_input      = '';
        $heading        = "Create Claim Category";
        $route          = route('save-claim-category');
    }
@endphp
@section('content')
    <!-- start page title -->
<nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Settings</a></li>
          <li class="breadcrumb-item"><a href="javascript: void(0);">System Administration</a></li>
          <li class="breadcrumb-item active" > <a href="{{route('custom-list') }}">Custom List</a></li>
          <li class="breadcrumb-item active">{{$heading}}</li>
        </ol>
</nav>

    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Settings</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">System Administration</a></li>
                        <li class="breadcrumb-item"><a href="{{route('custom-list') }}">Custom list</a></li>
                        <li class="breadcrumb-item active">{{$heading}}</li>
                    </ol>
                </div>
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
                <form method="post" action="{{$route}}">
                    @csrf
                    {!! $put_input !!}
                    
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="@if(old('title')){{old('title')}}@else{{$title}}@endif">
                        @error('title')
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required">{{ $message }}</li>
                        </ul>
                        @enderror
                    </div>
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
@endsection
