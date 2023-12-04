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
            <h5 class="card-title">Liste des commande</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">date</th>
                  <th scope="col">montant</th>
                  <th scope="col">statut</th>
                  <th scope="col">mode_paiement</th>
                  <th scope="col">produit_commande</th>
                  <th scope="col">adresse</th>
                  <th scope="col">Actions </th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $commandes as $com )

                <tr>
                  <td>{{ $com->id }}</td>
                  <td>{{ $com->date }}</td>
                  <td>{{ $com->montant }}</td>
                  <td>{{ $com->statut }}</td>
                  <td>{{ $com->mode_paiement }}</td>
                  <td>{{ $com->produit_commande }}</td>
                  <td>{{ $com->adresse }}</td>
                  <td>
                    <a href="{{ route('commande.edit', $com->id) }}" > <i class="bi bi-pencil-square"></i></a>
                    <a href="{{ url('supprimer-commande/' .$com->id) }}"> <i class="bi bi-trash"></i></a>
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




