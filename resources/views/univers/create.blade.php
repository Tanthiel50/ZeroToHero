{{-- resources/views/univers/create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Créer un Nouvel Compétence</h1>
    <form action="{{ route('univers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nom de l'univers</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
@endsection
