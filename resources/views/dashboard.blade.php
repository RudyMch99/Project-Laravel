@extends('layouts.app')

@section('content')

<h1 class="m-4">Dashboard</h1>

    <div class="row h-auto">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administration des articles</h5>
              <p class="card-text">Ajouts, modifications et suppression des articles pour le blog.</p>
              <a href="{{route('admin.posts.index')}}" class="btn btn-primary" type="button">articles</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Adminitration des catégories</h5>
              <p class="card-text">Ajouts, modifications et suppression des catégories pour les articles.</p>
              <a href="#" class="btn btn-primary">EN CONTRUCTION</a>
            </div>
          </div>
        </div>
      </div>

@endsection