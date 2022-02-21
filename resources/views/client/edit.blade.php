<x-layout>
    <div class="container container-form">
        <h2>
            EDITAR UN CLIENTE
        </h2>


        <form method="POST" action="/client/{{ $client->id }}">
            @method("PUT")
            @csrf
            <div class="mb-3">
                <label for="cedulaCliente" class="form-label">Cedula</label>
                <input type="number" class="form-control" name="cedula" id="cedulaCliente"
                    value="{{ $client->cedula }}">
            </div>
            <div class="mb-3">
                <label for="nombreCliente" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required id="nombreCliente"
                    value="{{ $client->nombre }}">
            </div>
            <div class="mb-3">
                <label for="apellidoCliente" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" required id="apellidoCliente"
                    value="{{ $client->apellido }}">
            </div>
            <div class="mb-3">
                <label for="telefono1Cliente" class="form-label">Telefono Principal</label>
                <input type="number" class="form-control" name="telefono1" required id="telefono1Cliente"
                    value="{{ $client->telefono1 }}">
            </div>
            <div class="mb-3">
                <label for="telefon2Cliente" class="form-label">Telefono Secundario</label>
                <input type="number" class="form-control" name="telefono2" id="telefon2Cliente"
                    value="{{ $client->telefono2 }}">
            </div>
            <div class="mb-3">
                <label for="direccionCliente" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" id="direccionCliente"
                    value="{{ $client->direccion }}">
            </div>
            <div class="mb-3">
                <label for="ciudadCliente" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" id="ciudadCliente"
                    value="{{ $client->ciudad }}">
            </div>
            <div class="mb-3">
                <label for="descripcionProducto" class="form-label">Desripcion</label>
                <textarea class="form-control" id="descripcionProducto" name="descripcion" rows="3">{{ $client->descripcion }}
                    </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
            <a name="" id="" class="btn btn-danger" href="/client" role="button">Atras</a>
        </form>


    </div>

    <style>
        .container-form {
            width: 400px;
            margin: 0 auto;
        }
    </style>
</x-layout>
