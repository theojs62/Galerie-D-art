@extends("layouts.master")

@section('title', 'Détails de l\'oeuvre')

@section('main')
    <article class="container">
        @if (!empty($artwork))
            <div>
                <h3>Informations</h3>
                {{--<h3>Auteur(s) de l'oeuvre : {{ $artworks->authors }}</h3>--}}
            </div>
            <img src="{{ $artwork->link_artwork }}" alt="Image de l'oeuvre">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date d'ajout</th>
                        <th scope="col">Auteur(s)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$artwork->id}}</th>
                        <td>{{$artwork->name_artwork}}</td>
                        <td>{{$artwork->description_artwork}}</td>
                        <td>{{$artwork->date_artwork}}</td>
                        <td>
                            <ul>
                                @foreach($artwork->authors as $authors)
                                    <li>{{$authors->firstname_author}}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            @if(Auth::check())
                @if($IsFavorite)
                    <a href="{{ route('artworks.show', [$artwork->id]) }}?type=remove" class="btn btn-primary">
                        Retirer des favoris
                    </a>
                @else
                    <a href="{{ route('artworks.show', [$artwork->id]) }}?type=add" class="btn btn-primary">
                        Ajouter aux favoris
                    </a>
                @endif
            @endif
            <br><br>
            <h4>Commentaires</h4>
            @foreach($commentaries as $commentary)
                <div class="border rounded" style="margin-bottom: 1rem;">
                    <div style="margin: 2rem;">
                        <div>
                            <strong>{{$commentary->title_commentary}}</strong>
                            -
                            <i>
                                @if(Auth::check())
                                <a
                                    href="{{ route('visitors.show', [$commentary->visitor_id]) }}">
                                    {{ $commentary->visitor->firstname_visitor }} {{ $commentary->visitor->lastname_visitor }}
                                @endif
                                    @if(!Auth::check())
                                        (connectez-vous pour voir le profil)
                                    @endif
                                @if(Auth::check())
                                </a>
                                @endif
                            </i>
                        </div>
                        <div>
                            {{$commentary->text_commentary}}
                        </div>
                    </div>
                </div>
            @endforeach


        @else
            <h1>L'œuvre n'existe pas</h1>
        @endif
    </article>
@endsection
