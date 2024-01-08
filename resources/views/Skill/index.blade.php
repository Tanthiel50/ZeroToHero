{{-- resources/views/skill/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Compétences</h1>

    <a href="{{ route('skill.create') }}" class="btn btn-primary mb-3">Ajouter une Compétence</a>

    <ul class="list-group">
        @foreach($skills as $skill)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $skill->name }}
                <div>
                    <a href="{{ route('skill.edit', $skill->id) }}" class="btn btn-secondary btn-sm">Modifier</a>
                    <form action="{{ route('skill.destroy', $skill->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
