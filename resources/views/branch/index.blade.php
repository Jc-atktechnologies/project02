@extends('layouts.app')

@section('content')
    {{-- Breadcrumb --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name', 'Laravel') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Branches</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
                <h4 class="page-title">Branches</h4>
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
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($branches_data as $branch)
                        <tr>
                            <td>{{$branch->title}}</td>
                            <td>@if($branch->status == 1)<span class="badge-success">Active</span>@else<span class="badge-danger">Block</span>@endif</td>
                            <td>
                                <a href="{{route('update-branch',['id'=>$branch->id])}}" title="Edit Branch" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                                @include('general_partials.delete_partial',['delete_url'=>route('delete-branch',['id'=>$branch->id])])
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">{{str_replace(':module','Branch',trans('general_messages.no_record_found'))}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
