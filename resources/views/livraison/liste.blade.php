@extends('layouts.mainlayouts')

@section('contenu')
<section class="section">
    <div>

    @if (session('status'))
    <div class="alert alert-success">
    {{session('status')}}
    </div>
    @endif

    <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Liste des livraisons</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">date_livraison</th>
                  <th scope="col">statut</th>
                  <th scope="col">adresse</th>
                  <th scope="col">frais_livraison</th>
                  <th scope="col">transporteur</th>
                  <th scope="col">delais_livraison</th>
                  <th scope="col">commandes_id</th>
                  <th scope="col">photo</th>
                  <th scope="col">Actions </th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $livraisons as $livr )

                <tr>
                  <td>{{ $livr->id }}</td>
                  <td>{{ $livr->date_livraison }}</td>
                  <td>{{ $livr->statut }}</td>
                  <td>{{ $livr->adresse }}</td>
                  <td>{{ $livr->frais_livraison }}</td>
                  <td>{{ $livr->transporteur }}</td>
                  <td>{{ $livr->delais_livraison }}</td>
                  <td>{{ $livr->photo}}</td>
                  <td>{{ $livr->commandes_id }}</td>
                  <td>
                    <a href="{{ route('client.edit', $cl->id) }}" > <i class="bi bi-pencil-square"></i></a>
                    <a href="{{ url('supprimer-client/' .$cl->id) }}"> <i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection




