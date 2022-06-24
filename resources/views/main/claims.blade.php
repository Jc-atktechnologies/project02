@extends ('layouts.app')

@section('content')


<div class="container-fluid" >
  <div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
        <thead class="bg-secondary text-white">
        <tr>
            <th rowspan="2">Insurer</th>
            <th rowspan="2">Insured</th>
            <th rowspan="2">Claim #</th>
            <th rowspan="2">Date Received</th>
            <th rowspan="2">Loss date</th>
            <th rowspan="2">Loss type</th>
            <th rowspan="2">Status</th>
            <th rowspan="2">Last activity</th>
            <th rowspan="2">File age</th>
            <th rowspan="2">Assigned</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Alfreds Futterkiste</td>
            <td>Maria Anders</td>
            <td>Germany</td>
        </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
  </tbody>
</table>

</div>

</div>

@endsection
