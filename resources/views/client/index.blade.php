<x-layout>
    <div class="container">
        <h2>
            CLIENTES
        </h2>

        <div class="d-flex">
            <input class="form-control mx-1" type="text" placeholder="Buscar por cedula, nombre o apellido" id="searchbarCliente">
            <button type="button" class="btn btn-outline-success mx-1" onclick="cleanSearchbar()">LIMPIAR</button>
            <a class="btn btn-primary" href="/client/create">
                <i class="fas fa-plus"></i>
                AGREGAR
            </a>
        </div>

        <table class="table table-hover" id="tableClients">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody id="bodyTableClients">
            </tbody>
        </table>

    </div>

    <script>
        let clientes = <?php echo json_encode($clients); ?>;
        let bodyTableClients = document.getElementById("bodyTableClients");

        filterClients();

        document.getElementById("searchbarCliente").addEventListener("keyup", filterClients);


        function filterClients() {
            bodyTableClients.innerHTML = "";

            let query = document.getElementById("searchbarCliente").value;
            let clientsFiltered = clientes.filter(cliente => {
                let nombre = cliente["nombre"].toLowerCase().indexOf(query.toLowerCase()) > -1;
                let apellido = cliente["apellido"].toLowerCase().indexOf(query.toLowerCase()) > -1;
                let cedula = true;
                if (cliente["cedula"] !== null) {
                    cedula = cliente["cedula"].toString().indexOf(query) > -1;
                }
                return (apellido || nombre || cedula);
            });

            let indice = 1;

            clientsFiltered.forEach(client => {
                let template = `
                <tr>
                        <th scope="row">${indice}</th>
                        <td>${(client['cedula'] === null) ? "": client['cedula']}</td>
                        <td>${client['nombre']} ${client['apellido']}</td>
                        <td>${client['telefono1']}</td>
                        <td>${(client['direccion'] === null) ? "": client['direccion']}</td>
                        <td class="d-flex justify-content-evenly align-items-center">
                            <a href="/client/${client['id']}"><i class="fas fa-info-circle"></i></a>
                            <a href="/client/${client['id']}/edit"><i class="fas fa-edit"></i></a>
                            <form action="/client/${client['id']}"
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
                bodyTableClients.innerHTML += template;
            });
        }

        function cleanSearchbar() {
            document.getElementById("searchbarCliente").value = "";
            filterClients();
        }
    </script>

</x-layout>
