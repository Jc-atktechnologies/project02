@extends ('layouts.app')

@section('content')

{{-- Breadcrumb --}}
    <div class="row">
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
    </div>
    {{-- Table Content --}}
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
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Postal Code</th>
                        <th>Phone</th>
                        <th>Fax</th>
                        <th>Email</th>
                        <th>Alt Email</th>
                        <th>Alt Phone</th>
                        <th>Note</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($insurers as $insurer)
                        <tr>
                            <td>{{ $insurer->company_name }}</td>
                            <td>{{ $insurer->branch?->title }}</td>
                            <td>{{ $insurer->insurer_address }}</td>
                            <td>{{ $insurer->insurer_city }}</td>
                            <td>{{ $insurer->insurer_province }}</td>
                            <td>{{ $insurer->insurer_country }}</td>
                            <td>{{ $insurer->insurer_postal }}</td>
                            <td>{{ $insurer->insurer_phone }}</td>
                            <td>{{ $insurer->insurer_fax }}</td>
                            <td>{{ $insurer->insurer_email }}</td>
                            <td>{{ $insurer->insurer_altemail }}</td>
                            <td>{{ $insurer->insurer_altphone }}</td>
                            <td>{{ $insurer->insurer_notes }}</td>
                            <td> 
                                <a href="{{route('update-insurer',['id'=>$insurer->id])}}" title="Edit Insurer" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                                @include('general_partials.delete_partial',['delete_url'=>route('delete-insurer',['id'=>$insurer->id])])
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

@endsection
