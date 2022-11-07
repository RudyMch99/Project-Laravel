@extends('layouts.app')

@section('content')

<form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{route('admin.categories.update', $category->id)}}">
  @csrf

  @method('put')
  
    <div class="mb-3">
      <label for="CategoryName" class="form-label">Nom de la categorie</label>
      <input value="{{old('name', $category->name)}}" type="title" name="name" class="form-control" id="CategoryName" aria-describedby="CategoryName">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
  </form>


  @endsection