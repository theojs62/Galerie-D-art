@extends("layouts.master")

@section('title', 'Détails du compte')

@section('main')
    <article class="container">
        @if (!empty($visitor))
            <img src="{{ $visitor->link_avatar }}" alt="Avatar" style="margin-bottom: 5rem;">
            <div>
                <h3>Informations générales</h3>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom de famille</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $visitor->firstname_visitor }}</td>
                    <td>{{ $visitor->lastname_visitor }}</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div>
                <h3>Oeuvres favorites</h3>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom de l'oeuvre</th>
                    <th scope="col">Auteur(s)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($artworks as $artwork)
                    <tr>
                        <td>{{ $artwork->name_artwork }}</td>
                        <td>
                            <ul>
                                @foreach($artwork->authors as $author)
                                    <li>{{ $author->lastname_author }} {{ $author->firstname_author }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            @if(isset($commentaries))
                <div>
                    <h3>Commentaires</h3>
                </div>
                @foreach($commentaries as $commentary)
                    <div class="border rounded" style="margin-bottom: 1rem;">
                        <div style="margin: 2rem;">
                            <div>
                                <strong>{{$commentary->title_commentary}}</strong>
                                -
                                <i>
                                    <a
                                        href="{{ route('artworks.show', [$commentary->artwork_id]) }}">
                                        {{ $commentary->artwork->name_artwork }}
                                    </a>
                                </i>
                            </div>
                            <div>
                                {{$commentary->text_commentary}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <i>Aucun commentaire posté</i>
            @endif
            <br><br>
            @if(Auth::user()->id == $visitor->id)
                <div style="display: flex; justify-content: space-around">
                    <a class="btn btn-primary" href="{{ route('visitors.edit', [$visitor->id]) }}">Modifier mon profil</a>
                </div>
            @endif
        @else
            <h1>Le visiteur n'existe pas</h1>
        @endif
    </article>
@endsection
