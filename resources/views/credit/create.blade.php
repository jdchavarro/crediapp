<x-layout>
    
        <div class="container container-form">
            <h2>
                NUEVO CREDITO
            </h2>
            <form method="POST" action="/credit">
                @csrf
                <div class="mb-3">
                    <label for="clientDataList" class="form-label">Cliente</label>
                    <input class="form-control" list="datalistOptions" required name="datosCliente" id="clientDataList" placeholder="Escribe para buscar...">
                    <datalist id="datalistOptions">
                        @foreach ($clients as $client)
                        <option value="{{ $client->id . ' - ' . $client->cedula . ' - ' . $client->nombre . ' ' . $client->apellido }}">
                            @endforeach
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="numeroFacturaCredito" class="form-label">Numero Factura</label>
                    <input type="number" class="form-control" name="numeroFactura" required id="numeroFacturaCredito">
                </div>
                <div class="mb-3">
                    <label for="montoBaseCredito" class="form-label">Monto Base</label>
                    <input type="number" class="form-control" name="montoBase" required id="montoBaseCredito">
                </div>
                <div class="mb-3">
                    <label for="cuotaInicialCredito" class="form-label">Cuota Inicial</label>
                    <input type="number" class="form-control" name="cuotaInicial" value="0" required id="cuotaInicialCredito">
                </div>
                <div class="mb-3">
                    <label for="cuotasCredito" class="form-label">Cuotas</label>
                    <select class="form-select" aria-label="Numero Cuotas Credito" name="cuotas" id="cuotasCredito">
                        <option selected value="3">3</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="totalFacturaCredito" class="form-label">Total Factura</label>
                    <input type="number" class="form-control" name="totalFactura" disabled id="totalFacturaCredito">
                </div>
                <div class="mb-3">
                    <label for="valorCuotaCredito" class="form-label">Valor Cuota</label>
                    <input type="number" class="form-control" name="valorCuota" disabled id="valorCuotaCredito">
                </div>
                <div class="mb-3">
                    <label for="saldoCredito" class="form-label">Saldo</label>
                    <input type="number" class="form-control" name="saldo" disabled id="saldoCredito">
                </div>
                <div class="mb-3">
                    <label for="descripcionCredito" class="form-label">Desripcion</label>
                    <textarea class="form-control" id="descripcionCredito" name="descripcion" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="fechaCredito" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" value="{{ date('Y-m-d') }}" required id="fechaCredito">
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
                <a class="btn btn-danger" href="/credit" role="button">Atras</a>
            </form>
        </div>
    

    <style>
        .container-form {
            width: 400px;
            margin: 0 auto;
        }
    </style>

    <script>
        // Multiplicadores
        let interes3 = 333.333;
        let interes6 = 180.818;
        let interes7 = 156.772;
        let interes8 = 138.75;
        let interes9 = 124.743;
        let interes10 = 113.547;
        let interes11 = 104.395;
        let interes12 = 96.776;


        let montoBase = document.querySelector("#montoBaseCredito");
        let cuotaInicial = document.querySelector("#cuotaInicialCredito");
        let numeroCuotas = document.querySelector("#cuotasCredito");
        let totalFactura = document.querySelector("#totalFacturaCredito");
        let vlrCuota = document.querySelector("#valorCuotaCredito");
        let saldo = document.querySelector("#saldoCredito");

        montoBase.addEventListener("change", calcularCredito);
        cuotaInicial.addEventListener("change", calcularCredito);
        numeroCuotas.addEventListener("change", calcularCredito);

        function calcularCredito() {
            let montoCredito = montoBase.value - cuotaInicial.value;

            let multiplicador = interes3;

            switch (numeroCuotas.value) {
                case "3":
                    multiplicador = interes3;
                    break;
                case "6":
                    multiplicador = interes6;
                    break;
                case "7":
                    multiplicador = interes7;
                    break;
                case "8":
                    multiplicador = interes8;
                    break;
                case "9":
                    multiplicador = interes9;
                    break;
                case "10":
                    multiplicador = interes10;
                    break;
                case "11":
                    multiplicador = interes11;
                    break;
                case "12":
                    multiplicador = interes12;
                    break;
            }
            
            vlrCuota.value = Math.round(montoCredito / 1000000 * multiplicador) * 1000;
            if (numeroCuotas.value == 3) {
                totalFactura.value = montoBase.value;
            } else {
                totalFactura.value = vlrCuota.value * numeroCuotas.value;
            }
            saldo.value = totalFactura.value - cuotaInicial.value;
        }
    </script>

</x-layout>