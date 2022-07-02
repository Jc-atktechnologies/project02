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

<form action="" method="post">
    <div class="alert-primary alert">System Login Information</div>
    <div class="form-check">
        <input type="checkbox"class="form-check-input" name="is_active">
        <label class="form-check-label">Banned From Login</label>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text"class="form-control" name="user_name">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password"class="form-control" name="password">
    </div>
    <div class="alert alert-primary">LEDES Integration</div>
    <div class="form-group">
        <label>LEDES Billing ID</label>
        <input type="text"class="form-control" name="cell">
    </div>
    <div class="alert alert-primary">Preferences</div>
    <div class="form-group">
        <label>Claim Access</label>
        <select name="claim_access" class="form-control">
            <option>View All Claims in the system</option>
            <option>View Only </option>
        </select>
    </div>
    <div class="form-group">
        <label>Analytics View</label>
        <select name="analytics_view" class="form-control">
            <option>Personal Only</option>
            <option>Executive View</option>
        </select>
    </div>
    <div class="form-group">
        <label>Interface Theme</label>
        <select name="interface_theme" class="form-control">
            <option>Professional</option>
            <option>Classy</option>
        </select>
    </div>
    <div class="form-group">
        <label>Calendar viewable by</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                All Staff
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Claim Administrators
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" for="flexCheckChecked">
                Branch Managers
            </label>
        </div>
    </div>
    <div class="form-group">
        <label>Calendar settings</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Allow user to change calendar settings
            </label>
        </div>
    </div>
    <div class="form-group">
        <label>Internal Emails</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Receive Internal Publications
            </label>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-center">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
