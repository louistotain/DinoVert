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
<body>

@include('includes.header')

@yield('content')

@include('includes.footer')

<script src="{{asset('js/extention/choices.js')}}"></script>
<script type="text/javascript">
    const choices = new Choices('[data-trigger]',
        {
            searchEnabled: false,
            itemSelectText: '',
        });
</script>
</body>
</html>
