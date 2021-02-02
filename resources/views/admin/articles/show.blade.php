<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }} > show
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            <div class="col-12 d-flex flex-column">

                                <div class="m-2">
                                    <label for="title" style="font-weight: bold;">Titre :</label>
                                    <input type="text" name="title" value="{{ $article->title }}" disabled>
                                </div>

                                <div class="m-2">
                                    <label for="slug" style="float: left; margin-right: 5px; font-weight: bold;">Slug
                                        :</label>
                                    <textarea rows="2" cols="50" name="slug"
                                              disabled>{{ $article->slug }}</textarea>
                                </div>

                                <div class="m-2">
                                    <label for="url_picture" style="float: left; margin-right: 5px; font-weight: bold;">Url
                                        photo
                                        :</label>
                                    <textarea rows="2" cols="50" name="url_picture"
                                              disabled>{{ $article->url_picture }}</textarea>
                                </div>


                                <div class="m-2">
                                    <label for="description" style="float: left; margin-right: 5px; font-weight: bold;">Description
                                        :</label>
                                    <textarea rows="4" cols="50" name="description"
                                              disabled>{{ $article->description }}</textarea>
                                </div>


                                @foreach($articlescategs as $articlescateg)
                                    @if($article->articlescategs_id == $articlescateg->id)
                                        <div class="m-2">
                                            <label for="catégorie" style="font-weight: bold;">Catégorie :</label>
                                            <input type="text" name="catégorie" value="{{ $articlescateg->name }}"
                                                   disabled>
                                        </div>
                                    @endif
                                @endforeach

                                <div class="m-2">
                                    <label for="created_at" style="font-weight: bold;">Date création :</label>
                                    <input type="text" name="created_at" value="{{ $article->created_at }}"
                                           disabled>
                                </div>


                                <label for="tags" style="float: left; margin: 10px; font-weight: bold;">Tags :</label>
                                @if($article->tags->isEmpty())
                                    <input type="text" name="tags[]" class="mb-2"
                                           value="Pas de tags"
                                           disabled>
                                @else
                                    @foreach($article->tags as $tag)

                                        <input type="text" name="tags[]" class="mb-2"
                                               value="{{ $tag->title}}"
                                               disabled>

                                    @endforeach
                                @endif


                                <div class="col-12 m-2 mt-4">
                                    <a class="btn btn-light mr-3"
                                       href="{{route('articles.edit',['article' => $article->id])}}"
                                       role="button"
                                       style="border-color: #9ca3af; float: left; margin-bottom: 10px;">Modifier cet article</a>

                                    {!!Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $article->id]])!!}
                                    {{Form::submit('Supprimer')}}
                                    {!! Form::close() !!}
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</x-app-layout>





