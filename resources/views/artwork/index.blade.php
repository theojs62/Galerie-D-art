@extends('layouts.master')

@section('title', 'Notre collections d\'œuvre d\'art')

@section('main')
    <article class="container">
        <h3>Notre collections d'œuvre d'art</h3>
        <br>
        <div class="border rounded">
            <div style="margin: 2rem;">
                <h4>Options de filtre</h4>
                <br>
                <form action="{{ route('artworks.index') }}" method="GET">
                    <div>
                        <label for="atr">Auteur</label>
                    </div>
                    <br>
                    <select class="form-select" name="atr" id="atr">
                        <option value="All">Tout les auteurs</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->firstname_author }} {{ $author->lastname_author }}</option>
                        @endforeach
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                </form>
            </div>
        </div>
        <div class="border rounded">
            <div style="margin: 2rem; display: flex; justify-content: space-around;">
                <a class="btn btn-primary" href="{{ route('artworks.index') }}?type=recent">Les 5 œuvres les plus récentes</a>
                <a class="btn btn-primary" href="{{ route('artworks.index') }}?type=update">Les 5 œuvres qui ont été mise à jour récemment</a>
            </div>
        </div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom de l'œuvre</th>
                    <th scope="col">Date d'ajout</th>
                    <th scope="col">Date de création</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($artworks as $artwork)
                    <tr>
                        <th scope="row">{{ $artwork->name_artwork }}</th>
                        <td>{{ $artwork->created_at }}</td>
                        <td>{{ $artwork->date_artwork }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('artworks.show', $artwork->id) }}">Voir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>
@endsection
