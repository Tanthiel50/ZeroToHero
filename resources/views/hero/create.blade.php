{{-- resources/views/hero/create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un Nouveau Héros</h1>
    <form action="{{ route('hero.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom du Héros</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image (URL)</label>
            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Genre</label>
            <input type="text" class="form-control" id="gender" name="gender" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>

        <div class="mb-3">
            <label for="species" class="form-label">Espece</label>
            <input type="text" class="form-control" id="species" name="species" required>
        </div>

        <div class="mb-3">
            <label for="univers" class="form-label">Univers</label>
            <select class="form-control" id="univers" name="univers_id">
                @foreach($universes as $univers)
                <option value="{{ $univers->id }}">{{ $univers->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Compétences</label>
            @foreach($skills as $skill)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $skill->id }}" id="skill{{ $skill->id }}" name="skills[]">
                <label class="form-check-label" for="skill{{ $skill->id }}">
                    {{ $skill->name }}
                </label>
            </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection