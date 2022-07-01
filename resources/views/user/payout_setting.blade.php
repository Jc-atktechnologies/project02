<section>
    <h5>Add New Payout</h5>
    <form method="post" action="{{route('save-payout')}}">
        @csrf
        <input type="hidden" name="payout_setting" value="1">
        <input type="hidden" name="user_id" value="{{$user_id}}">
        <div class="row">
            <div class="form-group col-md-4">
                <label>Disbursement</label>
                <select name="disbursement_type" class="form-control">
                    <optgroup label="System Fee">
                        <option>Hourly Fee</option>
                    </optgroup>
                    <optgroup label="Disbursements">
                        <option>Administration</option>
                    </optgroup>
                </select>
                @error('disbursement_type')
                    <ul class="parsley-errors-list filled" id="parsley-id-7">
                        <li class="parsley-required">{{ $message }}</li>
                    </ul>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label>Payout Amount (%)</label>
                <input type="number" name="amount" class="form-control">
                @error('amount')
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
    <div class="alert alert-primary">Current Payout Listing</div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th colspan="4">Disbursement</th>
                <th>Payout</th>
                <th>Retained</th>
            </tr>
        </thead>
    </table>
</section>
