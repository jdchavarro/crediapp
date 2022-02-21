<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App</title>

    <!-- Fonts -->


    <!-- Styles -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>

<body class="bg">
    <div class="container d-flex align-items-center justify-content-center">
        <div id="formLogIn" class="d-flex flex-column align-items-center">
            <h1>APP</h1>
            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">Usuario</label>
                    <input type="text" class="form-control" autofocus name="username" required id="inputUsername">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" required id="inputPassword">
                </div>
                <button type="submit" class="btn btn-primary">ENTRAR</button>
            </form>
        </div>

    </div>

    <!-- Script -->
    <script src="{{ asset('js/welcome.js') }}"></script>
</body>

</html>
