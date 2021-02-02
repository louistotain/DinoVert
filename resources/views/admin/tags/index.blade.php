<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            <a class="btn btn-light" href="{{route('tags.create')}}" role="button"
                               style="border-color: #9ca3af; float: right; margin-bottom: 10px;">Créer un nouveau tag</a>

                            <table class="table" id="table_index">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Titre</th>
                                    <th>Slug</th>
                                    <th>Date création</th>
                                    <th>Date maj</th>
                                    <th>Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tags)
                                    <tr>
                                        <td>
                                            <a style="color: #0d6efd; text-decoration: underline;" href="{{route('tags.show', ['tag' => $tags->id])}}">{{ $tags->id }}</a>
                                        </td>
                                        <td>{{ $tags->title }}</td>
                                        <td>{{ $tags->slug }}</td>
                                        <td>{{ $tags->created_at }}</td>
                                        <td>{{ $tags->updated_at }}</td>
                                        <td>

                                            {!!Form::open(['method' => 'DELETE', 'route' => ['tags.destroy', $tags->id]])!!}
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


