@php
    if (!empty($city_detail)){
        $id             = $city_detail->id;
        $province_id    = $city_detail->province_id;
        $title          = $city_detail->title;
        $status         = $city_detail->status;
        $put_input      = '<input type="text"type="hidden" name="_method" value="PUT">';
        $heading        = "Update City";
        $route          = route('edit-city');
    } else{
        $id             = '';
        $province_id    = '';
        $title          = '';
        $status         = '';
        $put_input      = '';
        $heading        = "Create City";
        $route          = route('save-city');
    }
@endphp
@foreach($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
@endforeach
@include('flash::message')
<form action="{{route('save-user-information')}}" method="post">
    @csrf
    <div class="alert-primary alert">Profile Details and Contact Information</div>
    <div class="form-group">
        <label>First Name</label>
        <input type="text"class="form-control" name="first_name" value="@if(old('first_name')){{old('first_name')}}@endif">
        @error('first_name')
            <ul class="parsley-errors-list filled" id="parsley-id-7">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text"class="form-control" name="last_name" value="@if(old('last_name')){{old('last_name')}}@endif">
        @error('last_name')
            <ul class="parsley-errors-list filled" id="parsley-id-7">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Title</label>
        <input type="text"class="form-control" name="title" value="@if(old('title')){{old('title')}}@endif">
        @error('title')
        <ul class="parsley-errors-list filled" id="parsley-id-7">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text"class="form-control" name="phone_number" value="@if(old('phone_number')){{old('phone_number')}}@endif">
        @error('phone_number')
        <ul class="parsley-errors-list filled" id="parsley-id-7">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Cell</label>
        <input type="text"class="form-control" name="mobile_number" value="@if(old('mobile_number')){{old('mobile_number')}}@endif">
        @error('mobile_number')
        <ul class="parsley-errors-list filled" id="parsley-id-7">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Email Address</label>
        <input type="text"class="form-control" name="email" value="@if(old('email')){{old('email')}}@endif">
        @error('email')
        <ul class="parsley-errors-list filled" id="parsley-id-7">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Branch</label>
        <select name="branch_id" class="form-control">
            <option value="">Select Branch</option>
            @forelse($branches as $branch)
                <option value="{{$branch->id}}">{{$branch->title}}</option>
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
    <div class="form-group">
        <label>DOB</label>
        <input type="date"class="form-control" name="dob" value="@if(old('dob')){{old('dob')}}@endif">
        @error('dob')
        <ul class="parsley-errors-list filled" id="parsley-id-7">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>SSN/SIN</label>
        <input type="text"class="form-control" name="ssn" value="@if(old('ssn')){{old('ssn')}}@endif">
        @error('ssn')
        <ul class="parsley-errors-list filled" id="parsley-id-7">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Emergency Contact</label>
        <input type="text"class="form-control" name="emergency_contact" value="@if(old('emergency_contact')){{old('emergency_contact')}}@endif">
        @error('emergency_contact')
        <ul class="parsley-errors-list filled" id="parsley-id-7">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
    <div class="alert-primary alert">Other Information</div>

    <div class="form-group">
        <label>External Link</label>
        <input type="text"class="form-control" name="external_link" value="@if(old('external_link')){{old('external_link')}}@endif">
        @error('external_link')
        <ul class="parsley-errors-list filled" id="parsley-id-7">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>License Expiry</label>
        <input type="date"class="form-control" name="license_expiry" value="@if(old('license_expiry')){{old('license_expiry')}}@endif">
        @error('license_expiry')
        <ul class="parsley-errors-list filled" id="parsley-id-7">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
    <div class="form-group">
        <label class="label">Preferred For</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Daily Work" name="preferred_for" @if(old('preferred_for') == 'Daily Work') checked @endif>
            <label class="form-check-label" for="inlineCheckbox1">Daily Work</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Cat Work" name="preferred_for" @if(old('preferred_for') == 'Cat Work') checked @endif>
            <label class="form-check-label" for="inlineCheckbox2">Cat Work</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Other" name="preferred_for" @if(old('preferred_for') == 'Other') checked @endif>
            <label class="form-check-label" for="inlineCheckbox3">Other</label>
        </div>
    </div>
    <div class="form-group">
        <label>Overall Rating</label>
        <select name="rating" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div class="form-group">
        <label>Languages Spoken</label>
        <input type="text" name="language_spoken" class="form-control" value="@if(old('language_spoken')){{old('language_spoken')}}@endif">
        @error('language_spoken')
        <ul class="parsley-errors-list filled" id="parsley-id-7">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Comments</label>
        <input type="text" name="comments" class="form-control" value="@if(old('comments')){{old('comments')}}@endif">
        @error('comments')
        <ul class="parsley-errors-list filled" id="parsley-id-7">
            <li class="parsley-required">{{ $message }}</li>
        </ul>
        @enderror
    </div>
    <div class="d-flex flex-row justify-content-center">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
