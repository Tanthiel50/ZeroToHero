@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">
        <h1>Mon compte</h1>

        <h3 class="pb-3">Modifier mes informations</h3>
        <div class="row">
        <form action="{{ route('user.update', $user) }}" class="col-4 mx-auto" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="pseudo">Nouveau pseudo</label>
                    <input type="text" required class="form-control" placeholder="modifier" name="pseudo" value="{{ $user->pseudo }}" id="pseudo">
                </div>
                <div class="from-group">
                    <label for="image">Image actuelle</label>
                    <img class="profile-image" src="{{ asset('storage/profile_images/' . $user->image) }}" alt="Profile Image">
                    
                </div>
                <div class="from-group">
                    <label for="image">Nouvelle image</label>
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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