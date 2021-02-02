<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }} > create
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            {!! Form::open(['route'=>'tags.store'])!!}

                            <div class="m-2">
                                <label for="title" style="font-weight: bold;">Titre :</label>
                                {{Form::text('title',null)}}
                            </div>

                            <div class="col-12 m-2 mt-4">
                                <td>{{Form::submit('Envoyer')}}</td>
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>


