<x-layout>
    <div class="container container-form">
        <h2>
            EDITAR DATOS DEL CREDITO
        </h2>


        <form method="POST" action="/credit/{{ $credit->id }}">
            @method("PUT")
            @csrf

            <div class="mb-3">
                <label for="clientDataList" class="form-label">Cliente</label>
                <input class="form-control" list="datalistOptions"
                    value="{{ $credit->client->id . ' - ' . $credit->client->cedula . ' - ' . $credit->client->nombre . ' ' . $credit->client->apellido }}"
                    required name="datosCliente" id="clientDataList" placeholder="Escribe para buscar...">
                <datalist id="datalistOptions">
                    @foreach ($clients as $client)
                        <option
                            value="{{ $client->id . ' - ' . $client->cedula . ' - ' . $client->nombre . ' ' . $client->apellido }}">
                    @endforeach
                </datalist>
            </div>

            <div class="mb-3">
                <label for="numeroFacturaCredito" class="form-label">Numero Factura</label>
                <input type="number" class="form-control" value="{{ $credit->numeroFactura }}"
                    id="numeroFacturaCredito" name="numeroFactura">
            </div>

            <div class="mb-3">
                <label for="montoBaseCredito" class="form-label">Monto Base</label>
                <input type="number" class="form-control" name="montoBase" value="{{ $credit->montoBase }}"
                    id="montoBaseCredito">
            </div>

            <div class="mb-3">
                <label for="totalFacturaCredito" class="form-label">Total Factura</label>
                <input type="number" class="form-control" name="totalFactura" value="{{ $credit->totalFactura }}"
                    id="totalFacturaCredito">
            </div>

            <div class="mb-3">
                <label for="cuotaInicialCredito" class="form-label">Cuota Inicial</label>
                <input type="number" class="form-control" name="cuotaInicial" value="{{ $credit->cuotaInicial }}"
                    id="cuotaInicialCredito">
            </div>

            <div class="mb-3">
                <label for="valorCuotaCredito" class="form-label">Valor Cuota</label>
                <input type="number" class="form-control" name="valorCuota" value="{{ $credit->valorCuota }}"
                    id="valorCuotaCredito">
            </div>

            <div class="mb-3">
                <label for="saldoCredito" class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo" value="{{ $credit->saldo }}"
                    id="saldoCredito">
            </div>

            <div class="mb-3">
                <label for="cuotasCredito" class="form-label">Cuotas</label>
                <input type="number" class="form-control" name="cuotas" value="{{ $credit->cuotas }}"
                    id="cuotasCredito">
            </div>

            <div class="mb-3">
                <label for="descripcionCredito" class="form-label">Desripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcionCredito"
                    rows="3">{{ $credit->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label for="fechaCredito" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" value="{{ $credit->fecha }}"
                    id="fechaCredito">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>


    </div>
    <style>
        .container-form {
            width: 400px;
            margin: 0 auto;
        }
    </style>

</x-layout>
