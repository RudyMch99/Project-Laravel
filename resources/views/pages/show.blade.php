@extends('layouts.app')

@section('content')

    @if(isset($post))

        <div class="card text-center">
            {{-- <img src="..." class="card-img-top" alt="..."> import img later--}}
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text opacity-75">{{ $post->description }}</p>
            <div class="card-footer text-muted">{{ $post->created_at->format('d/m/Y') }}</div>
        </div>


            {{-- <a href='{{route('posts.edit', $post->id)}}' title="Modifier l'article" 
                class="ms-auto btn text-warning"><i class="bi bi-pencil"></i></a>
            <form action="{{route('posts.destroy', ['id' => $post->id])}}" method="POST">
            @csrf
                <button type="submit" class="btn text-danger"><i class="bi bi-trash"></i></button>
            </form> --}}



    @endif

@endsection