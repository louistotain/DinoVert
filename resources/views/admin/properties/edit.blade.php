<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Biens') }} > show
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

                            <div class="col-12 d-flex flex-column">

                                {!! Form::model($property, ['method' => 'PUT', 'route' => ['properties.update','property' => $property->id]])!!}

                                <div class="m-2">
                                    <label for="price" style="font-weight: bold;">Prix :</label>
                                    <input type="text" name="price" value="{{ $property->price }}">
                                </div>

                                <div class="m-2">
                                    <label for="location" style="float: left; margin-right: 5px; font-weight: bold;">Adresse
                                        :</label>
                                    <textarea rows="2" cols="50" name="location"
                                    >{{ $property->location }}</textarea>
                                </div>

                                <div class="m-2">
                                    <label for="m²" style="font-weight: bold;">m² :</label>
                                    <input type="text" name="m²" value="{{ $property->m² }}">
                                </div>

                                <div class="m-2">
                                    <label for="pieces" style="font-weight: bold;">Nombre pièces :</label>
                                    <input type="text" name="pieces" value="{{ $property->pieces }}">
                                </div>

                                <div class="m-2">
                                    <label for="state" style="font-weight: bold;">Etat :</label>
                                    <input type="text" name="state" value="{{ $property->state }}">

                                </div>
                                <div class="m-2">
                                    <label for="year_construction" style="font-weight: bold;">Année de construction
                                        :</label>
                                    <input type="text" name="year_construction"
                                           value="{{ $property->year_construction }}"
                                    >
                                </div>

                                <div class="m-2">
                                    <label for="description" style="float: left; margin-right: 5px; font-weight: bold;">Description
                                        :</label>
                                    <textarea rows="4" cols="50" name="description"
                                    >{{ $property->description }}</textarea>
                                </div>

                                <div class="m-2">
                                    <label for="catégorie" style="font-weight: bold;">Catégorie :</label>
                                    {{Form::select('propertiescategs_id', $propertiescategs)}}
                                </div>

                                <div class="m-2">
                                    <label for="created_at" style="font-weight: bold;">Date création :</label>
                                    <input type="text" name="created_at" value="{{ $property->created_at }}"
                                           disabled>
                                </div>

                                <label for="img" style="margin: 10px; font-weight: bold;">Images
                                    :</label>
                                @foreach($property->pictures as $picture)
                                    <div class="row" id="img">
                                        <div class="col-8">
                                        <textarea rows="1" cols="50" name="url[]" class="m-2"
                                        >{{ $picture->url }}</textarea>
                                        </div>
                                        <div class="col-4">
                                            @if($loop->first)
                                                <div class="btn btn-light border border-dark btn_img_plus float-left">
                                                    +
                                                </div>
                                            @else
                                                <div class="btn btn-light border border-dark btn_img_moins float-left">
                                                    -
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach


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

<script>

    $(".btn_img_plus").on('click', function () {
        $("#img").after("<div class=\"row\" id=\"img\"><div class=\"col-8\"><textarea rows=\"1\" cols=\"50\" name=\"url[]\" class=\"m-2\"></textarea></div><div class=\"col-4\"><div class=\"btn btn-light border border-dark btn_img_moins float-left\">-</div></div></div>");
    });

    $(".btn_img_plus").on('click', function () {
        $(".btn_img_moins").on('click', function () {
            $(this).parent().parent().remove();
        });
    });

    $(".btn_img_moins").on('click', function () {
        $(this).parent().parent().remove();
    });

</script>





