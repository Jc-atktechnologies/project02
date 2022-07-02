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
    <div class="alert-primary alert">Insured Detail</div>
    <div class="form-group">
        <label>Insured: <span class="text-danger">*</span></label>
        <input type="text"class="form-control" name="insured" id="insured">
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea row="3" class="form-control" name="address" id="address"></textarea>
    </div>
    <div class="form-group">
        <label>City: </label>
        <input type="text"class="form-control" name="city" id="city">
    </div>
    <div class="form-group">
        <label>Email: </label>
        <input type="text"class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
        <label>Prov/State : <span class="text-danger">*</span></label>
        <select name="state_id" id="state_id" class="form-control">
            <option value="">Please Select</option>
        </select>
    </div>
    <div class="form-group">
        <label>Country: </label>
        <input type="text"class="form-control" name="country_id" id="country_id">
    </div>
    <div class="form-group">
        <label>Zip/Postal: </label>
        <input type="text"class="form-control" name="zip_code" id="zip_code">
    </div>
    <div class="form-group">
        <label>Phone: </label>
        <input type="text"class="form-control" name="phone" id="phone">
    </div>
    <div class="form-group">
        <label>Cell: </label>
        <input type="text"class="form-control" name="cell" id="cell">
    </div>
    <div class="d-flex flex-row justify-content-center">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
