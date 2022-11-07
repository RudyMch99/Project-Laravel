@extends('layouts.app')

@section('content')

@include('partials.validation')

<div class="d-flex justify-content-end my-2">
    <a href="{{route('admin.categories.create')}}" class="btn btn-primary" type="button">Ajouter une catégorie</a>
</div>

<form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{route('admin.categories.store')}}">
  @csrf
    <div class="mb-3">
      <label for="CategoryName" class="form-label">Nom de la categorie</label>
      <input type="title" name="name" class="form-control" id="CategoryName" aria-describedby="CategoryName">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>

  @endsection