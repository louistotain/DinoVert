@extends('welcome')
@section('content')

    <div class="row p-4 d-flex justify-content-around w-100">
        <div class="col-12 row">

            <div class="col-12">
                <img style="width: 700px; height: 400px;" src="{{ $article->url_picture }}">
            </div>

            <h5 class="col-12">{{ $article->title }}</h5>

            @foreach($articlescategs as $articlescateg)
                @if($article->articlescategs_id == $articlescateg->id)
                    <p class="col-12">{{ $articlescateg->name }}</p>
                @endif
            @endforeach

            <p class="col-12">
                @foreach($article->tags as $tag)
                    {{ $tag->title.' ' ?? 'Pas de tags'}}
                @endforeach
            </p>

            <p class="col-12">{{ $article->description }}</p>

        </div>
    </div>

@endsection

