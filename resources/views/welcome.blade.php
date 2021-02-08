<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>


    <!--  jquery script  -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!--  validation script  -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>


    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/10sbhhl7qv7e94ooxj70wdr3qr8ny0t8ngayw6ydjm2jqy04/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>


    <script>
        tinymce.init({
            selector: '.wysiwyg',
            toolbar_mode: 'floating',
            plugins: "save",
            toolbar: "save"
        });
    </script>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>

    <title>DinoVert</title>

</head>
<body id="{{$view_name}}">

<div class="bg_navbar_burger d-none"
     style="height: 100vh; width: 100%; background: #00000090; position: fixed; z-index: 9999; top: 0;">
    <div class="navbar_burger" style="height: 100vh; background: #1C282E; position: relative; z-index: 10000;"></div>
</div>

@include('includes.header')

@yield('content')

@include('includes.footer')

<script type="text/javascript">

    // Menu responsive

    var ul_search = $('#ul_search');

    var li_search = $('#li_search');
    var li_BAV = $('#li_BAV');
    var li_Actualites = $('#li_Actualites');

    var li_menu_burger_p = $('#li_menu_burger p')
    var li_search_p = $('#li_search p');

    $(document).ready(function () {
        var width = $(window).width();
        if (width < 1200) {

            $('#li_BAV').remove();
            $('#li_Actualites').remove();
            $('#ul_search').remove();
            $('#li_search').remove();

            $('#li_logo').after(li_search);
            $('#ul_nav').removeClass('col-7').addClass('col-12');
        }
        if (width < 768) {
            $('#li_menu_burger p').remove();
            $('#li_search p').remove();
        }
    });

    $(window).resize(function () {
        var width = $(window).width();

        if (width < 1200) {
            $('#li_BAV').remove();
            $('#li_Actualites').remove();
            $('#ul_search').remove();
            $('#li_search').remove();

            $('#li_logo').after(li_search);
            $('#ul_nav').removeClass('col-7').addClass('col-12');
        }
        if (width > 1200) {
            $('#li_menu_burger').after(li_BAV);
            $('#li_BAV').after(li_Actualites);
            $('#li_search').remove();

            $('#ul_nav').removeClass('col-12').addClass('col-7');

            $('#ul_nav').after(ul_search);
            $('#ul_search').append(li_search);

        }

        if (width < 768) {
            $('#li_menu_burger p').remove();
            $('#li_search p').remove();
        }
        if (width > 768) {
            $('#menu_burger').after(li_menu_burger_p);
            $('#menu_search').after(li_search_p);
        }
    });

    $(document).ready(function () {

        $('#li_menu_burger').click(function () {
            $('body').addClass('overflow-hidden');
            $('nav.navbar').removeClass('nav_burger_display_block').addClass('nav_burger_display_none');

            $('.bg_navbar_burger').removeClass('d-none').removeClass('bg_burger_none').addClass('nav_burger_animation_block');

            $('.navbar_burger').removeClass('nav_burger_animation_none').addClass('nav_burger_animation_block');

            $(document).mouseup(function (e) {
                var container = $(".navbar_burger");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    $('nav.navbar').removeClass('nav_burger_display_none').addClass('nav_burger_display_block');

                    $('.bg_navbar_burger').removeClass('nav_burger_animation_block').addClass('bg_burger_none');

                    $('.navbar_burger').removeClass('nav_burger_animation_block').addClass('nav_burger_animation_none');

                    $('body').removeClass('overflow-hidden');
                }
            });

        });
    });


</script>
</body>
</html>
