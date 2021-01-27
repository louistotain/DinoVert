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
                                    <th>title</th>
                                    <th>description</th>
                                    <th>slug</th>
                                    <th>url_picture</th>
                                    <th>tags</th>
                                    <th>articlescategs_id</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>
                                            <a style="color: #0d6efd; text-decoration: underline;" href="{{route('articles.show', ['article' => $article->id])}}">{{ $article->id }}</a>
                                        </td>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->description }}</td>
                                        <td>{{ $article->slug }}</td>
                                        <td>{{ $article->url_picture }}</td>
                                        <td>
                                            @foreach($article->tags as $tag)
                                                {{ $tag->title.', ' ?? 'Pas de tags'}}
                                            @endforeach
                                        </td>
                                        <td>{{ $article->articlescategs_id }}</td>
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


