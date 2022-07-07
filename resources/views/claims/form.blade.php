@extends ('layouts.app')
@php
    if (!empty($detail)){
        $id             = $detail->id;
        $insurer_id     = $detail->insurer_id;
        $name           = $detail->name;
        $title          = $detail->title;
        $city           = $detail->city;
        $phone          = $detail->phone;
        $cell           = $detail->cell;
        $email          = $detail->email;
        $is_active      = $detail->is_active;
        $notes          = $detail->notes;
        $put_input      = '<input type="hidden" name="_method" value="PUT">';
        $heading        = "Update Claim";
        $route          = route('edit-',['id'=>$id]);
    } else{
        $id                 = '';
        $insurer_id         = '';
        $claim_number       = $claim_number;
        $representative_id  = '';
        $policy_number      = '';
        $insured            = '';
        $state              = '';
        $address            = '';
        $country            = '';
        $city               = '';
        $zip_code           = '';
        $email              = '';
        $phone              = '';
        $cell               = '';
        $date_of_loss       = '';
        $time_of_loss       = '';
        $loss_type          = '';
        $reported_date      = '';
        $loss_location      = '';
        $loss_description   = '';
        $loss_country       = '';
        $additional_notes   = '';
        $claim_category     = '';
        $assignmentmethod   = '';
        $share_with         = '';
        $put_input          = '';
        $heading            = "Add New Claim";
        $route              = route('save-claims');
    }
