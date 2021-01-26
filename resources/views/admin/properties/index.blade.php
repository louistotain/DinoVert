<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Biens') }}
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            <a class="btn btn-light" href="{{route('properties.create')}}" role="button"
                               style="border-color: #9ca3af; float: right; margin-bottom: 10px;">Créer un nouveau bien</a>

                            <table class="table" id="table_properties">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>price</th>
                                    <th>location</th>
                                    <th>m²</th>
                                    <th>pieces</th>
                                    <th>state</th>
                                    <th>year_construction</th>
                                    <th>description</th>
                                    <th>propertiescategs_id</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($properties as $property)
                                    <tr>
                                        <td>
                                            <a style="color: #0d6efd; text-decoration: underline;" href="{{route('properties.show', ['property' => $property->id])}}">{{ $property->id }}</a>
                                        </td>
                                        <td>{{ $property->price }}</td>
                                        <td>{{ $property->location }}</td>
                                        <td>{{ $property->m² }}</td>
                                        <td>{{ $property->pieces }}</td>
                                        <td>{{ $property->state }}</td>
                                        <td>{{ $property->year_construction }}</td>
                                        <td>{{ $property->description }}</td>
                                        <td>{{ $property->propertiescategs_id }}</td>
                                        <td>{{ $property->created_at }}</td>
                                        <td>{{ $property->updated_at }}</td>
                                        <td>

                                            {!!Form::open(['method' => 'DELETE', 'route' => ['properties.destroy', $property->id]])!!}
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


