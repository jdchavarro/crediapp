<x-layout>
    <div class="container container-form">
        <h2>
            CREAR UN PRODUCTO
        </h2>


        <form method="POST" action="/product">
            @csrf
            <div class="mb-3">
                <label for="codigoProducto" class="form-label">Codigo</label>
                <input type="number" class="form-control" name="codigo" required id="codigoProducto"
                    aria-describedby="codigoHelp">
                <div id="codigoHelp" class="form-text">Aqui puedes usar la pistola de codigo de barras.</div>
            </div>

            <div class="mb-3">
                <label for="nombreProducto" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required id="nombreProducto">
            </div>

            <div class="mb-3">
                <label for="precioProducto" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precio" required id="precioProducto">
            </div>

            <div class="mb-3">
                <label for="cantidadProducto" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" required min="0" id="cantidadProducto"
                    value="0">
            </div>

            <div class="mb-3">
                <label for="marcaProducto" class="form-label">Marca</label>
                <input type="text" class="form-control" name="marca" required id="marcaProducto">
            </div>

            <div class="mb-3">
                <label for="descripcionProducto" class="form-label">Desripcion</label>
                <textarea class="form-control" id="descripcionProducto" name="descripcion" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Crear</button>
            <a name="" id="" class="btn btn-danger" href="/product" role="button">Atras</a>
        </form>


    </div>
    <style>
        .container-form {
            width: 400px;
            margin: 0 auto;
        }
    </style>

</x-layout>
