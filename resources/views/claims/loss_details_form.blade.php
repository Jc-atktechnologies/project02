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
    <div class="alert-primary alert">Loss Detail</div>
    <div class="form-group">
        <label>Date Of Loss : </label>
        <input type="date"class="form-control" name="date_of_loss" id="date_of_loss">
    </div>
    <div class="form-group">
        <label>Loss Type : <span class="text-danger">*</span></label>
        <select name="loss_type" id="loss_type" class="form-control">
            <option value=""> Please Select</option>
            @foreach($insurers as $insurer)
            <option value="{{$insurer->id}}">{{ $insurer->company_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Loss Location : <span class="text-danger">*</span></label>
        <textarea row="3" class="form-control" name="loss_location" id="loss_location"></textarea>
    </div>
    <div class="form-group">
        <label>Loss Country : </label>
        <input type="text"class="form-control" name="loss_country" id="loss_country">
    </div>
    <div class="form-group">
        <label>Additional Notes :</label>
        <textarea row="3" class="form-control" name="loss_location" id="loss_location"></textarea>
    </div>
    <div class="form-group">
        <label>Time of Loss</label>
        <input type="time"class="form-control" name="time_of_loss" id="time_of_loss">
    </div>
    <div class="form-group">
        <label>Reported Date :</label>
        <input type="date"class="form-control" name="reported_date" id="reported_date">
    </div>
    <div class="form-group">
        <label>Loss Description</label>
        <textarea row="3" class="form-control" name="loss_location" id="loss_location"></textarea>
    </div>
    <div class="form-group">
        <label>Optional attachment :</label>
        <input type="file"class="form-control" name="optional_attachment" id="optional_attachment">
    </div>
    <div class="d-flex flex-row justify-content-center">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
