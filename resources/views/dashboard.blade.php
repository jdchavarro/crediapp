<x-layout>
    <div class="container">

        <section>
            <h1>Creditos</h1>
            <div>
                <a href="/credit" class="btn btn-info">Lista</a>
                <a href="/credit/create" class="btn btn-warning">+ Nuevo Credito</a>
                <a href="/payment/create" class="btn btn-success">+ Nuevo Abono</a>
            </div>
        </section>
        <section>
            <h1>Clientes</h1>
            <div>
                <a href="/client" class="btn btn-info">Lista</a>
                <a href="/client/create" class="btn btn-success">+ Nuevo Cliente</a>
            </div>
        </section>
        <section>
            <h1>Productos</h1>
            <div>
                <a href="/product" class="btn btn-info">Lista</a>
                <a href="/product/create" class="btn btn-success">+ Crear Producto</a>
            </div>
        </section>

    </div>

    <style>
        section:nth-child(1),
        section:nth-child(2) {
            margin-bottom: 40px;
        }
    </style>
</x-layout>