<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                        <div class="mt-8 text-2xl">
                            Bienvenu sur l'administration DinoVert
                        </div>

                        <div class="mt-6 text-gray-500">
                            Cette interface vous permettra de gérer le contenu des pages c'est-à-dire de pouvoir le
                            consulter, ajouter du nouveau contenu, les mettres à jours et les supprimer.
                        </div>

                        <img class="mt-4 mb-5" src="{{asset('img/gif_JurassicPark.gif')}}" height="300" width="500">

                    </div>
                </div>
            </div>
        </div>
    </main>

</x-app-layout>
