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
                        <li class="breadcrumb-item"><a href="{{route('custom-list') }}">Custom list</a></li>
                        <li class="breadcrumb-item active">list</li>
                    </ol>
                </div>
                <h4 class="page-title">Loss Types</h4>
            </div>
        </div>
    </div>
    {{-- Table Content --}}
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h5 class="card-header bg-primary text-white"> Loss Type
                    <div class="float-right ">
                        <a href="{{ route('create-loss-type')}}" class="btn btn-sm btn-info "> Add Loss type</a>
                    </div>
                </h5>
                 @include('flash::message')
                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($types as $type)
                        <tr>
                            <td>{{$type->title}}</td>
                            <td>
                                <a href="{{route('update-loss-type',['id'=>$type->id])}}" title="Edit Loss Type" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                                @include('general_partials.delete_partial',['delete_url'=>route('delete-loss-type',['id'=>$type->id])])
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">{{str_replace(':module','Loss Type',trans('general_messages.no_record_found'))}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
