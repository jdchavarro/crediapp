<x-layout>
    <div class="container">
        <h2>
            LISTA DE ABONOS
        </h2>

        <div class="d-flex">
            <input class="form-control mx-1" type="date" value="{{ date('Y-m-d') }}" id="searchbar">
            <button type="button" class="btn btn-outline-success mx-1" onclick="cleanSearchbar()">LIMPIAR</button>
        </div>

        <table class="table table-hover" id="tablePayments">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Valor Abono</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody id="bodyTablePayments">
            </tbody>

        </table>

    </div>

    <script>
        let payments = <?php echo json_encode($payments); ?>;
        let bodyTablePayments = document.getElementById("bodyTablePayments");


        filterPayments();

        document.getElementById("searchbar").addEventListener("change", filterPayments);


        function filterPayments() {
            bodyTablePayments.innerHTML = "";

            let query = document.getElementById("searchbar").value;
            let paymentsFiltered = payments.filter(payment => {
                return (payment.fecha == query);
            });

            let indice = 1;

            paymentsFiltered.forEach(payment => {
                let template = `
                <tr>
                <th scope="row">${indice}</th>
                <td>${payment.nombre + " " + payment.apellido}</td>
                <td>${payment.valor}</td>
                <td>${payment.fecha}</td>
                <td class="d-flex justify-content-evenly align-items-center">
                    <a href="/payment/${payment['id']}"><i class="fas fa-info-circle"></i></a>
                    <a href="/payment/${payment['id']}/edit"><i class="fas fa-edit"></i></a>
                    <form action="/payment/${payment['id']}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button class="text-nowrap btn text-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
                </tr>
                `;
                indice++;
                bodyTablePayments.innerHTML += template;
            });
        }

        function cleanSearchbar() {
            document.getElementById("searchbar").value = "";
            filterCredits();
        }
    </script>

</x-layout>
