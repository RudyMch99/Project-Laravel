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

<section class="wrapper">
    <div class="content" id="LastPosts">
        <div class="container">
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

            <div class="row">
                @if(!$posts->isEmpty())

                @foreach ($posts as $post)
                <div class="col-xs-12 col-sm-4">

                    <div class="card d-flex">
                        @if ($post->image == null)

                        <div class="img-card">
                            <p class="text-center fst-italic"> Image non disponible </p>
                        </div>

                        @else

                        <img src="/images/{{ $post->image }}" class="img-card" />

                        @endif

                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="{{route('pages.show', ["id"=>$post->id, "slug"=>$post->slug])}}">
                                    {{ $post->title }}
                                </a>
                            </h4>
                            <p class="">
                                {{ $post->description }}
                            </p>
                            <p class="category_tag">
                                <small>Catégorie :</small>
                                <a class="btn badge rounded-pill bg-dark"
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
                        </div>
                        <div class="card-read-more d-grid text-center mt-auto">
                            <a href="{{route('pages.show', ["id"=>$post->id, "slug"=>$post->slug])}}"
                                class="btn text-primary">
                                Lire Plus
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


            @endif

        </div>
    </div>
</section>

@endsection
