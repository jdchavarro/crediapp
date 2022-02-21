<x-layout>
    <div class="container">
        <h2>
            PRODUCTOS
        </h2>

        <div class="d-flex">
            <input class="form-control mx-1" type="text" placeholder="Buscar por codigo, marca o nombre" id="searchbarProducto">
            <button type="button" class="btn btn-outline-success mx-1" onclick="cleanSearchbar()">LIMPIAR</button>
            <a class="btn btn-primary" href="/product/create">
                <i class="fas fa-plus"></i>
                AGREGAR
            </a>
        </div>

        <table class="table table-hover" id="tableProducts">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody id="bodyTableProducts">
            </tbody>
        </table>

    </div>

    <script>
        let productos = <?php echo json_encode($products); ?>;
        let bodyTableProducts = document.getElementById("bodyTableProducts");

        filterProducts();

        document.getElementById("searchbarProducto").addEventListener("keyup", filterProducts);


        function filterProducts() {
            bodyTableProducts.innerHTML = "";

            let query = document.getElementById("searchbarProducto").value;
            let productsFiltered = productos.filter(producto => {
                let marca = producto["marca"].toLowerCase().indexOf(query.toLowerCase()) > -1;
                let nombre = producto["nombre"].toLowerCase().indexOf(query.toLowerCase()) > -1;
                let codigo = producto["codigo"].toString().indexOf(query) > -1;
                return (marca || nombre || codigo);
            });

            let indice = 1;

            productsFiltered.forEach(product => {
                let template = `
                <tr>
                        <th scope="row">${indice}</th>
                        <td>${product['codigo']}</td>
                        <td>${product['nombre']}</td>
                        <td>$ ${product['precio']}</td>
                        <td>${product['marca']}</td>
                        <td>${product['cantidad']}</td>
                        <td class="d-flex justify-content-evenly align-items-center">
                            <a href="/product/${product['id']}"><i class="fas fa-info-circle"></i></a>
                            <a href="/product/${product['id']}/edit"><i class="fas fa-edit"></i></a>
                            <form action="/product/${product['id']}"
                                method="POST">
                                @method("DELETE")
                                @csrf
                                <button class="text-nowrap btn text-danger"
                                        type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                </tr>
                `;
                indice++;
                bodyTableProducts.innerHTML += template;
            });
        }

        function cleanSearchbar() {
            document.getElementById("searchbarProducto").value = "";
            filterProducts();
        }
    </script>

</x-layout>
