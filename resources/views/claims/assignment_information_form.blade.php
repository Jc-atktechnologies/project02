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
    <div class="alert-primary alert">Assignment Information</div>
    <div class="form-group">
        <label>Claim Number : </label>
        <input type="checkbox"class="form-check-input" name="over_ride" id="over_ride" style="margin-left:1%"><span style="margin-left:3%"> Over-ride and use a specific claim Number</span>
    </div>
    <div class="form-group">
        <label>Claim Category : </label>
        <select name="claim_category" id="claim_category" class="form-control">
            <option value=""> Please Select</option>
            @foreach($insurers as $insurer)
            <option value="{{$insurer->id}}">{{ $insurer->company_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Assignment Method : <span class="text-danger">*</span></label>
        <select name="assignment_method" id="assignment_method" class="form-control">
            <option value=""> Please Select</option>
            @foreach($insurers as $insurer)
            <option value="{{$insurer->id}}">{{ $insurer->company_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Assign To : <span class="text-danger">*</span></label>
        <select name="assign_to" id="assign_to" class="form-control">
            <option value=""> Please Select</option>
            @foreach($insurers as $insurer)
            <option value="{{$insurer->id}}">{{ $insurer->company_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Share With :</label>
        <select name="share_with" id="share_with" class="form-control">
            <option value=""> Please Select</option>
            @foreach($insurers as $insurer)
            <option value="{{$insurer->id}}">{{ $insurer->company_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="d-flex flex-row justify-content-center">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
