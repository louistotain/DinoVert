<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catégories Articles') }} > create
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
                                    <th>name</th>
                                    <th>envoyer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    {!! Form::open(['route'=>'articlescategs.store'])!!}
                                    <td>{{Form::text('name',null)}}</td>
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


