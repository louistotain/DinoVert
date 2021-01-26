<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Photos Biens') }} > create
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            <table class="table" id="table_edit_create">
                                <thead>
                                <tr>
                                    <th>url</th>
                                    <th>properties_id</th>
                                    <th>envoyer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    {!! Form::open(['route'=>'pictures.store'])!!}
                                    <td>{{Form::text('url',null)}}</td>
                                    <td>{{Form::select('properties_id', $properties)}}</td>
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


