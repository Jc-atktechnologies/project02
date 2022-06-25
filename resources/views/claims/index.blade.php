@extends ('layouts.app')

@section('content')

{{-- Breadcrumb --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name', 'Laravel') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Claims</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
                <h4 class="page-title">Claims</h4>
            </div>
        </div>
    </div>
    {{-- Table Content --}}
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                
                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Insured</th>
                        <th>Insurer</th>
                        <th>Claim Number</th>
                        <th>Date received</th>
                        <th>Loss Date</th>
                        <th>Loss Type</th>
                        <th>Status</th>
                        <th>Last Activity</th>
                        <th>Claim Age</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($claims_data as $claims)
                        <tr>
                            <td>{{$claims->title}}</td>
                            <td><span class="badge-success">DATA</span>DATA<span class="badge-danger"></span>DATA</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> <a href="{{route('update-claims',['id'=>$claims->claimnumber])}}" title="Edit Claim" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                                @include('general_partials.delete_partial',['delete_url'=>route('delete-claim',['id'=>$claims->claimnumber])])
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
