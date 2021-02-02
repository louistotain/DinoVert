<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }} > show
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            <div class="m-2">
                                <label for="title" style="font-weight: bold;">Titre :</label>
                                <input type="text" name="title" value="{{ $tag->title }}" disabled>
                            </div>

                            <div class="m-2">
                                <label for="slug" style="float: left; margin-right: 5px; font-weight: bold;">Slug :</label>
                                <input type="text" name="slug" value="{{ $tag->slug }}" disabled>
                            </div>

                            <div class="m-2">
                                <label for="created_at" style="font-weight: bold;">Date création :</label>
                                <input type="text" name="created_at" value="{{ $tag->created_at }}" disabled>
                            </div>


                            <div class="col-12 m-2 mt-4">
                                <a class="btn btn-light mr-3"
                                   href="{{route('tags.edit',['tag' => $tag->id])}}"
                                   role="button"
                                   style="border-color: #9ca3af; float: left; margin-bottom: 10px;">Modifier ce tag</a>

                                {!!Form::open(['method' => 'DELETE', 'route' => ['tags.destroy', $tag->id]])!!}
                                {{Form::submit('Supprimer')}}
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>


