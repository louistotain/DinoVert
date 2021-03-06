<nav class="navbar navbar-expand-lg navbar-light nav_accueil">
    <div class="container">

        @php $actual_link = parse_url("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", PHP_URL_PATH);   @endphp

        <div class="row w-100 m-auto">
            <ul class="col-7 d-flex flex-row align-items-center justify-content-around" id="ul_nav">
                <li id="li_menu_burger">
                    <button class="navbar-brand d-flex flex-row align-items-center m-auto">
                        <img id="menu_burger" class="m-auto" src="{{asset('img/burger_black.png')}}" height="40"
                             width="40">
                        <p class="textHeader nav-link m-0 p-0" style="font-size: 1rem;">Menu</p>
                    </button>
                </li>
                <li id="li_BAV" style="margin-right: -70px; margin-left: -30px;">
                    <a style="color: black"
                       class="textHeader nav-link @php  if ($actual_link == '/biens-a-vendre'){ echo 'active'; }  @endphp "
                       href="{{ route('biens_a_vendre') }}">Biens à vendre</a>
                </li>
                <li id="li_Actualites">
                    <a style="color: black"
                       class="nav-link textHeader @php  if ($actual_link == '/actualites'){ echo 'active'; }  @endphp "
                       href="{{ route('actualites') }}">Actualités</a>
                </li>
                <li id="li_logo">
                    <a class="navbar-brand m-auto" href="{{ route('public_index') }}">
                        <img id="logo" class="m-auto" src="{{asset('img/logo_png.png')}}" height="50" width="50">
                        <h5 class="textHeader">DinoVert</h5>
                    </a>
                </li>
            </ul>
            <ul class="col-5 d-flex flex-row align-items-center justify-content-end" id="ul_search">
                @auth()
                    <li id="li_admin" style="margin-right: 2vw;">
                        <div class="ml-3 relative">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                 src="{{ Auth::user()->profile_photo_url }}"
                                                 alt="{{ Auth::user()->name }}"/>
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
                    </li>
                @endauth
                <li id="li_search">
                    <button class="navbar-brand d-flex flex-row align-items-center m-auto">
                        <img id="menu_search" class="m-auto" src="{{asset('img/search_black.png')}}" height="40"
                             width="40">
                        <p class="textHeader nav-link m-0 p-0" style="font-size: 1rem;">Recherche</p>
                    </button>
                </li>
            </ul>
        </div>

    </div>
</nav>

@if(old('Newsletter') == 'true')
    @php $messageNewsletter = 'Vous êtes maintenant inscrit à la newsletter' @endphp

    <div id="messageNewsletter" class="row w-100 text-center text-white p-3 m-0" style="background-color: #E7A83F;">
        <div class="col-10 text-left">@php  echo $messageNewsletter; @endphp</div>
        <div class="col-2 text-right">
            <button onclick="displayMessageNewsletter()" style="outline: none;">X</button>
        </div>
    </div>

@elseif(old('Newsletter') == 'false')
    @php $messageNewsletter = 'cet email est déjà inscrit à la newsletter' @endphp

    <div id="messageNewsletter" class="row w-100 text-center text-white p-3 m-0" style="background-color: darkred;">
        <div class="col-10 text-left">@php  echo $messageNewsletter; @endphp</div>
        <div class="col-2 text-right">
            <button onclick="displayMessageNewsletter()" style="outline: none;">X</button>
        </div>
    </div>

@else

@endif


@if(old('NewsletterDesc') == 'true')
    @php $messageNewsletter = 'Vous êtes maintenant désinscrit à la newsletter' @endphp

    <div id="messageNewsletter" class="row w-100 text-center text-white p-3 m-0" style="background-color: #c36b00;">
        <div class="col-10 text-left">@php  echo $messageNewsletter; @endphp</div>
        <div class="col-2 text-right">
            <button onclick="displayMessageNewsletter()" style="outline: none;">X</button>
        </div>
    </div>
@endif



