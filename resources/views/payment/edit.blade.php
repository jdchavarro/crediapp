<x-layout>
    <div class="container container-form">
        <h2>
            ABONAR A CREDITO
        </h2>


        <form method="POST" action="/payment/{{ $payment->id }}">
            @method("PUT")
            @csrf
            <input type="hidden" name="credit_id" value="{{ $credit->id }}">

            <div class="mb-3">
                <label for="clienteCredito" class="form-label">Cliente</label>
                <input type="text" class="form-control" name="cliente" value="{{ $client->nombre . ' ' . $client->apellido }}" disabled id="clienteCredito">
            </div>

            <div class="mb-3">
                <label for="valorAbonoCredito" class="form-label">Valor Abono</label>
                <input type="number" class="form-control" name="valorAbono" required value="{{ $payment->valor }}" id="valorAbonoCredito">
            </div>

            <div class="mb-3">
                <label for="fechaAbonoCredito" class="form-label">Fecha Abono</label>
                <input type="date" class="form-control" name="fechaAbono" required value="{{ $payment->fecha }}"
                    id="fechaAbonoCredito">
            </div>

            <button type="submit" class="btn btn-primary">Abonar</button>
            <a class="btn btn-danger" href="/credit" role="button">Atras</a>
        </form>


    </div>
    <style>
        .container-form {
            width: 400px;
            margin: 0 auto;
        }
    </style>

</x-layout>
