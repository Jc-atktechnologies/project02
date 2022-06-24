@extends('layouts.app')
@php
    if (!empty($branch_details)){
        $id    = $branch_details->id;
        $title = $branch_details->title;
        $email = $branch_details->email;
        $contact_number = $branch_details->contact_number;
        $address = $branch_details->address;
        $status  = $branch_details->status;
        $put_input              = '<input type="hidden" name="_method" value="PUT">';
        $heading = "Update Branch";
        $route   = route('edit-branch');
    } else{
        $id    = '';
        $title = '';
        $status = '';
        $put_input = '';
        $heading = "Create Branch";
        $route = route('save-branch');
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
                        <li class="breadcrumb-item"><a href="{{route('branch-list')}}">Branches</a></li>
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
                        <label>Branch Title</label>
                        <input type="text" name="title" class="form-control" value="@if(old('title')){{old('title')}}@else{{$title}}@endif">
                        @error('title')
                        <ul class="parsley-errors-list filled" id="parsley-id-7">
                            <li class="parsley-required">{{ $message }}</li>
                        </ul>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option>---Select Option---</option>
                            <option value="0" @if((old('status') == 0) || ($status == 0)) selected @endif>Block</option>
                            <option value="1" @if((old('status') == 1) || ($status == 1)) selected @endif>Active</option>
                        </select>
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
