<x-layout>
    <div class="container container-form">
        <h2>
            DATOS DEL CREDITO
        </h2>


        
        

            <div class="mb-3">
                <label for="clientDataList" class="form-label">Cliente</label>
                <input class="form-control" disabled id="clientDataList" value="{{ $credit->client->nombre . ' ' . $credit->client->apellido }}">
            </div>

            <div class="mb-3">
                <label for="numeroFacturaCredito" class="form-label">Numero Factura</label>
                <input type="number" class="form-control" value="{{ $credit->numeroFactura }}" disabled id="numeroFacturaCredito">
            </div>

            <div class="mb-3">
                <label for="montoBaseCredito" class="form-label">Monto Base</label>
                <input type="number" class="form-control" value="{{ $credit->montoBase }}" disabled id="montoBaseCredito">
            </div>

            <div class="mb-3">
                <label for="totalFacturaCredito" class="form-label">Total Factura</label>
                <input type="number" class="form-control" value="{{ $credit->totalFactura }}" disabled id="totalFacturaCredito">
            </div>

            <div class="mb-3">
                <label for="cuotaInicialCredito" class="form-label">Cuota Inicial</label>
                <input type="number" class="form-control" value="{{ $credit->cuotaInicial }}" disabled id="cuotaInicialCredito">
            </div>

            <div class="mb-3">
                <label for="valorCuotaCredito" class="form-label">Valor Cuota</label>
                <input type="number" class="form-control" value="{{ $credit->valorCuota }}" disabled id="valorCuotaCredito">
            </div>

            <div class="mb-3">
                <label for="saldoCredito" class="form-label">Saldo</label>
                <input type="number" class="form-control" value="{{ $credit->saldo }}" disabled id="saldoCredito">
            </div>

            <div class="mb-3">
                <label for="cuotasCredito" class="form-label">Cuotas</label>
                <input type="number" class="form-control" value="{{ $credit->cuotas }}" disabled id="cuotasCredito">
            </div>

            <div class="mb-3">
                <label for="descripcionCredito" class="form-label">Desripcion</label>
                <textarea class="form-control" id="descripcionCredito" disabled rows="3">{{ $credit->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label for="fechaCredito" class="form-label">Fecha</label>
                <input type="date" class="form-control" disabled value="{{ $credit->fecha }}" disabled id="fechaCredito">
            </div>

            @if (sizeof($payments) > 0)
            <table class="table table-hover" id="tablePaymentsOfCredit">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Recibo N</th>
                        <th scope="col">Valor Pagado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody id="bodyTablePaymentsOfCredit">
                    @php
                    $indice = 1;
                    @endphp
                    @foreach ($payments as $payment)
                    <tr>
                        <th scope="row">{{ $indice }}</th>
                        <td>{{ $payment->numero }}</td>
                        <td>{{ $payment->valor }}</td>
                        <td>{{ $payment->fecha }}</td>
                        <td class="d-flex justify-content-evenly align-items-center">
                            <a href="/payment/{{ $payment['id'] }}"><i class="fas fa-info-circle"></i></a>
                            <a href="/payment/{{ $payment['id'] }}/edit"><i class="fas fa-edit"></i></a>
                            <form action="/payment/{{ $payment['id'] }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <button class="text-nowrap btn text-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
            @endif

            <button class="btn btn-danger" onclick="window.history.back()">Atras</button>
        

    </div>

    <style>
        .container-form {
            width: 500px;
            margin: 0 auto;
        }
    </style>

</x-layout>