{{-- resources/views/skill/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la Compétence: {{ $skill->name }}</h1>
    <form action="{{ route('skill.update', $skill->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom de la Compétence</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $skill->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
