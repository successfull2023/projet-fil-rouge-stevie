@extends('layouts.mainlayouts')

@section('contenu')




<div class="pagetitle">

  <div>

    @if (session('status'))
  <div class="alert alert-success">
  {{session('status')}}
  </div>

  @endif
<ul>
@foreach ($errors->all() as $error)
  <li class="alert alert-danger"> {{ $error }}</li>
@endforeach
</ul>
    <h1>Tableau Bord</h1>
    <nav>
      <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="dashboard">Accueil</a></li>
        <li class="breadcrumb-item active">Nouvelle commande</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section dashboard">

    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Formulaire ajout d'une commande -->

          <div class="col-12">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">ajout d'une nouvelle commande</h5>

              <form method="POST" action="{{route('commande.update', $commandes->id )}}" class="row g-3">
                @method('PATCH')
                @csrf

                <div class="col-md-6">
                    <label for="inputName5" class="form-label">date</label>
                    <input type="date" class="form-control" name="date"  value="{{ $commandes->date}}">
                  </div>

                  <div class="col-md-6">
                    <label for="inputName5" class="form-label">montant</label>
                    <input type="number" class="form-control" name="montant"  value="{{ $commandes->montant}}">
                  </div>
                  @csrf
                  <div class="col-md-6">
                    <label for="inputName5" class="form-label">statut</label>
                    <input type="text" class="form-control" name="statut"  value="{{ $commandes->statut}}">
                  </div>

                  <div class="col-md-6">
                    <label for="inputName5" class="form-label">mode_paiement</label>
                    <input type="text" class="form-control" name="mode_paiement"  value="{{ $commandes->mode_paiement}}">
                  </div>

                  <div class="col-md-6">
                    <label for="inputName5" class="form-label">produit_commade</label>
                    <input type="text" class="form-control" name="produit_commane"  value="{{ $commandes->produit_commande}}">
                  </div>

                  <div class="col-md-6">
                    <label for="inputName5" class="form-label">adresse</label>
                    <input type="text" class="form-control" name="adresse"  value="{{ $commandes->adresse}}">
                  </div>

              <div class="col-6 mt-5">
                <input type="file" name="photo" class="form-control" placeholder="photo">
           </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
              </div>
            </form>

              </div>

            </div>
          </div>
          <!-- End Formulaire d'un nouveau Commande -->

        </div>
      </div>
      <!-- End Left side columns -->

    </div>
  </section>
  @include('require.footer')

@endsection

