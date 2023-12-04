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
            <h5 class="card-title">Liste des clients</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">nom</th>
                  <th scope="col">prenom</th>
                  <th scope="col">contact</th>
                  <th scope="col">Actions </th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $clients as $cl )

                <tr>
                  <td>{{ $cl->id }}</td>
                  <td>{{ $cl->nom }}</td>
                  <td>{{ $cl->prenom }}</td>
                  <td>{{ $cl->contact }}</td>
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




