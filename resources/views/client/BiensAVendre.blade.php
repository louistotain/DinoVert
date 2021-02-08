@extends('welcome')
@section('content')

    <div class="container">
        <div class="s003">
            <form action="{{ route('biens_a_vendre.categ') }}" method="POST">
                @csrf
                <div class="inner-form">
                    <div class="input-field first-wrap d-flex align-items-center">
                        <div class="input-select w-100">
                            <select data-trigger="" name="categorie" onchange="this.form.submit()">
                                <option id="main_categ"></option>

                                @foreach($propertiescategs as $propertiescateg)
                                    @if(isset($mainCategName) && $propertiescateg->name == $mainCategName)
                                        <option value="0">Tout</option>
                                    @else
                                        <option
                                            value="@php echo $propertiescateg->id; @endphp">@php echo $propertiescateg->name; @endphp</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="input-field second-wrap">
                        <input name="search" id="search" type="text" placeholder="Recherche"/>
                    </div>
                    <div class="input-field third-wrap">
                        <button class="btn-search d-flex justify-content-around align-items-center" type="submit">
                            <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas"
                                 data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 512 512">
                                <path fill="currentColor"
                                      d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row p-4 d-flex justify-content-around">
            <div class="col-12 row Items">

                @if($properties->isEmpty())
                    <p class="text-center">Aucun résultat</p>
                @endif

                @foreach($properties as $property)

                        <a href="{{route('biens_a_vendre.details', ['property' => $property->id])}}" class="col-12 col-sm-6 col-lg-3" style="text-decoration: none; color: unset;">

                            @if($property->pictures->isEmpty())
                                <img style="width: 300px; height: 200px;"
                                     src="https://pyrenees.media.tourinsoft.eu/upload/Pasd-ImagesDisponible-ba91bb1444f84ed392cd463caa4d074f.jpg">
                            @else
                                <img class="img_biensAVendre" src="{{ $property->pictures->first()->url }}">
                            @endif

                            @foreach($propertiescategs as $propertiescateg)
                                @if($property->propertiescategs_id == $propertiescateg->id)
                                    <h5>{{ $propertiescateg->name }}</h5>
                                @endif
                            @endforeach

                            <p>{{ $property->price }}€</p>
                            <p>{{ $property->location }}</p>
                            <p style="margin-bottom: 1em;">{{ $property->m² }} m²</p>

                        </a>

                @endforeach

            </div>
        </div>
    </div>

    <script src="{{asset('js/extention/choices.js')}}"></script>

    <script type="text/javascript">

        document.getElementById("main_categ").innerText = '<?php if (isset($mainCategName)) {
            echo $mainCategName;
        } else {
            echo 'Tout';
        } ?>';

        document.getElementById("main_categ").value = '<?php if (isset($mainCategId)) {
            echo $mainCategId;
        } else {
            echo 0;
        } ?>';

        document.getElementById("search").value = '<?php if (isset($search)) {
            echo $search;
        } else {
            echo null;
        } ?>';


        const choices = new Choices('[data-trigger]',
            {
                searchEnabled: false,
                itemSelectText: '',
            });

    </script>

@endsection

