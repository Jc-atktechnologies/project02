@extends ('layouts.v2.app')

@section('content')

{{-- Breadcrumb --}}

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript: void(0);">{{config('app.name','Laravel')}}</a></li>
      <li class="breadcrumb-item"><a href="javascript: void(0);">Insurers</a></li>
      <li class="breadcrumb-item active">list</li>
    </ol>
</nav>

    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ config('app.name', 'Laravel') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Insurers</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
                <h4 class="page-title">Insurers</h4>
            </div>
        </div>
    </div> --}}


    {{-- Table Content --}}

<div class="card">
    <div class="card-body">

    
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
            <h5 class="card-header bg-primary text-white">Insurer list </h5>
            @include('flash::message')
                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Company</th>
                        <th>Branch</th>
                        <th>Address</th>
                        <th>Internal Reps</th>
                        <th>Detail</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($insurers as $insurer)
                        <tr>
                            <td>{{ $insurer->company_name }}</td>
                            <td>{{ $insurer->branch?->title }}</td>
                            <td>{{ $insurer->insurer_address }}</td>
                            <td><a href="{{route('representative-list',['id'=>$insurer->id])}}" title="Representative List" class="btn btn-primary">View </a></td>
                            <td><button type="submit" onclick=" return GetInsurerDetail('{{$insurer->id}}')" class="btn btn-primary">View</button></td>
                            <td> 
                                <a href="{{route('update-insurer',['id'=>$insurer->id])}}" title="Edit Insurer" class="btn btn-secondary"><i class="fa fa-edit" data-feather="edit"></i></a>
                                <span class="btn btn-danger"> <i class="bg-danger" data-feather="trash"> @include('general_partials.delete_partial',['delete_url'=>route('delete-insurer',['id'=>$insurer->id])]) </i> </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="14">{{str_replace(':module','Insurers',trans('general_messages.no_record_found'))}}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- modal sectin for insurer detail -->
    <div class="modal" tabindex="-1" role="dialog" id="OpenInsureDetail">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="heading">Insurer's Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="output">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
    @push('customejs')
    <script src="{{asset('assets/js/ajax.js')}}"></script>
    @endpush
@endsection
