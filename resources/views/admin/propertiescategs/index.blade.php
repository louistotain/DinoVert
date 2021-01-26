<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catégories Biens') }}
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            <a class="btn btn-light" href="{{route('propertiescategs.create')}}" role="button"
                               style="border-color: #9ca3af; float: right; margin-bottom: 10px;">Créer une nouvelle photo</a>

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
                                @foreach($propertiescategs as $propertiescateg)
                                    <tr>
                                        <td>
                                            <a style="color: #0d6efd; text-decoration: underline;" href="{{route('propertiescategs.show', ['propertiescateg' => $propertiescateg->id])}}">{{ $propertiescateg->id }}</a>
                                        </td>
                                        <td>{{ $propertiescateg->name }}</td>
                                        <td>{{ $propertiescateg->slug }}</td>
                                        <td>{{ $propertiescateg->created_at }}</td>
                                        <td>{{ $propertiescateg->updated_at }}</td>
                                        <td>

                                            {!!Form::open(['method' => 'DELETE', 'route' => ['propertiescategs.destroy', $propertiescateg->id]])!!}
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


