@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
        <h1>Mon compte</h1>

        <h3 class="pb-3">Modifier mes informations</h3>
        <div class="row">
            <form action="{{ route('user.update', $user) }}" class="col-4 mx-auto" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="pseudo">Nouveau pseudo</label>
                    <input required type="text" class="form-control" placeholder="modifier" name="pseudo" value="{{ $user->pseudo }}" id="pseudo">
                </div>
                <div class="from-group">
                    <label for="image">Nouvelle image</label>
                    <input type="text" required class="form-control" placeholder="modifier" name="image" value="{{ $user->image }}" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
            <form action="{{route('user.destroy', $user)}}" method="post">
                @csrf
                @method("delete")
                <button class="btn btn-danger" type="submit">supprimer le compte</button>
            </form>
        </div>

    </main>
@endsection