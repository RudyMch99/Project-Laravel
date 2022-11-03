@extends('layouts.app')

@section('content')

<h1>Administration des articles : </h1>


    @if(!$posts->isEmpty())

    <div class="list-group w-auto mb-4">

        @foreach ($posts as $post)
        <div>
            <h6 class="mb-0">{{ $post->title }}</h6>
            <p class="mb-0 opacity-75">{{ $post->description }}</p>
        </div>

        @endforeach
        
    </div>
    @endif

@endsection