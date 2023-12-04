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
            <h5 class="card-title">Liste des produits</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">designation</th>
                  <th scope="col">prix</th>
                  <th scope="col">quantite</th>
                  <th scope="col">categorie_id</th>
                  <th scope="col">Actions </th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $produits as $prod )

                <tr>
                  <td>{{ $prod->id }}</td>
                  <td>{{ $prod->designation }}</td>
                  <td>{{ $prod->prix }}</td>
                  <td>{{ $prod->quantite }}</td>
                  <td>{{ $prod->categorie_id }}</td>
                  <td>
                    <a href="{{ route('produit.edit', $prod->id) }}" > <i class="bi bi-pencil-square"></i></a>
                    <a href="{{ url('supprimer-produit/' .$prod->id) }}"> <i class="bi bi-trash"></i></a>
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




