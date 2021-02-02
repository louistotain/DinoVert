<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }} > edit
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            {!! Form::model($tag, ['method' => 'PUT', 'route' => ['tags.update','tag' => $tag->id]])!!}

                            <div class="m-2">
                                <label for="title" style="font-weight: bold;">Titre :</label>
                                {{Form::text('title',null)}}
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


