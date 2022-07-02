<section>
    <h5>Add New Payout</h5>
    <form method="post" action="">
        <div class="row">
            <div class="form-group col-md-4">
                <label>Disbursement</label>
                <select name="disbursement" class="form-control">
                    <optgroup label="System Fee">
                        <option>Hourly Fee</option>
                    </optgroup>
                    <optgroup label="Disbursements">
                        <option>Administration</option>
                    </optgroup>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Payout Amount (%)</label>
                <input type="text" name="payout_amount" class="form-control">
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
