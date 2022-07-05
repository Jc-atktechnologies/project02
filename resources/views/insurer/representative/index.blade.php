@extends ('layouts.app')

@section('content')

{{-- Breadcrumb --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home')}}">{{ config('app.name', 'Laravel') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('insurer-list') }}">Insurers</a></li>
                        <li class="breadcrumb-item active">Representatives List</li>
                    </ol>
                </div>
                <h4 class="page-title">Representativess</h4>
            </div>
        </div>
    </div>
    {{-- Table Content --}}
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
            <h5 class="card-header bg-primary text-white">Representatives list 
                <div class="float-right ">
                    <a href="{{ route('create-representative',['id'=>$id])}}" class="btn btn-sm btn-info "> Add Representative</a>
                </div>
            </h5>
            @include('flash::message')
                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Insurer</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Phone</th>
                        <th>Cell</th>
                        <th>Email</th>
                        <th>Notes</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($representatives as $representative)
                        <tr>
                            <td>{{ $representative->insurer->company_name }}</td>
                            <td>{{ $representative->name }}</td>
                            <td>{{ $representative->title }}</td>
                            <td>{{ $representative->phone }}</td>
                            <td>{{ $representative->cell }}</td>
                            <td>{{ $representative->email }}</td>
                            <td>{{ $representative->notes }}</td>
                            <td>{{ $representative->is_active }} </td>
                            <td> 
                                <a href="{{route('update-representative',['id'=>$representative->id])}}" title="Edit Representative" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                                @include('general_partials.delete_partial',['delete_url'=>route('delete-representative',['id'=>$representative->id])])
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">{{str_replace(':module','Representative',trans('general_messages.no_record_found'))}}</td>
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
    @push('customejs')

        <script>
            function GetInsurerDetail(id)
            {
                $.ajax({
                    type: "GET",
                    url: '/insurer-detail/'+id,
                    success: function (response) {
                        document.getElementById('output').innerHTML= response.view;
                        $('#OpenInsureDetail').modal('show');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
                
            }
        </script>
    @endpush
@endsection
