@extends('layouts.app')

@section('content')

@if(isset($post))

<div class="card text-center">
    @if ($post->image != null)
    <img src="/images/{{ $post->image }}" class="card-img-top">
    @endif

    <div class="card-body">
        <h5 class="card-title">
            {{ $post->title }}
        </h5>
        <p class="card-text opacity-75">
            {{ $post->description }}
        </p>
        <p class="category_tag">
            Catégorie :
            <a class="btn badge rounded-pill bg-dark text-light"
                href="{{route('categories.home', ["category"=>$post->category->id])}}" name="filterByCategory">
                {{ $post->category->name ?? '' }}
            </a>
        </p>

        @if (!$post->tags->isEmpty())
        <p class="tag_badge">
            <small>Tags :</small>

            @foreach ($post->tags as $tag)
            <a class="btn badge rounded-pill bg-info text-dark" href="{{route('tags.home', ["tag"=>$tag->id])}}"
                name="filterByTag">
                {{ $tag->name }}
            </a>
            @endforeach

        </p>
        @endif
    </div>

    <div class="card-footer text-muted">
        Article créé le :
        {{ $post->created_at->format('d/m/Y') }}
    </div>

</div>

@endif

@endsection
