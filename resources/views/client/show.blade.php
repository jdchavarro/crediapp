<x-layout>
    <div class="container container-form">
        <h2>
            CLIENTE
        </h2>

        <div>
            <div class="mb-3">
                <label for="cedulaCliente" class="form-label">Cedula</label>
                <input type="number" class="form-control" name="cedula" disabled id="cedulaCliente"
                    value="{{ $client->cedula }}">
            </div>
            <div class="mb-3">
                <label for="nombreCliente" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" disabled id="nombreCliente"
                    value="{{ $client->nombre }}">
            </div>
            <div class="mb-3">
                <label for="apellidoCliente" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" disabled id="apellidoCliente"
                    value="{{ $client->apellido }}">
            </div>
            <div class="mb-3">
                <label for="telefono1Cliente" class="form-label">Telefono Principal</label>
                <input type="number" class="form-control" name="telefono1" disabled id="telefono1Cliente"
                    value="{{ $client->telefono1 }}">
            </div>
            <div class="mb-3">
                <label for="telefon2Cliente" class="form-label">Telefono Secundario</label>
                <input type="number" class="form-control" name="telefono2" disabled id="telefon2Cliente"
                    value="{{ $client->telefono2 }}">
            </div>
            <div class="mb-3">
                <label for="direccionCliente" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" disabled id="direccionCliente"
                    value="{{ $client->direccion }}">
            </div>
            <div class="mb-3">
                <label for="ciudadCliente" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" disabled id="ciudadCliente"
                    value="{{ $client->ciudad }}">
            </div>
            <div class="mb-3">
                <label for="descripcionProducto" class="form-label">Desripcion</label>
                <textarea class="form-control" id="descripcionProducto" disabled name="descripcion" rows="3">{{ $client->descripcion }}
                    </textarea>
            </div>
            <a name="" id="" class="btn btn-danger" href="/client" role="button">Atras</a>
        </div>


    </div>
    <style>
        .container-form {
            width: 400px;
            margin: 0 auto;
        }
    </style>

</x-layout>
