@extends('welcome')
@section('content')

    <div class="row p-4 d-flex justify-content-around w-100" style="padding: 0 !important; margin: 20px 0 !important;">
        <div class="col-12 row ItemsDetails d-flex justify-content-around">

            <div class="col-12 d-flex justify-content-around mb-4">
                <img style="width: 700px; height: 400px;" src="{{ $article->url_picture }}">
            </div>

            <h5 class="col-12">{{ $article->title }}</h5>

            @foreach($articlescategs as $articlescateg)
                @if($article->articlescategs_id == $articlescateg->id)
                    <p class="col-12">Catégorie : {{ $articlescateg->name }}</p>
                @endif
            @endforeach

            <p class="col-12">
                @foreach($article->tags as $tag)
                    Tags : {{ $tag->title.' ' ?? 'Pas de tags'}}
                @endforeach
            </p>

            <p class="col-12">Description : {{ $article->description }}</p>

        </div>
    </div>

@endsection

