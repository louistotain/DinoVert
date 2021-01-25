<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Biens') }} > edit
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            <table class="table" id="table_id">
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
                                    <th>propertiesCategories_id</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($properties as $property)
                                    <tr>
                                        <td>
                                            <a href="{{route('properties.show', ['property' => $property->id])}}">{{ $property->id }}</a>
                                        </td>
                                        <td>{{ $property->price }}</td>
                                        <td>{{ $property->location }}</td>
                                        <td>{{ $property->m² }}</td>
                                        <td>{{ $property->pieces }}</td>
                                        <td>{{ $property->state }}</td>
                                        <td>{{ $property->year_construction }}</td>
                                        <td>{{ $property->description }}</td>
                                        <td>{{ $property->propertiesCategories_id }}</td>
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


