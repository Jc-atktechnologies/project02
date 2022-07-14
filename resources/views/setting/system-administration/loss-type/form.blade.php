@extends('layouts.app')

@php
    if (!empty($detail)){
        $id             = $detail->id;
        $title          = $detail->title;
        $put_input      = '<input type="hidden" name="_method" value="PUT">';
        $heading        = "Update Loss Type";
        $route          = route('edit-loss-type');
    } else{
        $id             = '';
        $title          = '';
        $put_input      = '';
        $heading        = "Create Loss Type";
        $route          = route('save-loss-type');
    }
@endphp

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">System Administration</a></li>
                        <li class="breadcrumb-item"><a href="{{route('custom-list') }}">Custom list</a></li>
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
                    <div class="d-flex flex-row justify-content-center">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
