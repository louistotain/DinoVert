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

                            <table class="table" id="table_index">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Prix</th>
                                    <th>Adresse</th>
                                    <th>m²</th>
                                    <th>Nb pieces</th>
                                    <th>Etat</th>
                                    <th>Année construction</th>
                                    <th>Description</th>
                                    <th>Catégorie</th>
                                    <th>Date création</th>
                                    <th>Date maj</th>
                                    <th>Supprimer</th>
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
                                        <td>{{ Str::limit($property->description, 20) }}</td>

                                        @foreach($propertiescategs as $propertiescateg)
                                            @if($property->propertiescategs_id == $propertiescateg->id)
                                                <td>{{ $propertiescateg->name }}</td>
                                            @endif
                                        @endforeach

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


