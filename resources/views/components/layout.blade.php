<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crediapp</title>

    <!-- Fonts -->


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



</head>

<body>

    <div>
        <x-navbar></x-navbar>
        {{ $slot }}
    </div>



    <!-- Script -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
