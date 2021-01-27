<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lier un tag à un article') }}
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-5 m-5">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Tags') }}
                            </h2>
                            <table class="table" id="table_index_tag">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>title</th>
                                    <th>slug</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->title }}</td>
                                        <td>{{ $tag->slug }}</td>
                                        <td>{{ $tag->created_at }}</td>
                                        <td>{{ $tag->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-5 m-5">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Articles') }}
                            </h2>
                            <table class="table" id="table_index_article">
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{ $article->id }}</td>
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
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                            {{ __('Liers par id') }}
                        </h2>
                        <form action="{{route('tag_article.sync')}}" method="POST">
                            @csrf <!-- {{ csrf_field() }} -->
                            <div class="row d-flex justify-content-center mb-5">
                                <div class="col-2 m-3">
                                    <label for="tag" class="col-12">id tag</label>
                                    <input type="number" id="tag" name="tag" class="float-right col-12" required>
                                </div>
                                <div class="col-2 m-3">
                                    <label for="article" class="col-12">id article</label>
                                    <input type="number" id="article" name="article" class="float-left col-12" required>
                                </div>
                                <div class="col-2 m-3">
                                    <label for="" class="col-12"></label>
                                    <input type="submit" class="float-left col-12" value="lier">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>


