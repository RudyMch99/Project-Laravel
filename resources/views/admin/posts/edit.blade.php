@extends('layouts.app')

@section('content')

<form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{route('admin.posts.update', $post->id)}}">
  @csrf

  @method('put')
  
    <div class="mb-3">
      <label for="ArticleTitle" class="form-label">Titre de l'article</label>
      <input value="{{old('title', $post->title)}}" type="title" name="title" class="form-control" id="ArticleTitle" aria-describedby="ArticleTitle">
    </div>
    <div class="mb-3">
      <label for="ContentArticle" class="form-label">Contenu de l'article</label>
      <textarea class="form-control" name="description" id="ContentArticle" rows="3">{{old('description', $post->description)}}</textarea>
    </div>
    <div class="mb-3 form-check">
      <input name="published" type="hidden" value="0">
      <input class="form-check-input" name="published" id="published" type="checkbox" value="1" @if (old('published', $post->published)) checked @endif >
      <label class="form-check-label" for="published">
        Publié
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
  </form>


  @endsection