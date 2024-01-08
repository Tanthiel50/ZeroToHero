{{-- resources/views/hero/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Héros: {{ $hero->name }}</h1>
    <form action="{{ route('hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="image" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $hero->name }}" required>
        </div>


        <div class="mb-3">
        <label for="image" class="form-label">Image (URL)</label>
    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image">

    @error('image')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Genre</label>
            <input type="text" class="form-control" id="gender" name="gender" value="{{ $hero->gender }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $hero->description }}" required>
        </div>

        <div class="mb-3">
            <label for="species" class="form-label">Espece</label>
            <input type="text" class="form-control" id="species" name="species" value="{{ $hero->species }}" required>
        </div>

        <div class="mb-3">
            <label for="univers" class="form-label">Univers</label>
            <select class="form-control" id="univers" name="univers_id">
                @foreach($universes as $univers)
                <option value="{{ $univers->id }}" {{ $hero->univers_id == $univers->id ? 'selected' : '' }}>
                    {{ $univers->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Compétences</label>
            @foreach($skills as $skill)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $skill->id }}" id="skill{{ $skill->id }}" name="skills[]" {{ in_array($skill->id, $hero->skills->pluck('id')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label" for="skill{{ $skill->id }}">
                    {{ $skill->name }}
                </label>
            </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection