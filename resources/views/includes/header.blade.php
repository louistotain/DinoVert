<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('public_index') }}"><img src="{{asset('img/logo_png.png')}}" height="50"
                                                                        width="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('biens_a_vendre') }}">Biens à vendre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('actualites') }}">Actualités</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('qui_sommmes_nous') }}">Qui sommes-nous ?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
            @auth()
                <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                             src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('dashboard') }}">
                                    {{ __('Dashboard') }}
                                </x-jet-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
        </div>
            @endauth
        </div>
    </div>
</nav>

@if(old('Newsletter') == 'true')
    @php $messageNewsletter = 'Vous êtes maintenant inscrit à la newsletter' @endphp

    <div id="messageNewsletter" class="row w-100 text-center text-white p-3 m-0" style="background-color: #E7A83F;">
        <div class="col-6 text-left">@php  echo $messageNewsletter; @endphp</div>
        <div class="col-6 text-right">
            <button onclick="displayMessageNewsletter()" style="outline: none;">X</button>
        </div>
    </div>

@elseif(old('Newsletter') == 'false')
    @php $messageNewsletter = 'cet email est déjà inscrit à la newsletter' @endphp

    <div id="messageNewsletter" class="row w-100 text-center text-white p-3 m-0" style="background-color: darkred;">
        <div class="col-6 text-left">@php  echo $messageNewsletter; @endphp</div>
        <div class="col-6 text-right">
            <button onclick="displayMessageNewsletter()" style="outline: none;">X</button>
        </div>
    </div>

@else

@endif



