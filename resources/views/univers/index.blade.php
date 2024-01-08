{{-- resources/views/univers/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Univers</h1>

    <a href="{{ route('univers.create') }}" class="btn btn-primary mb-3">Ajouter un Univers</a>

    <ul class="list-group">
        @foreach($univers as $univer)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $univer->name }}
                <div>
                    <form action="{{ route('univers.destroy', $univer->id) }}" method="POST" style="display: inline;">
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
