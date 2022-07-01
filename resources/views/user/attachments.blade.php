<section>
    <form method="post" action="{{route('save-attachment')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="attachments" value="1">
        <input type="hidden" name="user_id" value="{{$user_id}}">
        <div class="row">
            <div class="form-group col-md-4">
                <label>File</label>
                <input type="file" name="attachment" class="form-control-file">
                @error('attachment')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label>Note</label>
                <input type="text" name="description" class="form-control">
                @error('description')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
            <div class="col-md-4 mt-3">
                <button type="submit" class="btn btn-success">Add Payout</button>
            </div>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Added By</th>
            <th>Added On</th>
        </tr>
        </thead>
    </table>
</section>
