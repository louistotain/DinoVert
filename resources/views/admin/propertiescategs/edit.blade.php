<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catégories Biens') }} > edit
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            {!! Form::model($propertiescateg, ['method' => 'PUT', 'route' => ['propertiescategs.update','propertiescateg' => $propertiescateg->id]])!!}

                            <div class="m-2">
                                <label for="price" style="font-weight: bold;">Nom :</label>
                                {{Form::text('name',null)}}
                            </div>

                            <div class="col-12 m-2 mt-4">
                                {{Form::submit('Envoyer')}}
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>


