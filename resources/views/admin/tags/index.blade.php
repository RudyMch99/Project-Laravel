@extends('layouts.app')

@section('content')

@if(Session::has('success')) 
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
@endif


<div class="mb-4">
    <h1>Administration des tags :</h1>
</div>
<div class="d-flex justify-content-end my-2">
    <a href="{{route('admin.tags.create')}}" class="btn btn-primary" type="button">Ajouter un tag</a>
</div>

    @if(!$tags->isEmpty())

    <div class="list-group w-auto mb-4">

        @foreach ($tags as $tag)

            <div class="d-flex list-group-item list-group-item-action gap-1 py-3 w-100 align-items-center justify-content-between">
                <div>
                    <h5 class="mb-0">{{ $tag->name }}</h5>
                </div>
                <div class="ms-auto">
                    <a href='{{route('admin.tags.edit', $tag->id)}}' title="modifier le tag" 
                        class=" btn text-primary"><i class="bi bi-pencil"></i></a>
                </div>
                    <form action="{{route('admin.tags.destroy', ['id' => $tag->id])}}" method="POST">
                @csrf

                @method('delete')
                        <button type="submit" class="btn text-danger" onclick="if(!confirm('Voulez-vous vraiment supprimer ce tag ?')) {return false;}"><i class="bi bi-trash"></i></button>
                    </form>

            </div>

        @endforeach
        
    </div>
    @endif

@endsection