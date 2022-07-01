<form method="post" action="{{route('save-management-notes')}}">
    @csrf
    <input type="hidden" name="management_notes" value="1">
    <input type="hidden" name="user_id" value="{{$user_id}}">
    <div class="row">
        <div class="form-group col-md-8">
            <label>New Note Text</label>
            <textarea name="note" class="form-control"></textarea>
            @error('note')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
            @enderror
        </div>
        <div class="form-check col-md-2 mt-3">
            <input type="checkbox" class="form-check-input" name="is_urgent" value="1">
            <label class="form-check-label">Urgent</label>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Created On</th>
            <th>Entered By</th>
            <th>Note</th>
        </tr>
    </thead>
</table>
