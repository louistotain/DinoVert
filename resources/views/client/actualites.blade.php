@extends('welcome')
@section('content')

    <div class="container">

        <div class="row p-4 d-flex justify-content-around">
            <div class="col-12 mb-3"><h4>Actualités</h4></div>
            <div class="col-12 row Items">

                @foreach($articles as $article)

                        <a href="{{route('actualites.details', ['article' => $article->id])}}" class="col-12 col-sm-6 col-lg-3" style="text-decoration: none; color: unset;">

                            <img class="img_Actualites" src="{{ $article->url_picture }}">

                            <h5>{{ $article->title }}</h5>

                            @foreach($articlescategs as $articlescateg)
                                @if($article->articlescategs_id == $articlescateg->id)
                                    <p>{{ $articlescateg->name }}</p>
                                @endif
                            @endforeach

                            <p style="margin-bottom: 1rem;">
                            @foreach($article->tags as $tag)
                                {{ $tag->title.' ' ?? 'Pas de tags'}}
                            @endforeach
                            </p>

                        </a>

                @endforeach

            </div>
        </div>
    </div>

@endsection

