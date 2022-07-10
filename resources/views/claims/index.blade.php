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
        @include('flash::message')
            <div class="card-box table-responsive">
                <div class="alert-primary alert">Claim's List</div>
                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <td class="td-search-border" colspan="7">
                                <div class="float-left">
                                    <div class="row">
                                        <div class="col-11">
                                            <div class="form-group">
                                                <input type="text"class="form-control" placeholder="search claim" name="claim_number" id="claim_number">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="form-group" style="margin-top: 3px">
                                                <input type="button" class="btn btn-sm btn-info" name="btn-filter" id="btn-filter" value="Filter">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <a href="{{route('create-claims')}}" class="btn btn-sm btn-info ">Add New Claim</a>
                                </div>    
                            </td>
                            
                        </tr>
                        <tr>
                            <td class="remove-td-border" colspan="7"></td>
                        </tr>
                    <tr>
                        <th>Insured</th>
                        <th>Insurer</th>
                        <th>Claim Number</th>
                        <th>Date received</th>
                        <th>Loss Date</th>
                        <th>Loss Type</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($claim_data as $claim)
                        <tr>
                            <td>{{ $claim->insured->name }}</td>
                            <td>{{ $claim->insurer->company_name }}</td>
                            <td>{{ $claim->claim_number }}</td>
                            <td>{{ $claim->created_at }}</td>
                            <td>{{ $claim->lossdetail->loss_date}}</td>
                            <td>{{ $claim->lossdetail->lossType->title}}</td>
                            <td> 
                                <a href="javascript:void(0)" onclick=" return GetClaimDetail('{{ $claim->id}}')" title="Claim Detail" class="btn btn-success"><i class="fa fa-eye"></i> </a>
                                <a href="{{ route('update-claims',['id'=>$claim->id])}}" title="Edit Claim" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                                @include('general_partials.delete_partial',['delete_url'=>route('delete-claims',['id'=>$claim->id])])
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">{{str_replace(':module','Claim',trans('general_messages.no_record_found'))}}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- modal section -->
    <div class="modal" tabindex="-1" role="dialog" id="OpenModel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="heading">Claim Detail</h5>
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
    @push('customejs')
        <script src="{{asset('assets/js/ajax.js')}}"></script>
    @endpush
@endsection
