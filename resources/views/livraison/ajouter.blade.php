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
        <li class="breadcrumb-item active">Nouvelle inscription</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section dashboard">

    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Formulaire inscription livraison -->

          <div class="col-12">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">Ajout d'une livraison </h5>

              <form method="POST" action="{{route('livraison.store')}}" class="row g-3" enctype="multipart/form-data">
                @csrf
              <div class="col-md-6">
                <label for="inputName5" class="form-label">date_livraison </label>
                <input type="date" class="form-control" name="date_livraison">
              </div>
              @csrf
              <div class="col-md-6">
                <label for="inputEmail5" class="form-label">statut</label>
                <input type="text" class="form-control" name="statut">
              </div>

              <div class="col-md-6">
                <label for="inputPassword5" class="form-label">adresse</label>
                <input type="text" class="form-control" name="adresse">
              </div>

              <div class="col-md-6">
                <label for="inputPassword5" class="form-label">frais_livraison</label>
                <input type="number" class="form-control" name="frais_livraison">
              </div>

              <div class="col-md-6">
                <label for="inputPassword5" class="form-label">tranporteur</label>
                <input type="text" class="form-control" name="tranporteur">
              </div>

              <div class="col-md-6">
                <label for="inputPassword5" class="form-label">delais_livraison</label>
                <input type="text" class="form-control" name="delais_livraison">
              </div>

              <div class="col-md-6">
                <label for="" class="form-label">Choisir une commande</label>
                <select class="form-control"   name="commandes_id">
                    <option>Selectionner une commande</option>
                    @foreach ($commandes as $com)
                    <option value="{{$commande->id}}">{{$commande->nom_commande}} </option>
                @endforeach
                </select>
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
          <!-- End Formulaire inscription livraison -->

        </div>
      </div>
      <!-- End Left side columns -->

    </div>
  </section>


@endsection



