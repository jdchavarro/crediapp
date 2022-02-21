<x-layout>
    <div class="container">
        <h2>
            CONSULTAR CREDITO DE CLIENTES
        </h2>

        <div class="d-flex">
            <input class="form-control mx-1" type="text" placeholder="Buscar por cedula, nombre o apellido" id="searchbarCredit">
            <button type="button" class="btn btn-outline-success mx-1" onclick="cleanSearchbar()">LIMPIAR</button>
            {{-- <a class="btn btn-primary" href="/credit/create">
                <i class="fas fa-plus"></i>
                AGREGAR
            </a> --}}
        </div>

        <table class="table table-hover" id="tableCredits">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Valor Cuota</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody id="bodyTableCredits">
            </tbody>

        </table>

    </div>

    <script>
        let credits = <?php echo json_encode($credits); ?>;
        let bodyTableCredits = document.getElementById("bodyTableCredits");

        filterCredits();

        document.getElementById("searchbarCredit").addEventListener("keyup", filterCredits);


        function filterCredits() {
            bodyTableCredits.innerHTML = "";

            let query = document.getElementById("searchbarCredit").value;
            let creditsFiltered = credits.filter(credit => {
                let nombre = credit["nombre"].toLowerCase().indexOf(query.toLowerCase()) > -1;
                let apellido = credit["apellido"].toLowerCase().indexOf(query.toLowerCase()) > -1;
                let cedula = true;
                if (credit["cedula"] !== null) {
                    cedula = credit["cedula"].toString().indexOf(query) > -1;
                }
                return (apellido || nombre || cedula);
            });

            let indice = 1;

            creditsFiltered.forEach(credit => {
                let template = `
                <tr>
                        <th scope="row">${indice}</th>
                        <td>${(credit['cedula'] === null) ? "": credit['cedula']}</td>
                        <td>${credit['nombre']} ${credit['apellido']}</td>
                        <td>${credit['valorCuota']}</td>
                        <td>${credit['saldo']}</td>
                        <td>${credit['fecha']}</td>
                        <td class="d-flex justify-content-evenly align-items-center">
                            <a href="/credit/${credit['id']}"><i class="fas fa-info-circle"></i></a>
                            <a href="/credit/${credit['id']}/edit"><i class="fas fa-edit"></i></a>
                            <form action="/credit/${credit['id']}"
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
                bodyTableCredits.innerHTML += template;
            });
        }

        function cleanSearchbar() {
            document.getElementById("searchbarCredit").value = "";
            filterCredits();
        }
    </script>

</x-layout>
