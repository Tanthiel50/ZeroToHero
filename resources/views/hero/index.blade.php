@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Zero To Hero</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($heroes as $hero)
        <div class="col">
            <div class="card h-100">
            <img src="{{ asset('storage/hero_images/' . $hero->image) }}" alt="hero Image">
                <div class="card-body">
                    <a href="{{ route('hero.show', $hero->id) }}" class="stretched-link">Name: {{ $hero->name }}</a>
                    <p class="card-text">Description: {{ substr($hero->description, 0, 200) }}...</p>
                    <p class="card-text"><small class="text-muted">Gender : {{ $hero->gender }}</small></p>
                    <p class="card-text"><small class="text-muted">Species : {{ $hero->species }}</small></p>
                    <p class="card-text"><small class="text-muted">Univers : {{ $hero->univers->name }}</small></p>
                    <p>Compétences:</p>
                    <ul>
                        @foreach($hero->skills as $skill)
                        <li>{{ $skill->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-between align-items-center my-4">

    </div>
</div>
@endsection