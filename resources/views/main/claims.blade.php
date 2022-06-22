@extends ('layouts.app')

@section('content')
    <div id="container">
        <div id="content">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th href="dossierinfo" scope="col"># Dossier</th>
                    <th scope="col"># Police</th>
                    <th scope="col"># Rec.</th>
                    <th scope="col">Client</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Adresse sinistre</th>
                    <th scope="col">Assureur</th>
                    <th scope="col">Réviseur</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th scope="row">23561</th>
                    <td >Example</td>
                    <td>Data</td>
                    <td>12345</td>
                </tr>

                <tr>
                    <th scope="row">23362</th>
                    <td >Example</td>
                    <td>Data</td>
                    <td>76592</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
