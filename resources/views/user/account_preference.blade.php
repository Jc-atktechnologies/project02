@error('user_id')
    <div class="alert alert-danger">{{$message}}</div>
@enderror
<form action="{{route('save-account-preference')}}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="account_preference" value="1">
    <input type="hidden" name="user_id" value="{{$user_id}}">
    <div class="alert-primary alert">System Login Information</div>
    <div class="form-check">
        <input type="checkbox"class="form-check-input" name="is_active" value="1" @if(old('is_active') == 'Daily Work') checked @endif>
        <label class="form-check-label">Banned From Login</label>
        @error('is_active')
            <ul class="parsley-errors-list filled" id="parsley-id-7">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text"class="form-control" name="user_name" value="@if(old('user_name')){{old('user_name')}}@endif">
        @error('user_name')
            <ul class="parsley-errors-list filled" id="parsley-id-7">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password"class="form-control" name="password" value="@if(old('password')){{old('password')}}@endif">
        @error('password')
            <ul class="parsley-errors-list filled" id="parsley-id-7">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="alert alert-primary">LEDES Integration</div>
    <div class="form-group">
        <label>LEDES Billing ID</label>
        <input type="text"class="form-control" name="ledes_billing_id" value="@if(old('ledes_billing_id')){{old('ledes_billing_id')}}@endif">
        @error('ledes_billing_id')
            <ul class="parsley-errors-list filled" id="parsley-id-7">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="alert alert-primary">Preferences</div>
    <div class="form-group">
        <label>Claim Access</label>
        <select name="claim_access" class="form-control">
            <option value="View All Claims in the system" @if(old('claim_access') == 'View All Claims in the system') selected @endif>View All Claims in the system</option>
            <option value="View Only" @if(old('claim_access') == 'View Only') selected @endif>View Only </option>
        </select>
        @error('claim_access')
            <ul class="parsley-errors-list filled" id="parsley-id-7">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Analytics View</label>
        <select name="analytics_view" class="form-control">
            <option value="Personal Only" @if(old('analytics_view') == 'Personal Only') selected @endif>Personal Only</option>
            <option value="Executive View" @if(old('analytics_view') == 'View Only') selected @endif>Executive View</option>
        </select>
        @error('analytics_view')
            <ul class="parsley-errors-list filled" id="parsley-id-7">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Interface Theme</label>
        <select name="interface_theme" class="form-control">
            <option value="Professional" @if(old('analytics_view') == 'Professional') selected @endif>Professional</option>
            <option value="Classy" @if(old('analytics_view') == 'Classy') selected @endif>Classy</option>
        </select>
        @error('interface_theme')
            <ul class="parsley-errors-list filled" id="parsley-id-7">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Calendar viewable by</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="All Staff" id="flexCheckDefault" name="calendar_viewable_by" @if(old('calendar_view_by') == 'All Staff') checked @endif>
            <label class="form-check-label" for="flexCheckDefault">
                All Staff
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Claim Administrators" id="flexCheckChecked" name="calendar_viewable_by" @if(old('calendar_view_by') == 'Claim Administrators') checked @endif>
            <label class="form-check-label" for="flexCheckChecked">
                Claim Administrators
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Branch Managers" id="flexCheckChecked" name="calendar_viewable_by" @if(old('calendar_view_by') == 'Branch Managers') checked @endif>
            <label class="form-check-label" for="flexCheckChecked">
                Branch Managers
            </label>
        </div>
        @error('calendar_viewable_by')
            <ul class="parsley-errors-list filled" id="parsley-id-7">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Calendar settings</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="calendar_setting" @if(old('calendar_settings') == '1') checked @endif>
            <label class="form-check-label" for="flexCheckDefault">
                Allow user to change calendar settings
            </label>
        </div>
        @error('calendar_setting')
            <ul class="parsley-errors-list filled" id="parsley-id-7">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="form-group">
        <label>Internal Emails</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="internal_email" @if(old('internal_email') == '1') checked @endif>
            <label class="form-check-label" for="flexCheckDefault">
                Receive Internal Publications
            </label>
        </div>
        @error('internal_email')
            <ul class="parsley-errors-list filled" id="parsley-id-7">
                <li class="parsley-required">{{ $message }}</li>
            </ul>
        @enderror
    </div>
    <div class="d-flex flex-row justify-content-center">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
