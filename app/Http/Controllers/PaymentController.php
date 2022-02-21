<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = DB::table('payments')
            ->join('credits', 'payments.credit_id', '=', 'credits.id')
            ->join('clients', 'credits.client_id', '=', 'clients.id')
            ->select('payments.*', 'clients.nombre', 'clients.apellido')
            ->whereNull('payments.deleted_at')
            ->get();
        return view("payment.index", ["payments" => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $credits = DB::table('credits')
            ->join('clients', 'credits.client_id', '=', 'clients.id')
            ->select('credits.*', 'clients.cedula', 'clients.nombre', 'clients.apellido')
            ->whereNull('credits.deleted_at')
            ->get();
        return view("payment.create", ['credits' => $credits]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Payment();

        $ultimoNumeroFactura = DB::table('payments')->max('numero');
        $payment->numero = $ultimoNumeroFactura + 1;
        $payment->valor = $request->valorAbono;
        $payment->fecha = $request->fechaAbono;

        $datosCliente = explode(" - ", $request->datosCliente);
        $credito = Credit::find($datosCliente[0]);
        $credito->saldo -= $request->valorAbono;
        $payment->credit()->associate($credito);

        $payment->save();
        $credito->save();

        return redirect("/payment/" . $payment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view("payment.show", ['payment' => $payment, 'client' => $payment->credit->client, 'credit' => $payment->credit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view("payment.edit", ['payment' => $payment, 'client' => $payment->credit->client, 'credit' => $payment->credit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $credito = Credit::find($request->credit_id);
        $credito->saldo += $payment->valor;
        $credito->saldo -= $request->valorAbono;
        $credito->save();
        
        $payment->valor = $request->valorAbono;
        $payment->fecha = $request->fechaAbono;
        $payment->save();

        return redirect("/payment/" . $payment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->credit->saldo += $payment->valor;
        $payment->credit->save();
        $id = $payment->credit->id;
        $payment->delete();
        return redirect("/credit/".$id);
    }
}
