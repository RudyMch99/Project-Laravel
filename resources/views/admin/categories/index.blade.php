@extends('layouts.app')

@section('content')

@if(Session::has('success')) 
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
@endif


<div class="mb-4">
    <h1>Administration des catégories :</h1>
</div>
<div class="d-flex justify-content-end my-2">
    <a href="{{route('admin.categories.create')}}" class="btn btn-primary" type="button">Ajouter une catégorie</a>
</div>

    @if(!$categories->isEmpty())

    <div class="list-group w-auto mb-4">

        @foreach ($categories as $category)

            <div class="d-flex list-group-item list-group-item-action gap-1 py-3 w-100 align-items-center justify-content-between">
                <div>
                    <h5 class="mb-0">{{ $category->name }}</h5>
                </div>
                <div class="ms-auto">
                    <a href='{{route('admin.categories.edit', $category->id)}}' title="modifier la categorie" 
                        class=" btn text-primary"><i class="bi bi-pencil"></i></a>
                </div>
                    <form action="{{route('admin.categories.destroy', ['id' => $category->id])}}" method="POST">
                @csrf

                @method('delete')
                        <button type="submit" class="btn text-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer cette catégorie ?')) {return false;}"><i class="bi bi-trash"></i></button>
                    </form>

            </div>

        @endforeach
        
    </div>
    @endif

@endsection