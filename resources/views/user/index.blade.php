@extends('layouts.app')

@section('content')
    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name', 'Laravel') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
                <h4 class="page-title">Users</h4>
            </div>
        </div>
    </div>
    {{-- Table Content --}}
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                @include('flash::message')
                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Claim Access</th>
                        <th>Allow Login</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users_list as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>@if(!empty($user->userDetail->mobile_number)){{$user->userDetail->mobile_number}}@endif </td>
                            <td>@if(!empty($user->userDetail->claim_access)){{$user->userDetail->claim_access}}@endif</td>
                            <td>@if($user->is_active == 1)<span class="badge-success">Active</span>@else<span class="badge-danger">Block</span>@endif</td>
                            <td>
                                <a href="{{route('update-branch',['id'=>$user->id])}}" title="Edit Branch" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                                @include('general_partials.delete_partial',['delete_url'=>route('delete-branch',['id'=>$user->id])])
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">{{str_replace(':module','User',trans('general_messages.no_record_found'))}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
