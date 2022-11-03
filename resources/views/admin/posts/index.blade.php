@extends('layouts.app')

@section('content')

@if(Session::has('success')) 
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
@endif


<div class="mb-4">
    <h1>Administration des articles :</h1>
</div>

    @if(!$posts->isEmpty())

    <div class="list-group w-auto mb-4">

        @foreach ($posts as $post)

            <div class="d-flex list-group-item list-group-item-action gap-3 py-3 w-100 align-items-center justify-content-between">
                <div>
                    <h5 class="mb-0">{{ $post->title }}</h5>
                    <p class="mb-0 opacity-75">{{ $post->description }}</p>
                    <small class="opacity-50 text-nowrap">{{ $post->created_at->format('d/m/Y') }}</small>
                </div>

                    <a href='{{route('posts.edit', $post->id)}}' title="Modifier l'article" class="ms-auto btn btn-outline-warning">Modifier</a>
                    <form action="{{route('posts.destroy', ['id' => $post->id])}}" method="POST">
                    @csrf
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>

            </div>

        @endforeach
        
    </div>
    @endif

@endsection
