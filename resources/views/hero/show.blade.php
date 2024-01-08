{{-- resources/views/hero/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails du Héros: {{ $hero->name }}</h1>
    <div>
        <p><strong>Image:</strong> <img src="{{ asset('storage/hero_images/' . $hero->image) }}" alt="hero Image">
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
<h2>Héros Similaires</h2>
<div class="row">
    @foreach($similarHeroes as $similarHero)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ $similarHero->image }}" class="card-img-top" alt="{{ $similarHero->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $similarHero->name }}</h5>
                    <p class="card-text">{{ $similarHero->description }}</p>
                    <a href="{{ route('hero.show', $similarHero->id) }}" class="btn btn-primary">Voir Plus</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
@endsection
