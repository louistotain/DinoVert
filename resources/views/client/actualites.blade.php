@extends('welcome')
@section('content')

    <div class="container">

        <div class="row p-4 d-flex justify-content-around">
            <div class="col-12 row">

                @foreach($articles as $article)

                        <a href="{{route('actualites.details', ['article' => $article->id])}}" class="col-3" style="text-decoration: none; color: unset;">

                            <img style="width: 300px; height: 200px;" src="{{ $article->url_picture }}">

                            <h5>{{ $article->title }}</h5>

                            @foreach($articlescategs as $articlescateg)
                                @if($article->articlescategs_id == $articlescateg->id)
                                    <p>{{ $articlescateg->name }}</p>
                                @endif
                            @endforeach

                            <p>
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

