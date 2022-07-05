<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <tr>
                    <th>Company Name</th>
                    <td>{{ $insurer->company_name}}</td>
                </tr>
                <tr>
                    <th>Branch</th>
                    <td>{{ $insurer->branch?->title }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $insurer->insurer_address }}</td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>{{ $insurer->insurer_city }}</td>
                </tr>
                <tr>
                    <th>Prov/State</th>
                    <td>{{ $insurer->insurer_province }}</td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>{{ $insurer->insurer_country }}</td>
                </tr>
                <tr>
                    <th>Postal Code</th>
                    <td>{{ $insurer->insurer_postal }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $insurer->insurer_phone }}</td>
                </tr>
                <tr>
                    <th>Fax</th>
                    <td>{{ $insurer->insurer_fax }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $insurer->insurer_email }}</td>
                </tr>
                <tr>
                    <th>Alt Email</th>
                    <td>{{ $insurer->insurer_altemail }}</td>
                </tr>
                <tr>
                   <th>Alt Phone</th>
                    <td>{{ $insurer->insurer_altphone }}</td>
                </tr>
                <tr>
                    <th>Created Date</th>
                    <td>{{ $insurer->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated Date</th>
                    <td>{{ $insurer->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>