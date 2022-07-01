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
    <div class="alert-primary alert">Insurer Detail</div>
    <div class="form-group">
        <label>Isurer : <span class="text-danger">*</span></label>
        <select name="insurer_id" id="insurer_id" class="form-control">
            <option value="">Select Insurer</option>
            @foreach($insurers as $insurer)
            <option value="{{$insurer->id}}">{{ $insurer->company_name }}</option>
            @endforeach
        </select>
    </div>
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
    <div class="form-group">
        <label>Policy Number</label>
        <input type="text"class="form-control" name="policy_number" id="policy_number">
    </div>
    <div class="form-group">
        <label>Insurer Claim Number</label>
        <input type="text"class="form-control" name="claim_number" id="claim_number">
    </div>
    <div class="d-flex flex-row justify-content-center">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
