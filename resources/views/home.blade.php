@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                @guest
                <div class="card-header">{{ __('Vous n\'êtes pas connecté') }}</div>

                <div class="card-body">
                    @if (Route::has('login'))
                    <li class="">
                        <a class="" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="">
                        <a class="" href="{{ route('register') }}">{{ __('Enregistrement') }}</a>
                    </li>
                    @endif
                </div>
                @else
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection
