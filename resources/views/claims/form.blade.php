@extends ('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">{{ config('app.name', 'Laravel') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('claims-list')}}">Settings</a></li>
                        <li class="breadcrumb-item active">Add New Claim</li>
                    </ol>
                </div>
                <h4 class="page-title">Add New Claim</h4>
            </div>
        </div>
    </div>
    <!-- Page content started -->
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                @include("flash::message")
                <form action="" method="post">
                    <!-- insurer section -->
                    <div class="alert-primary alert">Insurer Detail</div>
                    <!-- row start -->
                    <div class="row">
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Isurer : <span class="text-danger">*</span></label>
                                <select name="insurer_id" id="insurer_id" class="form-control">
                                    <option value="">Select Insurer</option>
                                    @foreach($insurers as $insurer)
                                        <option value="{{$insurer->id}}">{{ $insurer->company_name }}</option>
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
                                <select name="rep" id="rep" class="form-control">
                                    <option value="">Please Select</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Insurer Claim Number</label>
                                <input type="text"class="form-control" name="claim_number" id="claim_number">
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
                                <input type="text"class="form-control" name="insured" id="insured">
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Prov/State : <span class="text-danger">*</span></label>
                                <select name="state_id" id="state_id" class="form-control">
                                    <option value="">Please Select</option>
                                </select>
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
                                <label>Address</label>
                                <textarea row="3" class="form-control" name="address" id="address"></textarea>
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
                                <input type="text"class="form-control" name="country_id" id="country_id">
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>City: </label>
                                <input type="text"class="form-control" name="city" id="city">
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
                                <input type="text"class="form-control" name="zip_code" id="zip_code">
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Email: </label>
                                <input type="text"class="form-control" name="email" id="email">
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
                                <input type="text"class="form-control" name="phone" id="phone">
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Cell: </label>
                                <input type="text"class="form-control" name="cell" id="cell">
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
                                <input type="date"class="form-control" name="date_of_loss" id="date_of_loss">
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Time of Loss</label>
                                <input type="time"class="form-control" name="time_of_loss" id="time_of_loss">
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
                                    <option value="{{$type->id}}">{{ $type->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Reported Date :</label>
                                <input type="date"class="form-control" name="reported_date" id="reported_date">
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
                                <textarea row="3" class="form-control" name="loss_location" id="loss_location" Autocomplete=""></textarea>
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Loss Description</label>
                                <textarea row="3" class="form-control" name="loss_location" id="loss_location"></textarea>
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
                                <input type="text"class="form-control" name="loss_country" id="loss_country">
                            </div>
                        </div>
                        <!-- col-6 end -->
                        <!-- col-6 start -->
                        <div class="col-6">
                            <div class="form-group">
                                <label>Additional Notes :</label>
                                <textarea row="3" class="form-control" name="loss_location" id="loss_location"></textarea>
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
                                    <option value="{{$category->id}}">{{ $category->title }}</option>
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
                                    <option value="{{$assignment_method['id']}}">{{ $assignment_method['title'] }}</option>
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
                                    <option value="{{$user->id}}">{{ $user->name }}</option>
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
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNXNhr4HCbfCYEoo37DQ1TrAsL60VS63A&libraries=places">
</script>
<script src="{{asset('assets/js/ajax.js')}}"></script>
@endpush
@endsection
