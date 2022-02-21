<x-layout>
    <div class="container container-form">
        <h2>
            ABONAR A CREDITO
        </h2>


        <form method="POST" action="/payment">
            @csrf

            <div class="mb-3">
                <label for="clientDataList" class="form-label">Cliente</label>
                <input class="form-control" list="datalistOptions" required name="datosCliente" id="clientDataList"
                    placeholder="Escribe para buscar...">
                <datalist id="datalistOptions">
                    @foreach ($credits as $credit)
                        <option
                            value="{{ $credit->id . ' - ' . $credit->nombre . ' ' . $credit->apellido . ' - Cuota: $' . $credit->valorCuota . ' - Saldo: $' . $credit->saldo }}">
                    @endforeach
                </datalist>
            </div>

            <div class="mb-3">
                <label for="valorAbonoCredito" class="form-label">Valor Abono</label>
                <input type="number" class="form-control" name="valorAbono" required id="valorAbonoCredito">
            </div>

            <div class="mb-3">
                <label for="fechaAbonoCredito" class="form-label">Fecha Abono</label>
                <input type="date" class="form-control" name="fechaAbono" required value="{{ date('Y-m-d') }}"
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
