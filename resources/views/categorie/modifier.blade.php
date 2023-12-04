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
        <li class="breadcrumb-item active">Nouvelle categorie</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section dashboard">

    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Formulaire ajout d'une categoriet -->

          <div class="col-12">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">ajout d'une nouvelle categorie</h5>

              <form method="POST" action="{{route('categorie.update', $categories->id )}}" class="row g-3">
                @method('PATCH')
                @csrf

                <div class="col-md-6">
                    <label for="inputName5" class="form-label">categorie_id</label>
                    <input type="text" class="form-control" name="categorie_id"  value="{{ $categories->categorie_id}}">
                  </div>

                  <div class="col-md-6">
                    <label for="inputName5" class="form-label">libelle</label>
                    <input type="text" class="form-control" name="libelle"  value="{{ $categories->libelle}}">
                  </div>
                  @csrf

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
          <!-- End Formulaire d'un nouveau Categorie -->

        </div>
      </div>
      <!-- End Left side columns -->

    </div>
  </section>
  @include('require.footer')

@endsection

