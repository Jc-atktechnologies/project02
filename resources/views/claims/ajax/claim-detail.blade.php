<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="alert-primary alert">Insurer Detail</div>
            <div class="card-box table-responsive">    
                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                   <tr>
                        <th>Claim ID</th>
                        <td>{{ $claim->id }}</td>
                   </tr>
                   <tr>
                        <th>Claim Number</th>
                        <td>{{ $claim->claim_number }}</td>
                   </tr>
                   <tr>
                        <th>Policy Number</th>
                        <td>{{ $claim->policy_number }}</td>
                   </tr>
                   <tr>
                        <th>Insurer Company Name</th>
                        <td>{{ $claim->insurer->company_name }}</td>
                   </tr>
                   <tr>
                        <th>Company Rep</th>
                        <td>{{ $claim->insurer->representative->name}}</td>
                   </tr>
                   <tr>
                        <th>Cliam Created By</th>
                        <td>{{ $claim->user->name}}</td>
                   </tr>
                   <tr>
                        <th>Assignment Method</th>
                        <td>{{ $claim->assingment_method }}</td>
                   </tr>
                   <tr>
                        <th>Created At</th>
                        <td>{{ $claim->created_at }}</td>
                   </tr>
                   <tr>
                        <th>Updated At</th>
                        <td>{{ $claim->updated_at}}</td>
                   </tr>
                </table>
            </div>
            <div class="alert-primary alert">Insured Detail</div>
            <div class="card-box table-responsive">    
                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <tr>
                        <th>Name</th>
                        <td>{{ $claim->insured->name}}</td>
                   </tr>
                   <tr>
                        <th>Address</th>
                        <td>{{ $claim->insured->address}}</td>
                   </tr>
                   <tr>
                        <th>Country</th>
                        <td>{{ $claim->insured->country}}</td>
                   </tr>
                   <tr>
                        <th>City</th>
                        <td>{{ $claim->insured->city}}</td>
                   </tr>
                   <tr>
                        <th>Prov/State</th>
                        <td>{{ $claim->insured->state}}</td>
                   </tr>
                   <tr>
                        <th>Postal/Zip Code</th>
                        <td>{{ $claim->insured->postal_code}}</td>
                   </tr>
                   <tr>
                        <th>Email</th>
                        <td>{{ $claim->insured->email}}</td>
                   </tr>
                   <tr>
                        <th>Phone Number</th>
                        <td>{{ $claim->insured->phone}}</td>
                   </tr>
                   <tr>
                        <th>Cell Number</th>
                        <td>{{ $claim->insured->cell}}</td>
                   </tr>
                </table>
            </div>
            <div class="alert-primary alert">Loss Detail</div>
            <div class="card-box table-responsive">    
                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <tr>
                        <th>Loss Date</th>
                        <td>{{ $claim->lossdetail->loss_date}}</td>
                   </tr>
                   <tr>
                        <th>Loss Time</th>
                        <td>{{ $claim->lossdetail->loss_time}}</td>
                   </tr>
                   <tr>
                        <th>Loss Type</th>
                        <td>{{ $claim->lossdetail->lossType->title}}</td>
                   </tr>
                   <tr>
                        <th>Rreported Date</th>
                        <td>{{ $claim->lossdetail->reported_date}}</td>
                   </tr>
                   <tr>
                        <th>Loss Location</th>
                        <td>{{ $claim->lossdetail->loss_location}}</td>
                   </tr>
                   <tr>
                        <th>Loss Description</th>
                        <td>{{ $claim->lossdetail->loss_description}}</td>
                   </tr>
                   <tr>
                        <th>Loss Country</th>
                        <td>{{ $claim->lossdetail->country}}</td>
                   </tr>
                   <tr>
                        <th>Additional Notes</th>
                        <td>{{ $claim->lossdetail->additional_notes}}</td>
                   </tr>
                </table>
            </div>
            <div class="alert-primary alert">Assignment Information</div>
            <div class="card-box table-responsive">    
                <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <tr>
                        <th>Claim Category</th>
                        <td>{{ $claim->assignmentmethod->claimcategory->title}}</td>
                   </tr>
                   <tr>
                        <th>Assign To : {{ $claim->assingment_method }}</th>
                        <td>
                            @if($claim->assingment_method=='Direct Assign')
                            {{ $claim->assignmentmethod?->assignto?->name}}
                            @endif
                        </td>
                   </tr>
                   <tr>
                        <th>Share With</th>
                        <td>{{ $claim->assignmentmethod?->sharewith?->name}}</td>
                   </tr>
                </table>
            </div>
        </div>
    </div>
</div>