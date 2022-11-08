@extends('layouts.app')

@section('content')

@include('partials.validation')

<div class="d-flex justify-content-end my-2">
    <a href="{{route('admin.tags.create')}}" class="btn btn-primary" type="button">Ajouter un tag</a>
</div>

<form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{route('admin.tags.store')}}">
  @csrf
    <div class="mb-3">
      <label for="TagName" class="form-label">Nom du tag</label>
      <input type="title" name="name" class="form-control" id="TagName" aria-describedby="TagName">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>

  @endsection