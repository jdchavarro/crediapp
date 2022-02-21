<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Credit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credits = DB::table('credits')
            ->join('clients', 'credits.client_id', '=', 'clients.id')
            ->select('credits.*', 'clients.cedula', 'clients.nombre', 'clients.apellido')
            ->whereNull('credits.deleted_at')
            ->get();
        return view("credit.index", ["credits" => $credits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("credit.create", ["clients" => Client::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credit = new Credit();

        $credit->numeroFactura = $request->numeroFactura;
        $credit->montoBase = $request->montoBase;
        $credit->totalFactura = $request->totalFactura;
        $credit->cuotaInicial = $request->cuotaInicial;
        $credit->valorCuota = $request->valorCuota;
        $credit->saldo = $request->saldo;
        $credit->cuotas = $request->cuotas;
        $credit->descripcion = $request->descripcion;
        $credit->fecha = $request->fecha;

        $datosCliente = explode(" - ", $request->datosCliente);
        $cliente = Client::find($datosCliente[0]);
        $credit->client()->associate($cliente);


        $credit->save();

        return redirect("/credit");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Credit $credit)
    {
        return view("credit.show", ["credit" => $credit, "payments" => $credit->payments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Credit $credit)
    {
        return view("credit.edit", ["credit" => $credit, "clients" => Client::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credit $credit)
    {
        $credit->numeroFactura = $request->numeroFactura;
        $credit->montoBase = $request->montoBase;
        $credit->totalFactura = $request->totalFactura;
        $credit->cuotaInicial = $request->cuotaInicial;
        $credit->valorCuota = $request->valorCuota;
        $credit->saldo = $request->saldo;
        $credit->cuotas = $request->cuotas;
        $credit->descripcion = $request->descripcion;
        $credit->fecha = $request->fecha;

        $datosCliente = explode(" - ", $request->datosCliente);
        $cliente = Client::find($datosCliente[0]);
        $credit->client()->associate($cliente);


        $credit->save();

        return redirect("/credit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credit $credit)
    {
        $credit->delete();

        return redirect("/credit");
    }
}
