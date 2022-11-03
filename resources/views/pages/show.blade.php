@extends('layouts.app')

@section('content')

    @if(isset($post))
        <h1 class="mb-4">{{$post->title}}</h1>
        ​<p>{{$post->description}}</p>
        <small>{{ $post->created_at->format('d/m/Y') }}</small>

        <a href='{{route('posts.edit', $post->id)}}' class="btn btn-warning btn-block" title="Modifier l'article" >Modifier</a>

        <form action="{{route('posts.destroy', ['id' => $post->id])}}" method="POST">
        @csrf
            <button type="submit" class="btn btn-danger btn-block">Supprimer</button>
        </form>
    @endif

@endsection