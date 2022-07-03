<form method="post" action="{{$route}}">
    @csrf
    {!! $type !!}
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
            @if(!empty($next))<a href="{{$next}}" class="btn btn-info ml-2">Skip</a>@endif
        </div>
    </div>
</form>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Entered By</th>
            <th>Note</th>
            <th>Urgent</th>
        </tr>
    </thead>
    @if(!empty($management_notes))
        <tbody>
            @foreach($management_notes as $management)
                <tr>
                    <td>{{$management->userDetail->name}}</td>
                    <td>{{$management->note}}</td>
                    <td>@if($management->is_urgent == 1)<span class="badge badge-success p-2">Yes</span>@else<span class="badge badge-danger p-2">No</span>@endif</td>
                </tr>
            @endforeach
        </tbody>
    @endif
</table>
