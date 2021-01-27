<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catégories Articles') }} > show
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 m-5">

                            <a class="btn btn-light" href="{{route('articlescategs.edit',['articlescateg' => $articlescateg->id])}}" role="button"
                               style="border-color: #9ca3af; float: right; margin-bottom: 10px;">Modifier cette catégorie d'article</a>


                            <table class="table" id="table_show">
                                <thead>
                                <tr>
                                    <th>name</th>
                                    <th>slug</th>
                                    <th>created_at</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $articlescateg->name }}</td>
                                    <td>{{ $articlescateg->slug }}</td>
                                    <td>{{ $articlescateg->created_at }}</td>
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


