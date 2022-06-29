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
    <div class="alert-primary alert">Profile Details and Contact Information</div>
    <div class="form-group">
        <label>Full Name</label>
        <input type="text"class="form-control" name="full_name">
    </div>
    <div class="form-group">
        <label>Title</label>
        <input type="text"class="form-control" name="title">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text"class="form-control" name="phone_number">
    </div>
    <div class="form-group">
        <label>Cell</label>
        <input type="text"class="form-control" name="mobile_number">
    </div>
    <div class="form-group">
        <label>Email Address</label>
        <input type="text"class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>Branch</label>
        <select name="branch_id" class="form-control">
            <option value="">Select Branch</option>
        </select>
    </div>
    <div class="form-group">
        <label>DOB</label>
        <input type="date"class="form-control" name="dob">
    </div>
    <div class="form-group">
        <label>SSN/SIN</label>
        <input type="text"class="form-control" name="ssn">
    </div>
    <div class="form-group">
        <label>Emergency Contact</label>
        <input type="text"class="form-control" name="emergency_contact">
    </div>
    <div class="alert-primary alert">Other Information</div>

    <div class="form-group">
        <label>External Link</label>
        <input type="text"class="form-control" name="external_link">
    </div>
    <div class="form-group">
        <label>License Expiry</label>
        <input type="text"class="form-control" name="license_expiry">
    </div>
    <div class="form-group">
        <label class="label">Preferred For</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">Daily Work</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">Cat Work</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
            <label class="form-check-label" for="inlineCheckbox3">Other</label>
        </div>
    </div>
    <div class="form-group">
        <label>Overall Rating</label>
        <select name="rating" class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div>
    <div class="form-group">
        <label>Languages Spoken</label>
        <input type="text" name="language_spoken" class="form-control">
    </div>
    <div class="form-group">
        <label>Comments</label>
        <input type="text" name="comments" class="form-control">
    </div>
    <div class="d-flex flex-row justify-content-center">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
