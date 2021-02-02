<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }} > create
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

                            {!! Form::open(['route'=>'articles.store', 'id' => 'form'])!!}

                            <div class="m-2">
                                <label for="url_picture" style="font-weight: bold;">Url photo :</label>
                                {{Form::text('url_picture',null)}}
                            </div>

                            <div class="m-2">
                                <label for="title" style="font-weight: bold;">Titre :</label>
                                {{Form::text('title',null)}}
                            </div>

                            <div class="m-2">
                                <label for="description" style="float: left; margin-right: 5px; font-weight: bold;">Description
                                    :</label>
                                {{Form::textarea('description',null)}}
                            </div>

                            <div class="m-2">
                                <label for="catégorie" style="font-weight: bold;">Catégorie :</label>
                                {{Form::select('articlescategs_id', $articlescategs)}}
                            </div>

                            <label for="tag" style="margin: 10px; font-weight: bold;">Tags
                                :</label>
                            <div class="btn btn-light border border-dark btn_tag_plus float-left">+</div>


                            <div class="row" id="tags"></div>


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

    $(".btn_tag_plus").on('click', function () {
        $("#tags").after('<div class="row mb-2"><div class="col-8">' + '{!! Form::select('tags[]', $tags) !!}' + '</div><div class="col-4"><div class="btn btn-light border border-dark btn_tag_moins">-</div></div></div>');
    });

    $(".btn_tag_plus").on('click', function () {
        $(".btn_tag_moins").on('click', function () {
            $(this).parent().parent().remove();
        });
    });

</script>


