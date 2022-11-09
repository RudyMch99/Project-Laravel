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
<div class="d-flex justify-content-end my-2">
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary" type="button">Ajouter un article</a>
</div>

    @if(!$posts->isEmpty())

    <div class="list-group w-auto mb-4">

        @foreach ($posts as $post)

            <div class="d-flex list-group-item list-group-item-action gap-1 py-3 w-100 align-items-center justify-content-between">
                <div>
                    <h5 class="mb-0">{{ $post->title }}</h5>
                    <p class="mb-0 opacity-75">{{ $post->description }}</p>
                    
                    @if ($post->category != null)
                        <p class="category_tag">
                            <small> Catégorie : </small>
                            <span class="btn badge rounded-pill bg-dark text-light">
                                {{ $post->category->name }}
                            </span>
                        </p>
                    @endif

                    @if (!$post->tags->isEmpty())
                    <p class="tag_badge">
                        <small>Tags : </small>
                        @foreach ($post->tags as $tag)
                            <span class="btn badge rounded-pill bg-info text-light">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </p>
                    @endif
                </div>
                @if ($post->image)
                <div class="ms-auto">
                    <img src="/images/{{ $post->image }}" width="100px" height="75px" >
                </div>
                @endif

                <small class="ms-auto opacity-50 text-nowrap">{{ $post->created_at->format('d/m/Y') }}</small>
                @if ($post->published)
                    <span class="badge bg-success">publié</span>
                     @else 
                     <span class="badge bg-warning">non-publié</span>
                @endif

                <a href='{{route('admin.posts.edit', $post->id)}}' title="Modifier l'article" 
                    class=" btn text-primary"><i class="bi bi-pencil"></i></a>
                <form action="{{route('admin.posts.destroy', ['id' => $post->id])}}" method="POST">
                @csrf

                @method('delete')

                    <button type="submit" class="btn text-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer cet article?')) {return false;}"><i class="bi bi-trash"></i></button>
                </form>
            </div>

        @endforeach
        
    </div>
    @endif

@endsection
