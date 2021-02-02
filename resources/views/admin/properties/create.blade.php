<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Biens') }} > create
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

                                {!! Form::open(['route'=>'properties.store', 'id' => 'form'])!!}

                                <div class="m-2">
                                    <label for="price" style="font-weight: bold;">Prix :</label>
                                    {{Form::number('price',null)}}
                                </div>

                                <div class="m-2">
                                    <label for="location" style="float: left; margin-right: 5px; font-weight: bold;">Adresse
                                        :</label>
                                    {{Form::textarea('location',null)}}
                                </div>

                                <div class="m-2">
                                    <label for="m²" style="font-weight: bold;">m² :</label>
                                    {{Form::number('m²',null)}}
                                </div>

                                <div class="m-2">
                                    <label for="pieces" style="font-weight: bold;">Nombre pièces :</label>
                                    {{Form::number('pieces',null)}}
                                </div>

                                <div class="m-2">
                                    <label for="state" style="font-weight: bold;">Etat :</label>
                                    {{Form::text('state',null)}}

                                </div>
                                <div class="m-2">
                                    <label for="year_construction" style="font-weight: bold;">Année de construction
                                        :</label>
                                    {{Form::number('year_construction',null)}}
                                </div>

                                <div class="m-2">
                                    <label for="description" style="float: left; margin-right: 5px; font-weight: bold;">Description
                                        :</label>
                                    {{Form::textarea('description',null)}}
                                </div>

                                <div class="m-2">
                                    <label for="catégorie" style="font-weight: bold;">Catégorie :</label>
                                    {{Form::select('propertiescategs_id', $propertiescategs)}}
                                </div>

                                <label for="img" style="margin-right: 5px; font-weight: bold;">Images
                                    :</label>
                                <div class="row" id="img">
                                    <div class="col-8">
                                        {{Form::text('url[]',null)}}
                                    </div>
                                    <div class="col-4">
                                        <div class="btn btn-light border border-dark btn_img_plus float-left">+</div>
                                    </div>
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

<script>

    $(".btn_img_plus").on('click', function () {
        $("#img").after("<div class=\"row mt-1\"><div class=\"col-8\"><input type=\"text\" name=\"url[]\"></div><div class=\"col-4\"><div class=\"btn btn-light border border-dark btn_img_moins\">-</div></div></div>");
    });

    $(".btn_img_plus").on('click', function () {
        $(".btn_img_moins").on('click', function () {
            $(this).parent().parent().remove();
        });
    });

</script>


