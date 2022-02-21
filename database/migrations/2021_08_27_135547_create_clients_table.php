<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("cedula")->nullable(true);
            $table->string("nombre");
            $table->string("apellido");
            $table->bigInteger("telefono1");
            $table->bigInteger("telefono2")->nullable(true);
            $table->string("direccion")->nullable(true);
            $table->string("ciudad")->nullable(true);
            $table->text("descripcion")->nullable(true);
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
        Schema::dropIfExists('clients');
    }
}
