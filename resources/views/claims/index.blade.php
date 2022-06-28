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
                            <td colspan="8">ADD SEARCH BAR</td>
                            <td colspan="8">ADD CLAIM BUTTON</td>
                        </tr>
                        <tr>
                            <td colspan="10"></td>
                        </tr>
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
                        
                        <tr>
                            <td>Full Name</td>
                            <td>Insurer Company Name</td>
                            <td>YEAR+RANDOM NUMBER (AUTO INCREMENT)</td>
                            <td>DD/MM/YYYY</td>
                            <td>DD/MM/YYYY</td>
                            <td>LOSS TYPE</td>
                            <td>STATUS WITH BG COLOR</td>
                            <td>TIMESTAMP</td>
                            <td>AGE OF CLAIM</td>
                            <td> <a href="" title="Edit Claim" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                    
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
