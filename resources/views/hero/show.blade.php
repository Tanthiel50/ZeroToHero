{{-- resources/views/hero/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Héros: {{ $hero->name }}</h1>
    <div>
        <p><strong>Image:</strong> <img src="{{ $hero->image }}" alt="{{ $hero->name }}"></p>
        <p><strong>Genre:</strong> {{ $hero->gender }}</p>
        <p><strong>Espèce:</strong> {{ $hero->species }}</p>
        <p><strong>Description:</strong> {{ $hero->description }}</p>
        <p><strong>Univers:</strong> {{ $hero->univers->name }}</p>
        <p><strong>Compétences:</strong></p>
        <ul>
            @foreach($hero->skills as $skill)
                <li>{{ $skill->name }}</li>
            @endforeach
        </ul>
    </div>
    @if(auth()->check() && auth()->user()->role_id == 2)
    <a href="{{ route('hero.edit', $hero->id) }}" class="btn btn-secondary">Éditer</a>
    <form action="{{route('hero.destroy', $hero)}}" method="post">
        @csrf
        @method("delete")
        <button class="btn btn-danger" type="submit">Supprimer</button>
    </form>
@endif

</div>
@endsection
