@extends('welcome')
@section('content')

    <div class="container">

        <div class="row p-4 d-flex justify-content-around">
            <div class="col-12 mb-3"><h4>Actualités</h4></div>
            <div class="col-12 row Items">

                @foreach($articles as $article)

                    <a href="{{route('actualites.details', ['article' => $article->id])}}" class="row w-100 d-flex mb-5"
                       style="text-decoration: none; color: unset;">

                        <div class="col-12 col-sm-5 col-lg-4">
                            <img class="img_Actualites" src="{{ $article->url_picture }}">
                        </div>


                        <div class="col-12 col-sm-7 col-lg-8 mt-3">
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

                            <p>Description : {{ Str::limit($article->description, 100) }}</p>
                        </div>

                    </a>

                @endforeach

            </div>
        </div>

        <nav class="d-flex justify-content-center align-items-center">
            <ul class="pagination w-100 justify-content-center align-items-center flex-wrap">

                <li class="page-item @if($articles->currentPage() == 1) disabled  @endif">
                    <a class="page-link" href="{{route('actualites', 'page='.($articles->currentPage() - 1) )}}">Précédent</a>
                </li>

                @for($i = 1; $i <= $articles->lastPage(); $i++)
                    @if($i == $articles->currentPage())
                        <li class="page-item active">
                            <a class="page-link" href="{{route('actualites', 'page='.$i )}}">@php echo $i; @endphp <span
                                    class="sr-only">(current)</span></a>
                        </li>
                    @else
                        <li class="page-item"><a class="page-link"
                                                 href="{{route('actualites', 'page='.$i )}}">@php echo $i; @endphp</a>
                        </li>
                    @endif
                @endfor

                <li class="page-item @if($articles->currentPage() == $articles->lastPage()) disabled @endif">
                    <a class="page-link"
                       href="{{route('actualites', 'page='.($articles->currentPage() + 1) )}}">Suivant</a>
                </li>
            </ul>
        </nav>

    </div>

@endsection

