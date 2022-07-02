<form method="post" action="">
    <div class="row">
        <div class="form-group col-md-8">
            <label>New Note Text</label>
            <textarea name="management_note" class="form-control"></textarea>
        </div>
        <div class="form-check col-md-2 mt-3">
            <input type="checkbox" class="form-check-input" name="urgent" value="1">
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
