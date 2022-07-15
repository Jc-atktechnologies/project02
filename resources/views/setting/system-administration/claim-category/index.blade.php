@extends('layouts.v2.app')

@section('content')
    {{-- Breadcrumb --}}

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">{{config('app.name','Laravel')}}</a></li>
          <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
          <li class="breadcrumb-item"><a href="javascript: void(0);">System Administration</a></li>
          <li class="breadcrumb-item active" > <a href="{{route('custom-list') }}">Custom List</a></li>
          <li class="breadcrumb-item active">list</li>
        </ol>
</nav>

<div class="page-title-box pb-1">
    <h4 class="page-title">Claim Categories</h4>
</div>

    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">System Administration</a></li>
                        <li class="breadcrumb-item"><a href="{{route('custom-list') }}">Custom list</a></li>
                        <li class="breadcrumb-item active">list</li>
                    </ol>
                </div>
                <h4 class="page-title">Claim Categories</h4>
            </div>
        </div>
    </div> --}}

    {{-- Table Content --}}
<div class="card">
    <div class="card-body">
        
    
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h5 class="card-header bg-primary text-white">Claim Categories 
                    <div class="float-right pt-2">
                        <a href="{{ route('create-claim-category')}}" class="btn btn-sm btn-dark" > Add Claim Category</a>
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
                    @forelse($categories as $category)
                        <tr>
                            <td>{{$category->title}}</td>
                            <td>
                                <a href="{{route('update-claim-category',['id'=>$category->id])}}" title="Edit Claim Category" class="btn btn-info">
                                    <i class="fa fa-edit"></i> 
                                </a>
                                @include('general_partials.delete_partial',['delete_url'=>route('delete-claim-category',['id'=>$category->id])])
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">{{str_replace(':module','Claim Categories',trans('general_messages.no_record_found'))}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
