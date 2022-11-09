@extends('layouts.app')

@section('content')


@if(Route::is('pages.home') )
<div class="px-4 py-5 my-5 text-center">
    <img class="d-inline-block mb-3"
        src="https://www.creative-formation.fr/wp-content/themes/creative-formation/assets/lettre-creative.svg"
        alt="Le C du logo Créative Formation" style="width: 50px">
    <h1 class="display-5 fw-bold">Bienvenue sur le blog de Créative</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Retrouvez-ici nos dernières actualités !</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a class="btn btn-primary btn-lg px-4 gap-3" href="#LastPosts">Accédez aux actualités</a>
        </div>
    </div>
</div>

        <h2 class="mb-4">Les derniers articles : </h2>
    @elseif(Route::is('categories.home') )
        <h2 class="mb-4">Les derniers articles pour la catégorie : {{ $category->name }} </h2>
    @elseif(Route::is('tags.home') )
        <h2 class="mb-4">Les derniers articles pour le tag : {{ $tag->name }} </h2>
@endif

<div class="d-flex justify-content-end my-2">
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary" type="button">Ajouter un post</a>
</div>


<div class=" gap-2 w-100 justify-content-between">
    @if($posts->isEmpty())
    <div>
        <h6 class="mb-0">Aucun articles en ligne</h6>
    </div>
    @endif
</div>
</a>


@if(!$posts->isEmpty())

<div class="row row-cols-1 row-cols-md-3 g-4">

    @foreach ($posts as $post)

    <div class="col">
        <div class="card shadow-sm h-100">

            @if ($post->image == null)

            <img src="" class="card-img-top bg-secondary" height="200px" width="300px" />

            @else

            <img src="/images/{{ $post->image }}" class="card-img-top" />

            @endif

            <div class="card-body d-flex flex-column">

                <h5 class="card-title">{{ $post->title }}</h5>

                <p class="card-text">
                    {{ $post->description }}
                </p>

                <div class="bottom_align_card mt-auto">

                    <p class="category_tag">
                        Catégorie :
                        <a class="btn badge rounded-pill bg-dark text-light"
                            href="{{route('categories.home', ["category"=>$post->category->id])}}"
                            name="filterByCategory">
                            {{ $post->category->name ?? '' }}
                        </a>
                    </p>

                    @if (!$post->tags->isEmpty())

                    <p class="tag_badge">
                        <small>Tags :</small>

                        @foreach ($post->tags as $tag)

                        <a class="btn badge rounded-pill bg-info text-dark"
                            href="{{route('tags.home', ["tag"=>$tag->id])}}" name="filterByTag">
                            {{ $tag->name }}
                        </a>

                        @endforeach

                    </p>
                    @endif

                    <a href="{{route('pages.show', ["id"=>$post->id, "slug"=>$post->slug])}}"
                        class="btn btn-primary w-50 shadow-sm">Voir l'article</a>

                </div>
            </div>
            <div class="card-footer">
                <small class="text-muted">Dernière modification le {{ $post->created_at->format('d/m/Y') }}</small>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif




@endsection
