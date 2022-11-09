@extends('layouts.app')

@section('content')


@include('partials.validation')

<form name="add-blog-post-form" id="add-blog-post-form" method="POST" enctype="multipart/form-data" action="{{route('admin.posts.update', $post->id)}}">
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

    <select class="form-select mb-3" aria-label="Selection catégorie" name="category_id">
      <option selected>Sélectionner une catégorie</option>
      @foreach ($categories as $category)
      <option 

        value="{{$category->id}}" 

        @if ($category->id == old('category_id', $post->category_id))

        selected

      @endif>{{$category->name}}</option>
      @endforeach
    </select>

    <select class="form-select mb-3" multiple aria-label="multiple select example" name="tags[]">
      @foreach ($tags as $tag)

        <option value="{{$tag->id}}">
        
          {{$tag->name}}
    
        </option>
      @endforeach
    </select>

    <div class="image mb-3">
      <input type="file" class="form-control" name="image">
      <img src="/images/{{old('image', $post->image)}}" class="mt-3" alt="image de l'article" width="200px" height="150px">
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