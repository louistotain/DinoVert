<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            <a class="btn btn-light" href="{{route('articles.create')}}" role="button"
                               style="border-color: #9ca3af; float: right; margin-bottom: 10px;">Créer un nouvel article</a>

                            <table class="table" id="table_index">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>Url photo</th>
                                    <th>Tags</th>
                                    <th>Catégorie</th>
                                    <th>Date création</th>
                                    <th>Date maj</th>
                                    <th>Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>
                                            <a style="color: #0d6efd; text-decoration: underline;" href="{{route('articles.show', ['article' => $article->id])}}">{{ $article->id }}</a>
                                        </td>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ Str::limit($article->description, 20) }}</td>
                                        <td>{{ $article->slug }}</td>
                                        <td>{{ $article->url_picture }}</td>
                                        <td>
                                            @foreach($article->tags as $tag)
                                                {{ $tag->title.' / ' ?? 'Pas de tags'}}
                                            @endforeach
                                        </td>

                                        @foreach($articlescategs as $articlescateg)
                                            @if($article->articlescategs_id == $articlescateg->id)
                                                <td>{{ $articlescateg->name }}</td>
                                            @endif
                                        @endforeach


                                        <td>{{ $article->created_at }}</td>
                                        <td>{{ $article->updated_at }}</td>
                                        <td>

                                            {!!Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $article->id]])!!}
                                            {{Form::submit('Supprimer')}}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>