@endphp
@section('content')
<!-- start page title -->
<div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{ config('app.name', 'Laravel') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('claims-list')}}">Settings</a></li>
                        <li class="breadcrumb-item active">{{$heading}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$heading}}</h4>
            </div>
        </div>
    </div>
    <!-- Page content started -->
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                @include("flash::message")
                <form action="{{ $route }}" method="post">
                    @csrf
                    {!! $put_input !!}
                    <!-- insurer section -->
                    <div class="alert-primary alert">Insurer Detail</div>
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Isurer : <span class="text-danger">*</span></label>
                                <select name="insurer_id" id="insurer_id" class="form-control" required onchange="return GetInsurerRepresentative(this.value)">
                                    <option value="">Select Insurer</option>
                                    @foreach($insurers as $insurer)
                                        <option value="{{$insurer->id}}" @if($insurer_id && $insurer_id==$insurer->id) selected @endif>{{ $insurer->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Policy Number</label>
                                <input type="text"class="form-control" name="policy_number" id="policy_number">
                            </div>
                        </div>
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Inside Rep : <span class="text-danger">*</span></label>
                                <select name="representative_id" id="representative_id" required class="form-control">
                                    <option value="">Please Select</option>
                                </select>
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Insurer Claim Number</label>
                                <input type="text"class="form-control" value="@if(old('claim_number')){{old('claim_number')}}@else{{$claim_number}}@endif" readonly name="claim_number" id="claim_number">
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- insurer section end -->
                    <!-- Insured Section start -->
                    <div class="alert-primary alert">Insured Detail</div>
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Insured: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="insured" id="insured" required value="@if(old('insured')){{old('insured')}}@else{{$insured}}@endif">
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Prov/State : <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="state" id="state" value="@if(old('state')){{old('state')}}@else{{$state}}@endif">
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <!-- col-12 start -->
                        <div class="col-12">
                            <div class="form-group">
                                <label>Address : <span class="text-danger">*</span></label>
                                <textarea row="3" class="form-control" name="address" id="address">@if(old('address')){{old('address')}}@else{{$address}}@endif</textarea>
                            </div>
                        </div>
                        <!-- col-12 end -->
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Country: </label>
                                <input type="text"class="form-control" name="country" id="country" value="@if(old('country')){{old('country')}}@else{{$country}}@endif">
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>City: </label>
                                <input type="text"class="form-control" name="city" id="city" value="@if(old('city')){{old('city')}}@else{{$city}}@endif">
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Zip/Postal: </label>
                                <input type="text"class="form-control" name="zip_code" id="zip_code" value="@if(old('zip_code')){{old('zip_code')}}@else{{$zip_code}}@endif">
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Email: </label>
                                <input type="text"class="form-control" name="email" id="email" value="@if(old('email')){{old('email')}}@else{{$email}}@endif">
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Phone: </label>
                                <input type="text"class="form-control" name="phone" id="phone" value="@if(old('phone')){{old('phone')}}@else{{$phone}}@endif">
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Cell: </label>
                                <input type="text"class="form-control" name="cell" id="cell" value="@if(old('cell')){{old('cell')}}@else{{$cell}}@endif">
                            </div>
                        </div>
                         <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- insured section end -->
                    <!-- Loss section start -->
                    <div class="alert-primary alert">Loss Detail</div>
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Date Of Loss : </label>
                                <input type="date"class="form-control" name="date_of_loss" id="date_of_loss" value="@if(old('date_of_loss')){{old('date_of_loss')}}@else{{$date_of_loss}}@endif">
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Time of Loss</label>
                                <input type="time"class="form-control" name="time_of_loss" id="time_of_loss" value="@if(old('time_of_loss')){{old('time_of_loss')}}@else{{$time_of_loss}}@endif">
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Loss Type : <span class="text-danger">*</span></label>
                                <select name="loss_type" id="loss_type" class="form-control">
                                    <option value=""> Please Select</option>
                                    @foreach($loss_types as $type)
                                    <option value="{{$type->id}}" @if($loss_type && $loss_type==$type->id) selected @endif>{{ $type->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Reported Date :</label>
                                <input type="date"class="form-control" name="reported_date" id="reported_date" value="@if(old('reported_date')){{old('reported_date')}}@else{{$reported_date}}@endif">
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Loss Location : <span class="text-danger">*</span></label>
                                <textarea row="3" class="form-control" name="loss_location" id="loss_location"> @if(old('loss_location')){{old('loss_location')}}@else{{$loss_location}}@endif</textarea>
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Loss Description</label>
                                <textarea row="3" class="form-control" name="loss_description" id="loss_description">@if(old('loss_description')){{old('loss_description')}}@else{{$loss_description}}@endif</textarea>
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Loss Country : </label>
                                <input type="text"class="form-control" name="loss_country" id="loss_country" value="@if(old('loss_country')){{old('loss_country')}}@else{{$loss_country}}@endif">
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Additional Notes :</label>
                                <textarea row="3" class="form-control" name="additional_notes" id="additional_notes">@if(old('additional_notes')){{old('additional_notes')}}@else{{$additional_notes}}@endif</textarea>
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- loss section end -->
                    <!-- Assignment information section start -->
                    <div class="alert-primary alert">Assignment Information</div>
                     <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Claim Category : </label>
                                <select name="claim_category" id="claim_category" class="form-control">
                                    <option value=""> Please Select</option>
                                    @foreach($claim_categories as $category)
                                    <option value="{{$category->id}}" @if($claim_category && $claim_category==$category->id) selected @endif>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Assignment Method : <span class="text-danger">*</span></label>
                                <select name="assignment_method" id="assignment_method" class="form-control" onchange=" return ToggleAssignTo(this.value)">
                                    <option value=""> Please Select</option>
                                    @foreach($assignment_methods as $assignment_method)
                                    <option value="{{$assignment_method['id']}}" @if($assignmentmethod && $assignmentmethod==$assignment_method['id']) selected @endif>{{ $assignment_method['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6" style="display: none;" id="assign">
                            
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Share With :</label>
                                <select name="share_with" id="share_with" class="form-control">
                                    <option value=""> Please Select</option>
                                    @foreach($share_users as $user)
                                    <option value="{{$user->id}}" @if($share_with && $share_with==$user->id) selected @endif>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- col-6 end -->
                    </div>
                    <!-- row end -->
                    <!-- Assignment information section end -->
                    <div class="d-flex flex-row justify-content-center">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@push('customejs')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places">
</script>
<script src="{{asset('assets/js/ajax.js')}}"></script>
@endpush
@endsection
