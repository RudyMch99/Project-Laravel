@extends('layouts.app')

@section('content')

<form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{route('admin.tags.update', $tag->id)}}">
  @csrf

  @method('put')
  
    <div class="mb-3">
      <label for="TagName" class="form-label">Nom du tag</label>
      <input value="{{old('name', $tag->name)}}" type="title" name="name" class="form-control" id="TagName" aria-describedby="TagName">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
  </form>


  @endsection