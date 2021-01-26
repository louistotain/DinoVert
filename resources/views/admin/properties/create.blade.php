<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Biens') }} > create
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            <table class="table" id="table_properties_edit_create">
                                <thead>
                                <tr>
                                    <th>price</th>
                                    <th>location</th>
                                    <th>m²</th>
                                    <th>pieces</th>
                                    <th>state</th>
                                    <th>year_construction</th>
                                    <th>description</th>
                                    <th>propertiesCategories_id</th>
                                    <th>envoyer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    {!! Form::open(['route'=>'properties.store'])!!}
                                    <td>{{Form::text('price',null)}}</td>
                                    <td>{{Form::text('location',null)}}</td>
                                    <td>{{Form::text('m²',null)}}</td>
                                    <td>{{Form::text('pieces',null)}}</td>
                                    <td>{{Form::text('state',null)}}</td>
                                    <td>{{Form::text('year_construction',null)}}</td>
                                    <td>{{Form::text('description',null)}}</td>
                                    <td>{{Form::select('propertiescategs_id', $propertiescategs)}}</td>
                                    <td>{{Form::submit('Envoyer')}}</td>
                                    {!! Form::close() !!}
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


