@include('flash::message')
<form action="{{$route}}" method="post">
    @csrf
    {!! $type !!}
    <input type="hidden" name="user_id" value="{{$user_id}}">
    <div class="alert-primary alert">Profile Details and Contact Information</div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>First Name</label>
                <input type="text"class="form-control" name="first_name" value="@if(old('first_name')){{old('first_name')}}@else{{$first_name}}@endif">
                @error('first_name')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text"class="form-control" name="last_name" value="@if(old('last_name')){{old('last_name')}}@else{{$last_name}}@endif">
                @error('last_name')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Title</label>
                <input type="text"class="form-control" name="title" value="@if(old('title')){{old('title')}}@else{{$title}}@endif">
                @error('title')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Phone</label>
                <input type="text"class="form-control" name="phone_number" value="@if(old('phone_number')){{old('phone_number')}}@else{{$phone_number}}@endif">
                @error('phone_number')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Cell</label>
                <input type="text"class="form-control" name="mobile_number" value="@if(old('mobile_number')){{old('mobile_number')}}@else{{$mobile_number}}@endif">
                @error('mobile_number')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Email Address</label>
                <input type="text"class="form-control" name="email" value="@if(old('email')){{old('email')}}@else{{$email}}@endif">
                @error('email')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Branch</label>
                <select name="branch_id" class="form-control">
                    <option value="">Select Branch</option>
                    @forelse($branches as $branch)
                        <option value="{{$branch->id}}" @if($branch->id == $branch_id || old('branch_id') == $branch->id) selected @endif>{{$branch->title}}</option>
                    @empty
                        <option value="">No Record Found</option>
                    @endforelse
                </select>
                @error('branch_id')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>DOB</label>
                <input type="date"class="form-control" name="dob" value="@if(old('dob')){{old('dob')}}@else{{$dob}}@endif">
                @error('dob')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>SSN/SIN</label>
                <input type="text"class="form-control" name="ssn" value="@if(old('ssn')){{old('ssn')}}@else{{$ssn}}@endif">
                @error('ssn')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Emergency Contact</label>
                <input type="text"class="form-control" name="emergency_contact" value="@if(old('emergency_contact')){{old('emergency_contact')}}@else{{$emergency_contact}}@endif">
                @error('emergency_contact')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="alert-primary alert col-md-12">Other Information</div>
        <div class="col-md-6">
            <div class="form-group">
                <label>External Link</label>
                <input type="text"class="form-control" name="external_link" value="@if(old('external_link')){{old('external_link')}}@else{{$external_link}}@endif">
                @error('external_link')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>License Expiry</label>
                <input type="date"class="form-control" name="license_expiry" value="@if(old('license_expiry')){{old('license_expiry')}}@else{{$license_expiry}}@endif">
                @error('license_expiry')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="label">Preferred For</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Daily Work" name="preferred_for[]" @if(old('preferred_for') == 'Daily Work' || in_array('Daily Work',$preferred_for)) checked @endif>
                    <label class="form-check-label" for="inlineCheckbox1">Daily Work</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Cat Work" name="preferred_for[]" @if(old('preferred_for') == 'Cat Work' || in_array('Cat Work',$preferred_for)) checked @endif>
                    <label class="form-check-label" for="inlineCheckbox2">Cat Work</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Other" name="preferred_for[]" @if(old('preferred_for') == 'Other' || in_array('Other',$preferred_for)) checked @endif>
                    <label class="form-check-label" for="inlineCheckbox3">Other</label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Overall Rating</label>
                <select name="rating" class="form-control">
                    <option value="1" @if($rating == 1 || old('rating') == 1) selected @endif>1</option>
                    <option value="2" @if($rating == 2 || old('rating') == 2) selected @endif>2</option>
                    <option value="3" @if($rating == 2 || old('rating') == 2) selected @endif>3</option>
                    <option value="4" @if($rating == 2 || old('rating') == 2) selected @endif>4</option>
                    <option value="5" @if($rating == 2 || old('rating') == 2) selected @endif>5</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Languages Spoken</label>
                <input type="text" name="language_spoken" class="form-control" value="@if(old('language_spoken')){{old('language_spoken')}}@else{{$languages}}@endif">
                @error('language_spoken')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Comments</label>
                <input type="text" name="comments" class="form-control" value="@if(old('comments')){{old('comments')}}@else{{$comments}}@endif">
                @error('comments')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-center">
        <button type="submit" class="btn btn-success">Save</button>
        @if(!empty($next))<a href="{{$next}}" class="btn btn-info ml-2">Skip</a>@endif
    </div>
</form>
