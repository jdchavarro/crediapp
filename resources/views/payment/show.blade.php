<x-layout>
    <div class="container container-form">
        <h2>
            ABONO
        </h2>


        <div>

            <div class="mb-3">
                <label for="clienteCredito" class="form-label">Cliente</label>
                <input type="text" class="form-control" name="cliente" value="{{ $client->nombre . ' ' . $client->apellido }}" disabled id="clienteCredito">
            </div>

            <div class="mb-3">
                <label for="numeroReciboCredito" class="form-label">Numero Recibo</label>
                <input type="number" class="form-control" name="numeroRecibo" value="{{ $payment->numero }}" disabled id="numeroReciboCredito">
            </div>

            <div class="mb-3">
                <label for="numeroFactura" class="form-label">Numero Factura</label>
                <input type="number" class="form-control" name="numFactura" value="{{ $credit->numeroFactura }}" disabled id="numeroFactura">
            </div>

            <div class="mb-3">
                <label for="saldoCredito" class="form-label">Saldo</label>
                <input type="number" class="form-control" name="saldo" value="{{ $credit->saldo }}" disabled id="saldoCredito">
            </div>

            <div class="mb-3">
                <label for="valorAbonoCredito" class="form-label">Valor Abono</label>
                <input type="number" class="form-control" name="valorAbono" value="{{ $payment->valor }}" disabled id="valorAbonoCredito">
            </div>

            <div class="mb-3">
                <label for="fechaAbonoCredito" class="form-label">Fecha Abono</label>
                <input type="date" class="form-control" name="fechaAbono" value="{{ $payment->fecha }}" disabled value="{{ date('Y-m-d') }}" id="fechaAbonoCredito">
            </div>

            <button class="btn btn-primary" onclick="window.print()">Imprimir</button>
            <button class="btn btn-danger" onclick="window.history.back()">Atras</button>
        </div>


    </div>

    <div id="impresion">
        <h1>COMPUHELP</h1>
        <h2>nit: 31.203.232</h2>
        <h2>tel: 315 661 9984</h2>
        <h2>dir: carrera 25 # 30-16</h2>

        <p>Fecha del pago: {{ $payment->fecha }}</p>
        <p>Recibo # {{ $payment->numero }}</p>
        <p>Numero Factura: {{ $credit->numeroFactura }}</p>

        <p>Cliente: {{ $client->nombre . ' ' . $client->apellido }}</p>
        <p>CC: {{ $client->cedula }}</p>

        <p id="vlrCancelado">Valor cancelado: <span id="vlrPagado">{{ $payment->valor }}</span></p>
        <p>Saldo: <span id="vlrSaldo">{{ $credit->saldo }}</span></p>

    </div>

</x-layout>

<script type="text/javascript">
    window.onload = function() {
        let vlrPagado = document.getElementById("vlrPagado");
        let vlrSaldo = document.getElementById("vlrSaldo");

        const formatterPeso = new Intl.NumberFormat('es-CO', {
            style: 'currency',
            currency: 'COP',
            minimumFractionDigits: 0
        });

        vlrPagado.innerHTML = formatterPeso.format(vlrPagado.innerHTML);
        vlrSaldo.innerHTML = formatterPeso.format(vlrSaldo.innerHTML);
    }
</script>

<style type="text/css">
    #impresion {
        display: none;
        font: 19px Draft;
        text-align: center;
        color: black;
    }

    #impresion h1 {
        font-weight: bold;
    }

    #impresion h2 {
        font-size: 1em;
    }

    #impresion #vlrCancelado {
        font-size: 2em;
    }

    #impresion #vlrPagado {
        color: red;
        font-weight: bold;
    }

    .container-form {
        width: 400px;
        margin: 0 auto;
    }


    @media print {
        @page {
            margin: 0;
        }

        .btn,
        .navbar,
        .container {
            display: none;
        }

        #impresion {
            display: inline;
        }
    }
</style>