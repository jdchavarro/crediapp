<x-layout>
    <div class="container container-form">
        <h2>
            PRODUCTO
        </h2>


        <form method="GET" action="/product">
            <div class="mb-3">
                <label for="codigoProducto" class="form-label">Codigo</label>
                <input type="number" class="form-control" name="codigo" disabled id="codigoProducto"
                    value="{{ $product->codigo }}">
            </div>

            <div class="mb-3">
                <label for="nombreProducto" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" disabled id="nombreProducto"
                    value="{{ $product->nombre }}">
            </div>

            <div class="mb-3">
                <label for="precioProducto" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precio" disabled id="precioProducto"
                    value="{{ $product->precio }}">
            </div>

            <div class="mb-3">
                <label for="cantidadProducto" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" disabled id="cantidadProducto"
                    value="{{ $product->cantidad }}">
            </div>

            <div class="mb-3">
                <label for="marcaProducto" class="form-label">Marca</label>
                <input type="text" class="form-control" name="marca" disabled id="marcaProducto"
                    value="{{ $product->marca }}">
            </div>

            <div class="mb-3">
                <label for="descripcionProducto" class="form-label">Desripcion</label>
                <textarea class="form-control" id="descripcionProducto" disabled name="descripcion" rows="3">{{ $product->descripcion }}
                </textarea>
            </div>

            <button type="submit" class="btn btn-danger">Atras</button>
        </form>


    </div>
    <style>
        .container-form {
            width: 400px;
            margin: 0 auto;
        }
    </style>

</x-layout>
