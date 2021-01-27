<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catégories Articles') }}
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            <a class="btn btn-light" href="{{route('articlescategs.create')}}" role="button"
                               style="border-color: #9ca3af; float: right; margin-bottom: 10px;">Créer une nouvelle catégorie d'article</a>

                            <table class="table" id="table_index">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>slug</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articlescategs as $articlescateg)
                                    <tr>
                                        <td>
                                            <a style="color: #0d6efd; text-decoration: underline;" href="{{route('articlescategs.show', ['articlescateg' => $articlescateg->id])}}">{{ $articlescateg->id }}</a>
                                        </td>
                                        <td>{{ $articlescateg->name }}</td>
                                        <td>{{ $articlescateg->slug }}</td>
                                        <td>{{ $articlescateg->created_at }}</td>
                                        <td>{{ $articlescateg->updated_at }}</td>
                                        <td>

                                            {!!Form::open(['method' => 'DELETE', 'route' => ['articlescategs.destroy', $articlescateg->id]])!!}
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


