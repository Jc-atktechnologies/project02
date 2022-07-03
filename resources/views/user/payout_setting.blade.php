<section>
    <h5>Add New Payout</h5>
    <form method="post" action="{{$route}}">
        @csrf
        {!! $type !!}
        <input type="hidden" name="payout_setting" value="1">
        <input type="hidden" name="user_id" value="{{$user_id}}">
        <div class="row">
            <div class="form-group col-md-4">
                <label>Disbursement</label>
                <select name="disbursement_type" class="form-control">
                    <optgroup label="System Fee">
                        <option value="Hourly Fee" @if(old('disbursement_type') == 'Hourly Fee') selected @endif>Hourly Fee</option>
                    </optgroup>
                    <optgroup label="Disbursements">
                        <option value="Administration" @if(old('disbursement_type') == 'Administration') selected @endif>Administration</option>
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
                <input type="number" name="amount" class="form-control" value="@if(old('amount')){{old('amount')}}@endif">
                @error('amount')
                <ul class="parsley-errors-list filled" id="parsley-id-7">
                    <li class="parsley-required">{{ $message }}</li>
                </ul>
                @enderror
            </div>
            <div class="col-md-4 mt-3">
                <button type="submit" class="btn btn-success">Add Payout</button>
                @if(!empty($next))<a href="{{$next}}" class="btn btn-info ml-2">Skip</a>@endif
            </div>
        </div>
    </form>
    <div class="alert alert-primary">Current Payout Listing</div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Disbursement</th>
                <th>Payout</th>
                <th>Added On</th>
            </tr>
        </thead>
        @if(!empty($payouts))
            <tbody>
                @foreach($payouts as $payout)
                    <tr>
                        <td>{{$payout->disbursement_type}}</td>
                        <td>{{$payout->amount}}</td>
                        <td>{{date('d-m-Y',strtotime($payout->created_at))}}</td>
                    </tr>
                @endforeach
            </tbody>
        @endif
    </table>
</section>
