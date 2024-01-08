{{-- resources/views/hero/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-start hero-details">
        <div class="col-md-6">
            <img src="{{ asset('storage/profile_images/' . $hero->image) }}" class="img-fluid hero-image" alt="Image de {{ $hero->name }}">
        </div>
        <div class="col-md-6">
            <h1 class="hero-name">Détails du Héros: {{ $hero->name }}</h1>
            <p class="hero-gender"><strong>Genre:</strong> {{ $hero->gender }}</p>
            <p class="hero-species"><strong>Espèce:</strong> {{ $hero->species }}</p>
            <p class="hero-description"><strong>Description:</strong> {{ $hero->description }}</p>
            <p class="hero-univers"><strong>Univers:</strong> {{ $hero->univers->name }}</p>
            <p class="hero-skills"><strong>Compétences:</strong></p>
            <ul>
                @foreach($hero->skills as $skill)
                <li>{{ $skill->name }}</li>
                @endforeach
            </ul>
            @if(auth()->check() && auth()->user()->role_id == 2)
                <div class="edit-delete-buttons">
                    <a href="{{ route('hero.edit', $hero->id) }}" class="btn btn-secondary">Éditer</a>
                    <form action="{{route('hero.destroy', $hero)}}" method="post">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
    <h2 class="my-4">Héros Similaires</h2>
    <div class="row">
        @foreach($similarHeroes as $similarHero)
        <div class="col-md-4">
            <div class="card similar-hero-card">
                <img src="{{ asset('storage/profile_images/' . $similarHero->image) }}" class="card-img-top" alt="{{ $similarHero->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $similarHero->name }}</h5>
                    <p class="card-text">{{ substr($similarHero->description, 0, 100) }}...</p>
                    <a href="{{ route('hero.show', $similarHero->id) }}" class="btn btn-primary">Voir Plus</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
