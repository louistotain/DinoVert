<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Photos Biens') }} > edit
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">
                            {!! Form::model($picture, ['method' => 'PUT', 'route' => ['pictures.update','picture' => $picture->id]])!!}

                            <table class="table" id="table_edit_create">
                                <thead>
                                <tr>
                                    <th>url</th>
                                    <th>envoyer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{Form::text('url',null)}}</td>
                                    <td>{{Form::submit('Envoyer')}}</td>
                                </tr>
                                </tbody>
                            </table>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>


