@extends('layouts.master')

@section('title', 'Inscription')

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
        <h3>Inscription</h3>
        <form action="{{ route('register') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="lastname">Nom</label>
                <input type="text" class="form-control" id="lastname" placeholder="Votre nom de famille" name="lastname">
            </div>
            <br>
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" id="firstname" placeholder="Votre prénom" name="firstname">
            </div>
            <br>
            <div class="form-group">
                <label for="email">Adresse mail</label>
                <input type="email" class="form-control" id="email" placeholder="Votre adresse mail" name="email">
                <small id="emailHelp" class="form-text text-muted">Cette adresse mail ne sera pas visible par les autres utilisateurs.</small>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Votre mot de passe" name="password">
            </div>
            <br>
            <div class="form-group">
                <label for="password_confirmation">Confirmation du mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" placeholder="Votre confirmation de mot de passe" name="password_confirmation">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">M'inscrire</button>
        </form>
    </article>
@endsection
