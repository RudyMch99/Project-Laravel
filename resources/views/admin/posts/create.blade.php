@extends('layouts.app')

@section('content')

<form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{isset($post->id) ? route('posts.update', $post->id) : route('posts.store')}}">
  @csrf
    <div class="mb-3">
      <label for="ArticleTitle" class="form-label">Titre de l'article</label>
      <input value="{{isset($post->title) ? $post->title : old('title')}}" type="title" name="title" class="form-control" id="ArticleTitle" aria-describedby="ArticleTitle">
    </div>
    <div class="mb-3">
      <label for="ContentArticle" class="form-label">Contenu de l'article</label>
      <textarea class="form-control" name="description" id="ContentArticle" rows="3">{{isset($post->description) ? $post->description : old('description')}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>


  @endsection