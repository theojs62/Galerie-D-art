@extends('layouts.master')

@section('title', 'Connexion')

@section('main')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <article class="container">
        <h3>Connexion</h3>
        <form action="{{ route('login') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Adresse mail</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Votre adresse mail" name="email">
                <small id="emailHelp" class="form-text text-muted">Cette adresse mail ne sera pas visible par les autres utilisateurs.</small>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Votre mot de passe" name="password">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Me connecter</button>
        </form>
    </article>
@endsection
