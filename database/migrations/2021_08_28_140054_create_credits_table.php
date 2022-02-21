<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->foreignId("client_id")->constrained();
            $table->integer("numeroFactura");
            $table->bigInteger("montoBase");
            $table->bigInteger("totalFactura");
            $table->bigInteger("cuotaInicial");
            $table->bigInteger("valorCuota");
            $table->bigInteger("saldo");
            $table->integer("cuotas");
            $table->text("descripcion")->nullable(true);
            $table->date("fecha");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
}
