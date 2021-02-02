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

                            <div class="col-12 d-flex flex-column">

                                <div class="m-2">
                                    <label for="price" style="font-weight: bold;">Prix :</label>
                                    <input type="text" name="price" value="{{ $property->price }}" disabled>
                                </div>

                                <div class="m-2">
                                    <label for="location" style="float: left; margin-right: 5px; font-weight: bold;">Adresse
                                        :</label>
                                    <textarea rows="2" cols="50" name="location"
                                              disabled>{{ $property->location }}</textarea>
                                </div>

                                <div class="m-2">
                                    <label for="m²" style="font-weight: bold;">m² :</label>
                                    <input type="text" name="m²" value="{{ $property->m² }}" disabled>
                                </div>

                                <div class="m-2">
                                    <label for="pieces" style="font-weight: bold;">Nombre pièces :</label>
                                    <input type="text" name="pieces" value="{{ $property->pieces }}" disabled>
                                </div>

                                <div class="m-2">
                                    <label for="state" style="font-weight: bold;">Etat :</label>
                                    <input type="text" name="state" value="{{ $property->state }}" disabled>

                                </div>
                                <div class="m-2">
                                    <label for="year_construction" style="font-weight: bold;">Année de construction
                                        :</label>
                                    <input type="text" name="year_construction"
                                           value="{{ $property->year_construction }}"
                                           disabled>
                                </div>

                                <div class="m-2">
                                    <label for="description" style="float: left; margin-right: 5px; font-weight: bold;">Description
                                        :</label>
                                    <textarea rows="4" cols="50" name="description"
                                              disabled>{{ $property->description }}</textarea>
                                </div>

                                @foreach($propertiescategs as $propertiescateg)
                                    @if($property->propertiescategs_id == $propertiescateg->id)
                                        <div class="m-2">
                                            <label for="catégorie" style="font-weight: bold;">Catégorie :</label>
                                            <input type="text" name="catégorie" value="{{ $propertiescateg->name }}"
                                                   disabled>
                                        </div>
                                    @endif
                                @endforeach

                                <div class="m-2">
                                    <label for="created_at" style="font-weight: bold;">Date création :</label>
                                    <input type="text" name="created_at" value="{{ $property->created_at }}"
                                           disabled>
                                </div>

                                <label for="img" style="float: left; margin: 10px; font-weight: bold;">Images
                                    :</label>
                                @foreach($property->pictures as $picture)

                                    <textarea rows="1" cols="50" name="img" class="m-2"
                                              disabled>{{ $picture->url }}</textarea>
                                @endforeach


                                <div class="col-12 m-2 mt-4">
                                    <a class="btn btn-light mr-3"
                                       href="{{route('properties.edit',['property' => $property->id])}}"
                                       role="button"
                                       style="border-color: #9ca3af; float: left; margin-bottom: 10px;">Modifier ce
                                        bien</a>

                                    {!!Form::open(['method' => 'DELETE', 'route' => ['properties.destroy', $property->id]])!!}
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


