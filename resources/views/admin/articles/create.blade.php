<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }} > create
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
                                    <th>title</th>
                                    <th>description</th>
                                    <th>slug</th>
                                    <th>url_picture</th>
                                    <th>articlescategs_id</th>
                                    <th>envoyer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    {!! Form::open(['route'=>'articles.store'])!!}
                                    <td>{{Form::text('title',null)}}</td>
                                    <td>{{Form::text('description',null)}}</td>
                                    <td>{{Form::text('slug',null)}}</td>
                                    <td>{{Form::text('url_picture',null)}}</td>
                                    <td>{{Form::select('articlescategs_id', $articlescategs)}}</td>
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


