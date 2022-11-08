@extends('layouts.app')

@section('content')

@include('partials.validation')

<form name="add-blog-post-form" id="add-blog-post-form" method="POST" enctype="multipart/form-data" action="{{route('admin.posts.store')}}">
  @csrf
    <div class="mb-3">
      <label for="ArticleTitle" class="form-label">Titre de l'article</label>
      <input type="title" name="title" class="form-control" id="ArticleTitle" aria-describedby="ArticleTitle">
    </div>
    <div class="mb-3">
      <label for="ContentArticle" class="form-label">Contenu de l'article</label>
      <textarea class="form-control" name="description" id="ContentArticle" rows="3"></textarea>
    </div>
    <select class="form-select mb-3" aria-label="Selection catégorie" name="category_id">
      <option selected>Sélectionner une catégorie</option>
      @foreach ($categories as $category)
      <option 

        value="{{$category->id}}" 

        @if ($category->id == old('category_id', $category->id))

        selected

      @endif>{{$category->name}}</option>
      @endforeach
    </select>

        <div class="image mb-3">
          <input type="file" class="form-control" required name="image">
        </div>

    <div class="mb-3 form-check">
      <input name="published" type="hidden" value="0">
      <input class="form-check-input" name="published" id="published" type="checkbox" value="1">
      <label class="form-check-label" for="published">
        Publié
      </label>
    </div>
    <div class="mb-3 send_form_button">
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>

  </form>

  @endsection