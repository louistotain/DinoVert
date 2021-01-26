<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Biens') }} > show
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            <a class="btn btn-light" href="{{route('properties.edit',['property' => $property->id])}}" role="button"
                               style="border-color: #9ca3af; float: right; margin-bottom: 10px;">Modifier ce bien</a>


                            <table class="table" id="table_show">
                                <thead>
                                <tr>
                                    <th>price</th>
                                    <th>location</th>
                                    <th>m²</th>
                                    <th>pieces</th>
                                    <th>state</th>
                                    <th>year_construction</th>
                                    <th>description</th>
                                    <th>propertiescategs_id</th>
                                    <th>created_at</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $property->price }}</td>
                                    <td>{{ $property->location }}</td>
                                    <td>{{ $property->m² }}</td>
                                    <td>{{ $property->pieces }}</td>
                                    <td>{{ $property->state }}</td>
                                    <td>{{ $property->year_construction }}</td>
                                    <td>{{ $property->description }}</td>
                                    <td>{{ $property->propertiescategs_id }}</td>
                                    <td>{{ $property->created_at }}</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>


