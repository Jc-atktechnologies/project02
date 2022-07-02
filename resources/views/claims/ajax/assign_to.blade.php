<div class="form-group">
    <label>Assign To : <span class="text-danger">*</span></label>
    <select name="assign_to" id="assign_to" class="form-control">
        <option value=""> Please Select</option>
        @foreach($users as $user)
            <option value="{{$user->id}}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>